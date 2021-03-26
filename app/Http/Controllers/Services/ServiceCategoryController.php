<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Repositories\Services\ServiceCategoryRepository;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    protected $request;
    protected $category;

    public function __construct(ServiceCategoryRepository $repository, Request $request)
    {
        $this->category = $repository;
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
        $service_categories = $this->category->all();
        $statistics = $this->category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.services.category.index', compact('service_categories', 'statistics', 'canDo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service_category = $this->category->all();
        $licensors = $this->category->getLicensors();
        $stores = $this->category->getStores();
        $canDo = auth()->user()->role->canDoAll();
        return view('pages.services.category.create', compact('canDo', 'service_category', 'licensors', 'stores'));
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
        $service_category = $this->category->show($id);
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.services.category.show', compact('service_category', 'canDo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service_category = $this->category->get($id);
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->category->getLicensors();
        $stores = $this->category->getStores();

        return view('pages.services.category.edit', compact('service_category', 'licensors', 'stores', 'canDo'));
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
        $this->category->delete($id);

    }
}