<?php

namespace App\Http\Controllers\Web\Products;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Products\ProductCategoryRepository;
use App\Repositories\web\Products\ProductPageRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class WebProductController extends Controller
{
    protected $product;
    protected $service;
    protected $blog;
    protected $event;
    protected $category;
    protected $store;
    protected $service_category;
    protected $product_page;
    protected $blog_page;

    public function __construct(
        ProductRepository $repository,
        ServicesRepository $servicesRepository,
        BlogRepository $blogRepository,
        EventsRepository $eventsRepository, ProductPageRepository $productPageRepository,
        ServiceCategoryRepository $serviceCategoryRepository, BlogPageRepository $blogPageRepository,
        ProductCategoryRepository $productCategoryRepository,
        StoreRepository $storeRepository) {

        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->service = $servicesRepository;
        $this->category = $productCategoryRepository;
        $this->product = $repository;
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
        $products = $this->product->index();
       $latest_products = $this->product->getLatestProducts();
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        //$categories = $this->category->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $product_page = $this->product_page->index();
        $categories = $this->product->getAllCategories();
        $sub_categories = $this->product->getAllProductSubCategory();

        return view('web.pages.products.index', compact('product_page','latest_products', 'sub_categories', 'blog_page', 'stores', 'service_categories', 'categories', 'products', 'services', 'blogs', 'events'));
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
        $product = $this->product->get($id);
        $latest_products = $this->product->getLatestProducts();
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $products = $this->product->index();
        $categories = $this->product->getAllCategories();
        $sub_categories = $this->product->getAllProductSubCategory();
        $productByCategories = $this->product->productByCategory($id);
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $product_page = $this->product_page->index();
        return view('web.pages.products.show', compact(
            'product_page', 'blog_page','latest_products',
            'stores', 'service_categories',
            'categories', 'productByCategories', 'sub_categories',
            'products', 'product',
            'services', 'blogs', 'events'));

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