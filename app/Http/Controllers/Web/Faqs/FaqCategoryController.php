<?php

namespace App\Http\Controllers\Web\Faqs;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\CaseStudies\CaseStudyRepository;
use App\Repositories\web\Faqs\FaqCategoryRepository;
use App\Repositories\web\Faqs\FaqPageRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    protected $blog_page;
    protected $case_study;
    protected $service;
    protected $blog;
    protected $event;
    protected $category;
    protected $product;
    protected $store;
    protected $faq_page;
    protected $service_category;
    public function __construct(CaseStudyRepository $repository, FaqPageRepository $faqPageRepository,
        ServicesRepository $servicesRepository, BlogRepository $blogRepository,
        FaqCategoryRepository $FaqCategoryRepository, EventsRepository $eventsRepository,
        ServiceCategoryRepository $serviceCategoryRepository, BlogPageRepository $blogPageRepository,
        ProductRepository $productRepository, StoreRepository $storeRepository) {
        $this->case_study = $repository;
        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->service = $servicesRepository;
        $this->product = $productRepository;
        $this->store = $storeRepository;
        $this->faq_page = $faqPageRepository;
        $this->blog_page = $blogPageRepository;

        $this->service_category = $serviceCategoryRepository;
        $this->category = $FaqCategoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->index();
        $services = $this->service->index();
        $blogs = $this->blog->index();
        $events = $this->event->index();
        $faq_categories = $this->category->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $faq_page = $this->faq_page->index();

        return view('web.pages.faqs.categories.index', compact('blog_page', 'faq_page', 'stores', 'service_categories', 'products', 'events', 'faq_categories', 'case_studies', 'categories', 'blogs', 'services'));
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
        $case_studies = $this->case_study->index();
        $faq_category = $this->category->get($id);
        $services = $this->service->index();
        $faq_categories = $this->category->index();
        $blogs = $this->blog->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $faqByCategories = $this->category->faqByCategory($id);
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $blog_page = $this->blog_page->index();
        $faq_page = $this->faq_page->index();

        return view('web.pages.faqs.categories.show', compact('blog_page', 'faq_page', 'stores', 'service_categories', 'faq_categories', 'faqByCategories', 'products', 'events', 'case_studies', 'faq_category', 'blogs', 'services'));

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