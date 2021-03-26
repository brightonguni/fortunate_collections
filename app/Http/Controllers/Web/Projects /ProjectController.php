<?php

namespace App\Http\Controllers\Web\Projects;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Faqs\FaqRepository;
use App\Repositories\web\Products\ProductCategoryRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Projects\ProjectCategoryRepository;
use App\Repositories\web\Projects\ProjectPageRepository;
use App\Repositories\web\Projects\ProjectRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $product;
    protected $project;
    protected $service;
    protected $blog;
    protected $event;
    protected $category;
    protected $store;
    protected $faq;
    protected $service_category;
    protected $blog_page;
    protected $team_page;
    protected $project_page;
    public function __construct(
        ProjectRepository $repository, ProductRepository $productRepository, ServicesRepository $servicesRepository,
        BlogRepository $blogRepository, EventsRepository $eventsRepository, ServiceCategoryRepository $serviceCategoryRepository,
        ProductCategoryRepository $productCategoryRepository, ProjectCategoryRepository $projectCategoryRepository, BlogPageRepository $blogPageRepository,
        StoreRepository $storeRepository, ProjectPageRepository $projectPageRepository,
        FaqRepository $faqRepository
    ) {

        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->service = $servicesRepository;
        $this->category = $projectCategoryRepository;
        $this->product = $productRepository;
        $this->project = $repository;
        $this->faq = $faqRepository;
        $this->store = $storeRepository;
        $this->service_category = $serviceCategoryRepository;
        $this->project_page = $projectPageRepository;
        $this->blog_page = $blogPageRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->project->index();
        $products = $this->product->index();
        $services = $this->service->index();
        $faqs = $this->faq->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $categories = $this->category->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $project_page = $this->project_page->index();
        $blog_page = $this->blog_page->index();

        return view('web.pages.projects.index', compact(
            'projects', 'project_page', 'blog_page',
            'faqs',
            'stores',
            'categories',
            'products',
            'services',
            'blogs', 'service_categories',
            'events'));
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
    public function store(Request $request)
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
        $project = $this->project->get($id);
        $products = $this->product->index();
        $projects = $this->project->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $faqs = $this->faq->index();
        $categories = $this->category->index();
        $projectByCategories = $this->project->projectByCategory($id);
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $project_page = $this->project_page->index();
        $blog_page = $this->blog_page->index();

        return view('web.pages.projects.show',
            compact(
                'project', 'project_page', 'blog_page',
                'projects',
                'stores',
                'categories',
                'projectByCategories',
                'products',
                'services',
                'blogs',
                'events',
                'faqs', 'service_categories'
            ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}