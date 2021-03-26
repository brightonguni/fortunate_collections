<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use App\Repositories\Blogs\BlogCategoryRepository;
use Illuminate\Http\Request;
›
class BlogCategoryController extends Controller
{
    protected $blog_category;
    protected $request;

    public function __construct(BlogCategoryRepository $repository, Request $request)
    {
        $this->blog_category = $repository;
        $this->request = $request;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->blog_category->all();
        $statistics = $this->blog_category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.blogs.categories.index', compact('categories', 'statistics', 'canDo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canDo = auth()->user()->role->canDoAll();
        $stores = $this->blog_category->getStores();
        $licensors = $this->blog_category->getLicensors();
        $statistics = $this->blog_category->getStatistics();

        return view('pages.blogs.categories.create', compact('canDo', 'stores', 'licensors', 'statistics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->blog_category->store($this->blog_category->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->blog_category->get($id);
        $statistics = $this->blog_category->gestStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.blogs.categories.show', compact('category', 'statistics', 'canDo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->blog_category->get($id);
        $statistics = $this->blog_category->gestStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.blogs.categories.show', compact('category', 'statistics', 'canDo'));

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
        return $this->blog_category->update($id, $this->blog_category->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->blog_category->delete($id);
    }
}