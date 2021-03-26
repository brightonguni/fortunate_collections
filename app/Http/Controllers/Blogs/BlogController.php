<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use App\Repositories\Blogs\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BlogController extends Controller
{

    protected $blog;
    protected $request;

    public function __construct(BlogRepository $repository, Request $request)
    {
        $this->blog = $repository;
        $this->request = $request;
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blogs = $this->blog->all();
        $statistics = $this->blog->getStatistics();
        $comments = $this->blog->getComments();
        $categories = $this->blog->getCategories();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->blog->getLicensors();
        $stores = $this->blog->getStores();
        $departments = $this->blog->getAllDepartments();
        $storeBelongs = true;

        return view('pages.blogs.index', compact('stores','departments', 'licensors', 'storeBelongs', 'blogs', 'canDo', 'statistics', 'comments', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->blog->getCategories();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->blog->getLicensors();
        $stores = $this->blog->getStores();
        $departments = $this->blog->getAllDepartments();
        return view('pages.blogs.create', compact('licensors', 'stores', 'categories','departments', 'canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->blog->store($this->blog->submission());
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
        $related = $this->blog->getRelated();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->blog->getLicensors();
        $stores = $this->blog->getStores();
        $departments = $this->blog->getBlogByDepartmentId($id);
        $categories = $this->blog->getBlogByCategoriesId($id);
       
        return view('pages.blogs.show', compact('departments','categories','stores', 'licensors', 'blog', 'canDo', 'related'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->blog->get($id);
        $categories = $this->blog->getCategories();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->blog->getLicensors();
        $stores = $this->blog->getStores();

        return view('pages.blogs.edit', compact('stores', 'licensors', 'blog', 'categories', 'canDo'));

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
        return $this->blog->update($id, $this->update->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blog->delete($id);
        return redirect()->back();

    }
}