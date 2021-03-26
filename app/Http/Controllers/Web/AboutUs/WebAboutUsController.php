<?php

namespace App\Http\Controllers\Web\AboutUs;

use App\Http\Controllers\Controller;
use App\Repositories\web\AboutUs\AboutUsRepository;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicePageRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class WebAboutUsController extends Controller
{
    protected $about;
    protected $service;
    protected $blog;
    protected $event;
    protected $product;
    protected $store;
    protected $service_category;
    protected $blog_page;
    protected $service_page;
    public function __construct(
        AboutUsRepository $repository,
        ServicesRepository $servicesRepository, BlogPageRepository $blogPageRepository,
        BlogRepository $blogRepository, ServicePageRepository $servicePageRepository,
        EventsRepository $eventsRepository,
        ProductRepository $productRepository,
        StoreRepository $storeRepository,
        ServiceCategoryRepository $serviceCategoryRepository) {

        $this->about = $repository;
        $this->service = $servicesRepository;
        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->product = $productRepository;
        $this->store = $storeRepository;
        $this->service_category = $serviceCategoryRepository;
        $this->blog_page = $blogPageRepository;
        $this->service_page = $servicePageRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUsPage = $this->about->index();
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $service_page = $this->service_page->index();
        return view('web.pages.about_us.index', compact('blog_page', 'service_page', 'service_categories', 'stores', 'products', 'events', 'aboutUsPage', 'services', 'blogs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.pages.about_us.create');
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
        $aboutUsPage = $this->about->get($id);
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $service_page = $this->service_page->index();
        return view('web.pages.about_us.show', compact('blog_page', 'service_page', 'service_categories', 'stores', 'products', 'events', 'aboutUsPage', 'services', 'blogs'));

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