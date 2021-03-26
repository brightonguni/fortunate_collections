<?php

namespace App\Http\Controllers\Web\Services;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Faqs\FaqRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicePageRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class WebServiceController extends Controller
{
    protected $service;
    protected $blog;
    protected $event;
    protected $product;
    protected $store;
    protected $faq;
    protected $service_page;
    protected $blog_page;
    protected $service_category;
    public function __construct(ServicesRepository $repository, BlogRepository $blogRepository,
        EventsRepository $eventsRepository, ProductRepository $productRepository,
        StoreRepository $storeRepository, FaqRepository $faqRepository, BlogPageRepository $blogPageRepository,
        ServiceCategoryRepository $serviceCategoryRepository, ServicePageRepository $servicePageRepository
    ) {
        $this->service = $repository;
        $this->service_page = $servicePageRepository;
        $this->blog_page = $blogPageRepository;
        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->product = $productRepository;
        $this->store = $storeRepository;
        $this->faq = $faqRepository;
        $this->service_category = $serviceCategoryRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = $this->service->index();
        $blogs = $this->blog->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $faqs = $this->faq->index();
        $service_categories = $this->service_category->index();
        $service_page = $this->service_page->index();
        $blog_page = $this->blog_page->index();

        return view('web.pages.services.index', compact('service_page', 'blog_page', 'faqs', 'service_categories', 'stores', 'products', 'services', 'blogs', 'events'));

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
        $service = $this->service->get($id);
        $stores = $this->store->index();
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $service_events = $this->event->getServiceEvents($id);
        $products = $this->product->index();
        $serviceByCategories = $this->service->serviceByCategory($id);
        $faqs = $this->faq->index();
        $service_categories = $this->service_category->index();
        $service_page = $this->service_page->index();
        $blog_page = $this->blog_page->index();

        return view('web.pages.services.show', compact(
            'events',
            'service',
            'blogs',
            'services',
            'service_events',
            'products',
            'stores',
            'faqs', 'service_page', 'blog_page',
            'service_categories',
            'serviceByCategories'
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