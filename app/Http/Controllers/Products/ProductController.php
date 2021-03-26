<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Repositories\Products\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{

    protected $product;
    protected $request;

    public function __construct(productRepository $repository, Request $request)
    {
        $this->product = $repository;
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
        $products = $this->product->all();
        $latest_products = $this->product->getLatestProducts();
        $statistics = $this->product->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;
        $brands = $this->product->getAllBrands();
        $colors = $this->product->getAllColors();
        $categories = $this->product->getAllCategories();
        $sub_categories = $this->product->getAllProductSubCategory();
        $stores = $this->product->getStores();
        $licensors = $this->product->getLicensors();

        return view('pages.products.index', compact('licensors','latest_products', 'stores', 'canDo', 'categories', 'sub_categories', 'brands', 'colors', 'products', 'statistics', 'storeBelongs'));
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = $this->product->getStores();
        $statistics = $this->product->getStatistics();
        $licensors = $this->product->getLicensors();
        $brands = $this->product->getBrands();
        $colors = $this->product->getColors();
        $categories = $this->product->getAllCategories();
        $sub_categories = $this->product->getAllProductSubCategory();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.products.create', compact('brands', 'colors', 'canDo', 'stores', 'sub_categories', 'categories', 'statistics', 'licensors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->product->store($this->product->submission());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->get($id);
        $storeBelongs = true;
        // if ($this->product->userIsLicensor() && !$this->product->productBelongsToLicensor($product)) {
        //     $storeBelongs = false;
        // }
        $stores = $this->product->getStores();
        $statistics = $this->product->getStatistics();
        $licensors = $this->product->getLicensors();
        $canDo = auth()->user()->role->canDoAll();
        $categories = $this->product->getAllCategories();
        $sub_categories = $this->product->getAllProductSubCategory();

        return view('pages.products.show', compact('product','sub_categories', 'categories','canDo', 'storeBelongs', 'stores', 'statistics', 'licensors'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->get($id);
        if ($this->product->userIsLicensor() && !$this->product->productBelongsToLicensor($product)) {
            return redirect()->route('products.index')->with(['permission_error' => 'not allowed']);
        }
        $stores = $this->product->getStores;
        $teams = $this->product->getTeams();
        $statistics = $this->product->getStatistics();
        $licensors = $this->product->getTeams();
        return view('pages.products.edit', compact('product', 'stores', 'statistics', 'stores', 'teams', 'licensors'));
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
        $product = $this->product->get($id);
        if ($this->product->userIsLicensor() && !$this->product->productBelongsToLicensor($product)) {
            return redirect()->route('products.index')->with(['permission_error', 'Not Allowed']);

            if ($this->product->is_valid()) {
                $this->product->update($id, $this->product->getFormValues());
                redirect()->back()->with('success', 'Your product has been updated sucessfully.');
            }
            return redirect()->back()->withErrors($this->product->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->get($id);

        // if ($this->product->userIsLicensor() && !$this->product->productBelongsToLicensor($product)) {
        //     return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        // }
        $this->product->delete($id);
        return redirect()->back()->with('success', 'product has been deleted !!');
    }
}