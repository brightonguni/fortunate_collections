<?php

namespace App\Http\Controllers\CaseStudies\Categories;

use App\Http\Controllers\Controller;
use App\Repositories\CaseStudies\CaseStudyCategoryRepository;
use Illuminate\Http\Request;

class CaseStudyCategoryController extends Controller
{
    protected $category;

    public function __construct(CaseStudyCategoryRepository $repository, Request $request)
    {
        $this->category = $repository;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->all();
        $statistics = $this->category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->category->getLicensors();
        $stores = $this->category->getStores();

        return view('pages.case-studies.categories.index', compact('licensors', 'stores', 'categories', 'statistics', 'canDo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all();
        $statistics = $this->category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->category->getLicensors();
        $stores = $this->category->getStores();

        return view('pages.case-studies.categories.create', compact('stores', 'licensors', 'categories', 'statistics', 'canDo'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->category->store($this->category->submission());
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
        $statistics = $this->category->getStatistics();
        $licensors = $this->category->getLicensors();
        $stores = $this->category->getStores();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.case-studies.categories.show', compact('licensors', 'stores', 'category', 'statistics', 'canDo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->get($id);
        $statistics = $this->category->getStatistics();
        $licensors = $this->category->getLicensors();
        $stores = $this->category->getStores();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.case-studies.categories.edit', compact('licensors', 'stores', 'category', 'statistics', 'canDo'));

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
        return $this->category->update($id, $this->category->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->category->delete($id);
    }
}