<?php

namespace App\Http\Controllers\Web\Blogs\Comments;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Blogs\CommentsRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use Illuminate\Http\Request;

class CommentBlogController extends Controller
{
    protected $blog;
    protected $service;
    protected $case_study;
    protected $event;
    protected $comment;
    protected $service_category;
    public function __construct(CommentsRepository $repository, ServicesRepository $servicesRepository,
        BlogRepository $blogRepository, EventsRepository $eventsRepository, ServiceCategoryRepository $serviceCategoryRepository
    ) {

        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->service = $servicesRepository;
        $this->comment = $repository;
        $this->service_category = $service_category;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blog->index();
        $categories = $this->blog->allCategories();
        $services = $this->service->index();
        $case_studies = $this->case_study->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $service_categories = $this->service_category->index();
        return view('web.pages.blogs.index', compact('service_categories', 'products', 'events', 'case_studies', 'blogs', 'categories', 'services'));
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
        return $this->comment->store($this->comment->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = $this->comment->get($id);
        //dd($comment);
        $relatedBlog = $this->blog->getRelatedBlog();
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $service_categories = $this->service_category->index();

        return view('web.pages.blogs.comments.show', compact('service_categories', 'products', 'comment', 'events', 'relatedBlog', 'blogs', 'services'));

    }
    public function showByCategory($id)
    {

        $blogByCategories = $this->blog->showAllBlogByCategory($id)->get();
        $blog = $this->blog->get($id);
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $service_categories = $this->service_category->index();

        return view('web.components.templates.blogs.blogBycategory', compact('service_categories', 'products', 'events', 'blogByCategories', 'blogs', 'blog', 'services'));
    }

    public function comment($id)
    {
        $blog = $this->blog->get($id);
        $blogs = $this->blog->index();
        $services = $this->service->index();
        $events = $this->event->index();
        $products = $this->product->index();
        $service_categories = $this->service_category->index();

        return view('web.pages.blogs.comments.comment', compact('service_categories','products', 'events', 'blogByCategories', 'blogs', 'blog', 'services'));

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