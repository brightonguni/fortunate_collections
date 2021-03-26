<?php

namespace App\Http\Controllers\Packages;

use App\Http\Controllers\Controller;
use App\Repositories\Packages\PackageCategoryRepository;
use Illuminate\Http\Request;

class PackageCategoryController extends Controller
{
    protected $package_category;
    protected $request;

    public function __construct(PackageCategoryRepository $repository, Request $request)
    {
        $this->package_category = $repository;
        $this->request = $request;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package_categories = $this->package_category->all();
        $statistics = $this->package_category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.packages.categories.index', compact('package_categories', 'statistics', 'canDo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canDo = auth()->user()->role->canDoAll();
        $stores = $this->package_category->getStores();
        $licensors = $this->package_category->getLicensors();

        return view('pages.packages.categories.create', compact('canDo', 'stores', 'licensors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->package_category->store($this->package_category->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $storeBelongs = true;
        // if ($this->package->userIsLicensor() && !$this->package->packageBelongsToLicensor($package)) {
        //     $storeBelongs = false;
        // }
        $package_category = $this->package_category->get($id);
        $statistics = $this->package_category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $stores = $this->package_category->getStores();
        $licensors = $this->package_category->getLicensors();
        $package_categories = $this->package_category->all();

        return view('pages.packages.categories.show', compact('package_category', 'stores', 'storeBelongs', 'package_categories', 'licensors', 'statistics', 'canDo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package_category = $this->package_category->get($id);
        $statistics = $this->package_category->gestStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.packages.categories.show', compact('package_category', 'statistics', 'canDo'));

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
        return $this->package_category->update($id, $this->package_category->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->package_category->delete($id);
    }
}