<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Repositories\Services\ServiceCategoryRepository;
use App\Repositories\Services\ServicesRepository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $request;
    protected $service;
    protected $category;

    public function __construct(ServicesRepository $repository, Request $request, ServiceCategoryRepository $serviceCategoryRepository)
    {
        $this->service = $repository;
        $this->request = $request;
        $this->category = $serviceCategoryRepository;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = $this->service->all();
        $statistics = $this->service->getStatistics();
        $service_categories = $this->category->all();
        $categories = $this->service->getCategories();
        $service_category = $this->category->all();
        $stores = $this->service->getStores();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->service->getLicensors();

        return view('pages.services.index', compact('services', 'stores', 'categories', 'service_category', 'licensors', 'service_categories', 'statistics', 'canDo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = $this->service->all();
        $categories = $this->service->getCategories();
        $licensors = $this->service->getLicensors();
        $stores = $this->service->getStores();
        $canDo = auth()->user()->role->canDoAll();
        return view('pages.services.create', compact('canDo', 'services', 'categories', 'licensors', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->service->store($this->service->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = $this->service->show($id);
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.services.show', compact('service', 'canDo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = $this->service->get($id);
        $canDo = auth()->user()->role->canDoAll();
        $categories = $this->service->getCategories();
        $licensors = $this->service->getLicensors();
        $stores = $this->service->getStores();

        return view('pages.services.edit', compact('service', 'stores', 'canDo', 'categories','licensors'));
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
        return $this->service->update($id, $this->service->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);

    }
}