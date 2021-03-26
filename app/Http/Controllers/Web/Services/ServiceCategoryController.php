<?php

namespace App\Http\Controllers\Web\Services;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Faqs\FaqPageRepository;
use App\Repositories\web\Faqs\FaqRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicePageRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    protected $category;
    protected $service;
    protected $blog;
    protected $event;
    protected $product;
    protected $store;
    protected $faq;
    protected $service_category;
    protected $service_page;
    protected $blog_page;
    protected $faq_page;
    public function __construct(
        ServiceCategoryRepository $repository,
        ServicesRepository $servicesRepository,
        BlogRepository $blogRepository, FaqPageRepository $faqPageRepository,
        ServiceCategoryRepository $serviceCategoryRepository, BlogPageRepository $blogPageRepository,
        EventsRepository $eventsRepository, ServicePageRepository $servicePageRepository,
        ProductRepository $productRepository,
        StoreRepository $storeRepository,
        FaqRepository $faqRepository) {

        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->service = $servicesRepository;
        $this->category = $repository;
        $this->product = $productRepository;
        $this->faq = $faqRepository;
        $this->store = $storeRepository;
        $this->service_category = $serviceCategoryRepository;
        $this->blog_page = $blogPageRepository;
        $this->service_page = $servicePageRepository;
        $this->faq_page = $faqPageRepository;

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
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $service_page = $this->service_page->index();
        $blog_page = $this->blog_page->index();
        $faq_page = $this->faq_page->index();

        return view('web.pages.services.categories.index', compact(
            'stores', 'service_page',
            'blog_page', 'service_categories',
            'products', 'categories',
            'services', 'blogs', 'faq_page',
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
        $category = $this->category->get($id);
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $categories = $this->category->index();
        $serviceByCategories = $this->service_category->serviceByCategory($id);
       

        $products = $this->product->index();
        $stores = $this->store->index();
        $faqs = $this->faq->index();
        $service_categories = $this->service_category->index();
        $service_page = $this->service_page->index();
        $faq_page = $this->faq_page->index();
        $blog_page = $this->blog_page->index();
        $faq_page = $this->faq_page->index();

        //dd($productByCategories);
        return view('web.pages.services.categories.show', compact(
            'service_categories',
            'faqs', 'stores',
            'products', 'categories',
            'serviceByCategories',
            'category', 'services',
            'blog_page', 'service_page', 'faq_page',
            'blogs', 'events'));

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