<?php

namespace App\Http\Controllers\Web\blogs;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Blogs\CommentsRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Faqs\FaqPageRepository;
use App\Repositories\web\Faqs\FaqRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class WebBlogController extends Controller
{
    protected $blog;
    protected $service;
    protected $event;
    protected $comment;
    protected $blog_page;
    protected $faq_page;
    protected $product;
    protected $storeRepository;
    protected $service_category;
    public function __construct(
        FaqPageRepository $faqPageRepository, FaqRepository $faqRepository,
        ServicesRepository $servicesRepository,
        BlogRepository $blogRepository,
        EventsRepository $eventsRepository,
        CommentsRepository $commentsRepository,
        BlogPageRepository $blogPageRepository,
        ProductRepository $productRepository,
        ServiceCategoryRepository $serviceCategoryRepository,
        StoreRepository $storeRepository) {
        $this->blog_page = $blogPageRepository;
        $this->faq_page = $faqPageRepository;
        $this->faq = $faqRepository;
        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->service = $servicesRepository;
        $this->comment = $commentsRepository;
        $this->product = $productRepository;
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
        $blogs = $this->blog->index();
        $blog_page = $this->blog_page->index();
        $faq_page = $this->faq_page->index();
        $categories = $this->blog->allCategories();
        $services = $this->service->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $faqs = $this->faq->all();
        $faq_categories = $this->faq->getCategories();

        $service_categories = $this->service_category->index();
        return view('web.pages.blogs.index', compact('service_categories', 'faq_page', 'stores', 'faqs','faq_categories', 'products', 'blog_page', 'events', 'blogs', 'categories', 'services'));
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
        $blog = $this->blog->get($id);
        $relatedBlog = $this->blog->getRelatedBlog();
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $categories = $this->blog->allCategories();
        $comments = $this->comment->getBlogComments($id);
        $blog_page = $this->blog_page->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();

        return view('web.pages.blogs.show', compact('stores', 'service_categories', 'products', 'blog_page', 'comments', 'categories', 'events', 'blog', 'relatedBlog', 'blogs', 'services'));

    }
    public function loadModal($id)
    {
        $blog = $this->blog->get($id);
        $relatedBlog = $this->blog->getRelatedBlog();
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $categories = $this->blog->allCategories();
        $comment = $this->comment->getBlogComments($id);
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        return view('web.components.modals.comment', compact('stores', 'service_categories', 'products', 'comments', 'categories', 'events', 'blog', 'relatedBlog', 'blogs', 'services'));

    }
    public function showByCategory($id)
    {
        $blogByCategories = $this->blog->BlogByCategory($id);
        $blog = $this->blog->get($id);
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();

        return view('web.components.templates.blogs.blogBycategory', compact('stores', 'service_categories', 'products', 'blogByCategories', 'events', 'blogByCategories', 'blogs', 'blog', 'services'));
    }

    public function comment($id)
    {
        $blog = $this->blog->get($id);
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();

        return view('web.pages.blogs.comments.comment', compact('stores', 'service_categories', 'products', 'blog', 'events', 'blogs', 'blog', 'services'));

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