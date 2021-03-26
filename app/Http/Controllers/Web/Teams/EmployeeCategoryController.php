<?php

namespace App\Http\Controllers\Web\Teams;

use App\Http\Controllers\Controller;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Teams\EmployeeCategoryRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class EmployeeCategoryController extends Controller
{
    protected $category;
    protected $blog;
    protected $service;
    protected $event;
    protected $product;
    protected $store;
    protected $service_category;
    public function __construct(
        EmployeeCategoryRepository $repository, EventsRepository $eventsRepository, ServiceCategoryRepository $serviceCategoryRepository, ServicesRepository $servicesRepository,
        BlogRepository $blogRepository, StoreRepository $storeRepository, ProductRepository $productRepository) {
        $this->category = $repository;
        $this->service = $servicesRepository;
        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->product = $productRepository;
        $this->store = $storeRepository;
        $this->service_category = $serviceCategoryRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->index();
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();

        return view('web.pages.teams.categories.index', compact('service_categories', 'stores', 'products', 'events', 'categories', 'blogs', 'services'));
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
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $categories = $this->category->index();
        $blogByCategories = $this->blog->blogByCategory($id);
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();

        return view('web.pages.teams.categories.show', compact('service_categories', 'stores', 'products', 'blogByCategories', 'categories', 'events', 'category', 'blogs', 'services'));
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