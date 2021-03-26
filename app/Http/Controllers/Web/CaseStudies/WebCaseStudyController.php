<?php

namespace App\Http\Controllers\Web\CaseStudies;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\CaseStudies\CaseStudyCategoryRepository;
use App\Repositories\web\CaseStudies\CaseStudyRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class WebCaseStudyController extends Controller
{
    protected $case_study;
    protected $service;
    protected $blog;
    protected $event;
    protected $case_study_category;
    protected $product;
    protected $store;

    public function __construct(CaseStudyRepository $repository,
        ServicesRepository $servicesRepository, BlogRepository $blogRepository,
        CaseStudyCategoryRepository $caseStudyCategoryRepository, EventsRepository $eventsRepository,
        ProductRepository $productRepository, StoreRepository $storeRepository) {
        $this->case_study = $repository;
        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->service = $servicesRepository;
        $this->product = $productRepository;
        $this->store = $storeRepository;

        $this->case_study_category = $caseStudyCategoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $case_studies = $this->case_study->index();
        $categories = $this->case_study->getCategories();
        $services = $this->service->index();
        $blogs = $this->blog->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $case_categories = $this->case_study_category->index();
        $stores = $this->store->index();

        return view('web.pages.case-studies.index', compact('stores', 'products', 'events', 'case_categories', 'case_studies', 'categories', 'blogs', 'services'));
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
        $case_study = $this->case_study->get($id);
        $categories = $this->case_study_category->index();
        $services = $this->service->index();
        $blogs = $this->blog->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $stores = $this->store->index();

        return view('web.pages.case-studies.show', compact('stores', 'products', 'events', 'case_study', 'categories', 'blogs', 'services'));

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