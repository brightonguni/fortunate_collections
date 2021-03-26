<?php

namespace App\Http\Controllers\Packages;

use App\Http\Controllers\Controller;
use App\Repositories\Packages\PackageRepository;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    protected $package;
    protected $request;
    public function __construct(PackageRepository $repository, Request $request)
    {
        $this->package = $repository;
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

        $packages = $this->package->all();
        $stores = $this->package->getStores();
        $licensors = $this->package->getLicensors();
        $statistics = $this->package->getStatistics();
        $services = $this->package->getAllServices();
        // $categories = $this->package->getCategories();
        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;
        $package_categories = $this->package->getPackageCategories();

        return view('pages.packages.index', compact('licensors', 'stores', 'package_categories', 'services', 'packages', 'canDo', 'statistics', 'storeBelongs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statistics = $this->package->getStatistics();
        $licensors = $this->package->getLicensors();
        $services = $this->package->getAllServices();
        $package_categories = $this->package->getPackageCategories();
        $products = $this->package->getAllProducts();
        $stores = $this->package->getStores();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.packages.create', compact('statistics', 'package_categories', 'services', 'products', 'licensors', 'stores', 'canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->package->store($this->package->getFormValues());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = $this->package->get($id);
        $storeBelongs = true;
        // if ($this->package->userIsLicensor() && !$this->package->packageBelongsToLicensor($package)) {
        //     $storeBelongs = false;
        // }
        $stores = $this->package->getStores();
        $package_by_category = $this->package->getPackageByCategory($id);

        $statistics = $this->package->getStatistics();
        // $package_types = $this->package->getpackageTypes();
        $licensors = $this->package->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.packages.show', compact('package', 'package_by_category', 'canDo', 'storeBelongs', 'stores', 'statistics', 'licensors'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = $this->package->get($id);
        // if ($this->package->userIsLicensor() && !$this->package->projectBelongsToLicensor($package)) {
        //     return redirect()->route('package.index')->with(['permission_error' => 'not allowed']);
        // }
        // $package_type = $this->package->getpackageTypes();
        $services = $this->package->getAllServices();
        $stores = $this->package->getStores();
        $statistics = $this->package->getStatistics();
        $licensors = $this->package->getLicensors();
        $package_categories = $this->package->getPackageCategories();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.packages.edit', compact('package', 'services', 'package_categories', 'canDo', 'stores', 'statistics', 'stores', 'licensors'));

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
        $package = $this->package->get($id);
        // if ($this->package->userIsLicensor() && !$this->package->packageBelongsToLicensor($package)) {
        //     return redirect()->route('package.index')->with(['permission_error', 'Not Allowed']);

        if ($this->package->is_valid()) {
            $this->package->update($id, $this->package->getFormValues());
            redirect()->back()->with('success', 'Your package has been updated sucessfully.');
        }
        return redirect()->back()->withErrors($this->package->getErrors());
        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = $this->package->get($id);

        if ($this->package->userIsLicensor() && !$this->package->packageBelongsToLicensor($package)) {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->package->delete($id);
        return redirect()->back()->with('success', 'package has been deleted !!');

    }
}