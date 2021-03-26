<?php

namespace App\Http\Controllers\Web\Products;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Faqs\FaqRepository;
use App\Repositories\web\Products\ProductSubCategoryRepository;
use App\Repositories\web\Products\ProductPageRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class WebProductSubCategoryController extends Controller
{
    protected $category;
    protected $service;
    protected $blog;
    protected $event;
    protected $product;
    protected $store;
    protected $faq;
    protected $service_category;
    protected $product_page;
    protected $blog_page;

    public function __construct(
        ProductSubCategoryRepository $repository,
        ServicesRepository $servicesRepository,
        BlogRepository $blogRepository,
        EventsRepository $eventsRepository,
        ProductRepository $productRepository, ProductPageRepository $productPageRepository,
        ServiceCategoryRepository $serviceCategoryRepository,
        StoreRepository $storeRepository, BlogPageRepository $blogPageRepository,
        FaqRepository $faqRepository) {

        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->service = $servicesRepository;
        $this->category = $repository;
        $this->product = $productRepository;
        $this->faq = $faqRepository;
        $this->store = $storeRepository;
        $this->service_category = $serviceCategoryRepository;
        $this->product_page = $productPageRepository;
        $this->blog_page = $blogPageRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = $this->category->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $product_page = $this->product_page->index();

        return view('web.pages.products.sub-categories.index', compact('product_page', 'blog_page', 'stores', 'service_categories', 'products', 'sub_categories', 'services', 'blogs', 'events'));
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
        $sub_category = $this->category->get($id);
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $categories = $this->category->index();
        $productByCategories = $this->category->productByCategory($id);
        $products = $this->product->index();
        $stores = $this->store->index();
        $faqs = $this->faq->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $product_page = $this->product_page->index();
        //dd($productByCategories);
        return view('web.pages.products.sub-categories.show', compact('product_page', 'blog_page', 'faqs', 'service_categories', 'stores', 'products', 'categories', 'productByCategories', 'sub_category', 'services', 'blogs', 'events'));

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