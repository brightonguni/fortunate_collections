<?php

namespace App\Http\Controllers\Web\Teams;

use App\Http\Controllers\Controller;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Faqs\FaqRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use App\Repositories\web\Teams\EmployeeRepository;
use App\Repositories\web\Teams\TeamPageRepository;
use Illuminate\Support\Facades\App;

class EmployeeController extends Controller
{
    protected $service;
    protected $blog;
    protected $event;
    protected $product;
    protected $store;
    protected $faq;
    protected $service_category;
    protected $employee;
    protected $blog_page;
    protected $team_page;
    public function __construct(ServicesRepository $serviceRepository, BlogRepository $blogRepository,
        EventsRepository $eventsRepository, ProductRepository $productRepository, BlogPageRepository $blogPageRepository,
        StoreRepository $storeRepository, FaqRepository $faqRepository, TeamPageRepository $teamPageRepository,
        ServiceCategoryRepository $serviceCategoryRepository, EmployeeRepository $employeeRepository
    ) {
        $this->employee = $employeeRepository;
        $this->service = $serviceRepository;
        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->product = $productRepository;
        $this->store = $storeRepository;
        $this->faq = $faqRepository;
        $this->service_category = $serviceCategoryRepository;
        $this->team_page = $teamPageRepository;
        $this->blog_page = $blogPageRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $services = $this->service->index();
        $blogs = $this->blog->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $faqs = $this->faq->index();
        $teams = $this->employee->all();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $team_page = $this->team_page->index();

        return view('web.pages.teams.index', compact(
            'teams',
            'faqs',
            'service_categories', 'blog_page', 'team_page',
            'stores',
            'products',
            'services',
            'blogs',
            'events'
        ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        return $this->employee->store($this->employee->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $team = $this->employee->get($id);
        $skills = $this->employee->getEmployeeSkills($id);
        $stores = $this->store->index();
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $service_events = $this->event->getServiceEvents($id);
        $products = $this->product->index();
        $teamByCategories = $this->employee->teamByCategory($id);
        $faqs = $this->faq->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $team_page = $this->team_page->index();

        return view('web.pages.teams.show', compact(
            'events',
            'team',
            'skills',
            'blogs',
            'services',
            'service_events',
            'products',
            'stores',
            'faqs', 'blog_page', 'team_page',
            'service_categories',
            'teamByCategories'
        ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $employee = $this->employee->get($id);
        $departments = $this->employee->getDepartments();
        $skills = $this->employee->getSkills();
        $contracts = $this->employee->getContracts();
        $projects = $this->getProjects();
        $job_titles = $this->getJobTitles();

        $roles = $this->employee->getRoles();
        if ($this->employee->userIsNotAdmin() || $employee->role()->id != 1) {
            unset($roles[0]);
        }

        if (!$this->employee->userIsNotAdmin() && $employee->role()->id == 1) {
            unset($roles[1]);
            unset($roles[3]);
            unset($roles[2]);
        }

        if ($this->employee->userIsLicensor() && !$this->employee->userBelongsToLicensor($id)) {
            return redirect()->route('users.index')->with(['permission_error' => 'Not allowed']);
        }
        $stores = $this->employee->getStores();

        //DO: store owner

        $licensors = App::make(LicensorRepository::class)->all();
        return view('pages.employees.edit',
            compact(
                'employee',
                'roles',
                'stores',
                'licensors',
                'projects',
                'contracts',
                'skills',
                'job_titles',
                'departments'
            ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if ($this->employee->userIsLicensor() && !$this->employee->userBelongsToLicensor($id)) {
            return redirect()->route('employees.index')->with(['permission_error' => 'Not allowed']);
        }
        //DO: store owner

        return $this->employee->update($id, $this->employee->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->employee->userIsLicensor() && !$this->employee->userBelongsToLicensor($id)) {
            return redirect()->route('users.index')->with(['permission_error' => 'Not allowed']);
        }
        //DO: store owner

        $this->employee->delete($id);
        return redirect()->back();
    }

}