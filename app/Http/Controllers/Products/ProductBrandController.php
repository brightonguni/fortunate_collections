<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Repositories\Products\ProductBrandRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductBrandController extends Controller
{

    protected $product_brand;
    protected $request;

    public function __construct(productBrandRepository $repository, Request $request)
    {
        $this->product_brand = $repository;
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
        $brands = $this->product_brand->all();
        $statistics = $this->product_brand->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;

        return view('pages.products.brands.index', compact('canDo', 'brands', 'statistics', 'storeBelongs'));
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statistics = $this->product_brand->getStatistics();
        $licensors = $this->product_brand->getLicensors();
        $stores = $this->product_brand->getStores();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.products.brands.create', compact('canDo', 'stores', 'statistics', 'licensors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->product_brand->store($this->product_brand->submission());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = $this->product_brand->get($id);
         $storeBelongs = true;
        // if ($this->product_brand->userIsLicensor() && !$this->product_brand->productBelongsToLicensor($product_brand)) {
        //     $storeBelongs = false;
        // }
        $stores = $this->product_brand->getStores();
        $statistics = $this->product_brand->getStatistics();
        $licensors = $this->product_brand->getLicensors();
        $canDo = auth()->user()->role->canDoAll();
        $brands = $this->product_brand->all();

        return view('pages.products.brands.show', compact('brand', 'brands', 'canDo', 'storeBelongs', 'stores', 'statistics', 'licensors'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = $this->product_brand->get($id);
        // if ($this->product_brand->userIsLicensor() && !$this->product_brand->productBelongsToLicensor($product_brand)) {
        //     return redirect()->route('products.brands.index')->with(['permission_error' => 'not allowed']);
        // }
        $canDo = auth()->user()->role->canDoAll();
$storeBelongs = true;

        $stores = $this->product_brand->getStores();
        $statistics = $this->product_brand->getStatistics();
        $licensors = $this->product_brand->getLicensors();
        return view('pages.products.brands.edit', compact('brand', 'stores', 'statistics','storeBelongs', 'licensors','canDo'));
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
        $brand = $this->product_brand->get($id);
        // if ($this->product_brand->userIsLicensor() && !$this->product_brand->productBelongsToLicensor($product_brand)) {
        //     return redirect()->route('products.brands.index')->with(['permission_error', 'Not Allowed']);

            if ($this->product_brand->is_valid()) {
                $this->product_brand->update($id, $this->product_brand->getFormValues());
                redirect()->back()->with('success', 'Your product brand has been updated successfully.');
            }
            return redirect()->back()->withErrors($this->product->getErrors());
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = $this->product_brand->get($id);

        if ($this->product_brand->userIsLicensor() && !$this->product_brand->productBelongsToLicensor($product_brand)) {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->product_brand->delete($id);
        return redirect()->back()->with('success', 'product brand has been deleted !!');
    }
}