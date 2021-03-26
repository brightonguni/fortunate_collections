<?php

namespace App\Http\Controllers\Web\ContactUs;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\CaseStudies\CaseStudyRepository;
use App\Repositories\web\ContactUs\ContactPageRepository;
use App\Repositories\web\Stores\ContactRepository;
use App\Repositories\web\ContactUs\ContactUsRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class WebContactUsController extends Controller
{
    protected $blog_page;
    protected $contact_page;
    protected $contact_us;
    protected $contact;
    protected $case_study;
    protected $service;
    protected $blog;
    protected $event;
    protected $product;
    protected $store;
    protected $service_category;
    public function __construct(
        ContactUsRepository $repository,
        ContactRepository $contactRepository,
        CaseStudyRepository $caseStudyRepository,
        ServicesRepository $servicesRepository,
        BlogRepository $blogRepository,
        BlogPageRepository $blogPageRepository, ContactPageRepository $contactPageRepository,
        EventsRepository $eventsRepository,
        ProductRepository $productRepository,
        ServiceCategoryRepository $serviceCategoryRepository,
        StoreRepository $storeRepository
    ) {
        $this->case_study = $caseStudyRepository;
        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->blog_page = $blogPageRepository;
        $this->contact_page = $contactPageRepository;
        $this->contact = $contactRepository;
        $this->service = $servicesRepository;
        $this->product = $productRepository;
        $this->contact_us = $repository;
        $this->service_category = $serviceCategoryRepository;
        $this->store = $storeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = $this->store->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $case_studies = $this->case_study->index();
        $products = $this->product->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $contact_page = $this->contact_page->index();

        return view('web.pages.contact_us.index', compact('stores', 'blog_page', 'contact_page', 'service_categories', 'products', 'case_studies', 'stores', 'blogs', 'events', 'services'));
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
        $store = $this->store->get($id);
        // $service = $this->contact->getServices();
        $service = $this->service->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $case_studies = $this->case_study->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $contact = $this->contact->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $contact_page = $this->contact_page->index();

        return view('web.pages.contact_us.show', compact(
            'contact_page', 'stores','contact','store',
            'blog_page', 'service_categories',
            'products', 'case_studies', 'blogs',
            'events', 'services', 'service'));

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