<?php

namespace App\Http\Controllers\Web\Events;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\BookingRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class WebEventsController extends Controller
{

    protected $blog;
    protected $service;
    protected $event;
    protected $booking;
    protected $product;
    protected $store;
    protected $service_category;
    public function __construct(
        EventsRepository $eventsRepository,
        ServicesRepository $servicesRepository,
        BlogRepository $blogRepository,
        BookingRepository $bookingRepository,
        ProductRepository $productRepository,
        StoreRepository $storeRepository,
        ServiceCategoryRepository $serviceCategoryRepository
    ) {
        $this->event = $eventsRepository;
        $this->service = $servicesRepository;
        $this->blog = $blogRepository;
        $this->booking = $bookingRepository;
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
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();

        // $case_studies = $this->case_studies->index();

        return view('web.pages.bookings.events.index', compact('stores', 'products', 'service_categories', 'events', 'blogs', 'services'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBooking($id)
    {
        $event = $this->event->get($id);
        $categories = $this->booking->getCategories();
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $licensors = $this->event->getLicensors();
        $stores = $this->event->getStores();
        $venues = $this->event->getVenues();
        $stores = $this->event->getStores();
        $licensors = $this->event->getLicensors();
        $events = $this->event->index();
        $products = $this->product->index();
        $service_categories = $this->service_category->index();

        return view('web.pages.bookings.create', compact('products', 'service_categories', 'events', 'categories', 'licensors', 'stores', 'venues', 'event', 'blogs', 'services'));

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
        $event = $this->event->get($id);
        $blogs = $this->blog->index();
        $services = $this->service->index();
        // $case_studies = $this->case_studies->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();

        return view('web.pages.bookings.events.show', compact('stores', 'service_categories', 'products', 'event', 'blogs', 'services', 'events'));
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