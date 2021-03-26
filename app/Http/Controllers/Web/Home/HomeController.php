<?php

namespace App\Http\Controllers\Web\Home;

use App\Repositories\web\AboutUs\AboutUsRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\CaseStudies\CaseStudyRepository;
use App\Repositories\web\Faqs\FaqRepository;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Products\ProductCategoryRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Projects\ProjectCategoryRepository;
use App\Repositories\web\Projects\ProjectRepository;
use App\Repositories\web\Receips\ReceipRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;

class HomeController extends Controller
{
    protected $customer;
    protected $store;
    protected $blog;
    protected $case_study;
    protected $licensor;
    protected $project;
    protected $service;
    protected $team;
    protected $event;
    protected $faq;
    protected $product;
    protected $product_category;
    protected $project_category;
    protected $receip;
    protected $aboutUs;

    public function __construct
    (
        LicensorRepository $licensorRepository,
        BlogRepository $blogRepository,
        StoreRepository $StoreRepository,
        ServicesRepository $servicesRepository,
        // CustomerRepository $customerRepository,
        // ProjectRepository $projectRepository,
        CaseStudyRepository $case_studyRepository,
        EventsRepository $eventsRepository,
        FaqRepository $faqRepository,
        ProjectRepository $projectRepository,
        ProjectCategoryRepository $projectCategoryRepository,
        ProductRepository $productRepository,
        ProductCategoryRepository $productCategoryRepository,
        ReceipRepository $receipRepository,
        AboutUsRepository $aboutUsRepository
    ) {
        $this->licensor = $licensorRepository;
        $this->blog = $blogRepository;
        $this->store = $StoreRepository;
        $this->service = $servicesRepository;
        // $this->customer = $customerRepository;
        // $this->project = $projectRepository;
        $this->case_study = $case_studyRepository;
        $this->middleware('auth');
        $this->event = $eventsRepository;
        $this->faq = $faqRepository;
        $this->product = $productRepository;
        $this->product_category = $productCategoryRepository;
        $this->project = $projectRepository;
        $this->project_category = $projectCategoryRepository;
        $this->receip = $receipRepository;
        $this->aboutUs = $aboutUsRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // $customers = $this->customer->all()->paginate(10);
        $blogs = $this->blog->all();
        $projects = $this->project->all();
        $project_categories = $this->project_category->get_project_categories();
        $case_studies = $this->case_study->all();
        $stores = $this->store->all();
        $services = $this->service->all();
        $events = $this->event->all();
        $products = $this->product->index();
        $receips = $this->receip->index();
        $faqs = $this->faq->all();
        $canDo = auth()->user()->role->canDoAll();
        $aboutUs = $this->aboutUs->all();
        $product_categories = $this->product_category->get_product_categories();

        return view('home', compact('product_categories', 'project_categories', 'projects', 'aboutUs', 'stores', 'products', 'receips', 'faqs', 'canDo', 'blogs', 'services', 'case_studies', 'events'));
    }
}