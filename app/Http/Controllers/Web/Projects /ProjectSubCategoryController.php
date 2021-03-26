<?php

namespace App\Http\Controllers\Web\Projects;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Faqs\FaqRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Products\ProductSubCategoryRepository;
use App\Repositories\web\Projects\ProjectCategoryRepository;
use App\Repositories\web\Projects\ProjectPageRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class ProjectSubCategoryController extends Controller
{
    protected $category;
    protected $service;
    protected $blog;
    protected $event;
    protected $product;
    protected $productCategory;
    protected $project_page;
    protected $project;
    protected $store;
    protected $faq;
    protected $service_category;
    public function __construct(
        ProjectCategoryRepository $repository,
        ProductRepository $projectRepository,
        ProductSubCategoryRepository $productSubCategoryRepository,
        ServicesRepository $servicesRepository,
        BlogRepository $blogRepository, ProjectPageRepository $projectPageRepository,
        EventsRepository $eventsRepository,
        ServiceCategoryRepository $serviceCategoryRepository,
        ProductRepository $productRepository,
        StoreRepository $storeRepository, BlogPageRepository $blogPageRepository,
        FaqRepository $faqRepository) {

        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->blog_page = $blogPageRepository;
        $this->service = $servicesRepository;
        $this->category = $repository;
        $this->product = $productRepository;
        $this->project = $projectRepository;
        $this->faq = $faqRepository;
        $this->store = $storeRepository;
        $this->service_category = $serviceCategoryRepository;
        $this->project_page = $projectPageRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $products = $this->product->index();
        $projects = $this->project->index();
        $service_categories = $this->service_category->index();
        $stores = $this->store->index();
        $blog_page = $this->blog_page->index();
        $project_page = $this->project_page->index();

        return view('web.pages.projects.sub-categories.index', compact('projects', 'project_page', 'service_categories', 'stores', 'products', 'categories', 'services', 'blogs', 'blog_page', 'events'));
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
        $category = $this->category->get($id);
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $categories = $this->category->index();
        $projectByCategories = $this->category->projectByCategory($id);
        $products = $this->product->index();
        $projects = $this->project->index();
        $stores = $this->store->index();
        $faqs = $this->faq->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $project_page = $this->project_page->index();

        return view('web.pages.projects.sub-categories.show', compact('projects', 'project_page', 'blog_page', 'service_categories', 'faqs', 'stores', 'products', 'categories', 'projectByCategories', 'category', 'services', 'blogs', 'events'));

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