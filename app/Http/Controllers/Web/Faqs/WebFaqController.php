<?php

namespace App\Http\Controllers\Web\Faqs;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Faqs\FaqCategoryRepository;
use App\Repositories\web\Faqs\FaqPageRepository;
use App\Repositories\web\Faqs\FaqRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class WebFaqController extends Controller
{
    protected $faq;
    protected $service;
    protected $blog;
    protected $event;
    protected $product;
    protected $store;
    protected $service_category;
    protected $blog_page;
    protected $faq_page;
    public function __construct(
        FaqRepository $repository,
        ServicesRepository $servicesRepository,
        BlogRepository $blogRepository,
        EventsRepository $eventsRepository,
        FaqCategoryRepository $faqCategoryRepository, FaqPageRepository $faqPageRepository,
        ProductRepository $productRepository, BlogPageRepository $blogPageRepository,
        ServiceCategoryRepository $serviceCategoryRepository,
        StoreRepository $storeRepository) {
        $this->blog_page = $blogPageRepository;
        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->service = $servicesRepository;
        $this->faq = $repository;
        $this->product = $productRepository;
        $this->category = $faqCategoryRepository;
        $this->store = $storeRepository;
        $this->faq_page = $faqPageRepository;

        $this->service_category = $serviceCategoryRepository;
        // $this->faq_page = $faqPageRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = $this->faq->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $faq_categories = $this->category->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $faq_page = $this->faq_page->index();

        return view('web.pages.faqs.index', compact('faq_page', 'blog_page', 'stores', 'service_categories', 'products', 'faq_categories', 'faqs', 'blogs', 'events', 'services'));
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
        $faq = $this->faq->get($id);
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $faq_categories = $this->category->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $faq_page = $this->faq_page->index();

        return view('web.pages.faqs.show', compact('faq_page', 'blog_page', 'faq_categories', 'stores', 'service_categories', 'products', 'faq', 'blogs', 'events', 'services'));

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