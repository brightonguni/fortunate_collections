<?php

namespace App\Http\Controllers\Web\Teams;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Departments\DepartmentsRepository;
use App\Repositories\web\Faqs\FaqRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use App\Repositories\web\Teams\TeamPageRepository;
use App\Repositories\web\Teams\TeamRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TeamController extends Controller
{

    protected $team;
    protected $request;
    protected $service;
    protected $blog;
    protected $event;
    protected $product;
    protected $store;
    protected $service_category;
    protected $department;
    protected $faq;
    protected $blog_page;
    protected $team_page;
    public function __construct(TeamRepository $teamRepository, ServicesRepository $servicesRepository, BlogRepository $blogRepository, TeamPageRepository $teamPageRepository,
        EventsRepository $eventsRepository, ProductRepository $productRepository, FaqRepository $faqRepository, BlogPageRepository $blogPageRepository,
        StoreRepository $storeRepository, DepartmentsRepository $departmentsRepository, ServiceCategoryRepository $serviceCategoryRepository) {
        $this->team = $teamRepository;
        $this->department = $departmentsRepository;
        $this->service = $servicesRepository;
        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->product = $productRepository;
        $this->store = $storeRepository;
        $this->service_category = $serviceCategoryRepository;
        $this->faq = $faqRepository;
        $this->team_page = $teamPageRepository;
        $this->blog_page = $blogPageRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = $this->team->all();
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $faqs = $this->faq->index();
        $blog_page = $this->blog_page->index();
        $team_page = $this->team_page->index();

// will assign a project to a team
        return view('web.pages.teams.index', compact('teams', 'blog_page', 'team_page', 'faqs', 'service_categories', 'stores', 'products', 'events', 'services', 'blogs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = $this->team->get($id);
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $faqs = $this->faq->index();
        $blog_page = $this->blog_page->index();
        $team_page = $this->team_page->index();

        return view('web.pages.teams.show', compact('team', 'faqs', 'blog_page', 'team_page', 'service_categories', 'stores', 'products', 'events', 'services', 'blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTeams(Request $request)
    {
        // LeaveStatus::whereIn('leave_status', $request->input('leave_status', []))->get();
        $items = $request->get('leave_status');
        $selected_items = '';
        foreach ($items as $item) {
            //do something
            $selected_items .= $item . ',';
        }
        dd($selected_items);

    }
}