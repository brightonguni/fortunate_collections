<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Repositories\Products\ProductSubCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductSubCategoryController extends Controller
{

    protected $product_sub_category;
    protected $request;

    public function __construct(productSubCategoryRepository $repository, Request $request)
    {
        $this->product_sub_category = $repository;
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
        $sub_categories = $this->product_sub_category->all();
        $statistics = $this->product_sub_category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;

        return view('pages.products.sub-categories.index', compact('canDo', 'sub_categories', 'statistics', 'storeBelongs'));
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statistics = $this->product_sub_category->getStatistics();
        $licensors = $this->product_sub_category->getLicensors();
        $categories = $this->product_sub_category->getProductCategories();
        $stores = $this->product_sub_category->getStores();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.products.sub-categories.create', compact('canDo', 'stores', 'statistics', 'licensors','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->product_sub_category->store($this->product_sub_category->submission());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_category = $this->product_sub_category->get($id);
        $storeBelongs = true;
        // if ($this->product_sub_category->userIsLicensor() && !$this->product_sub_category->productSubCategoryBelongsToLicensor($product_sub_category)) {
        //      $storeBelongs = false;
        // }
        $stores = $this->product_sub_category->getStores();
        $statistics = $this->product_sub_category->getStatistics();
        $licensors = $this->product_sub_category->getLicensors();
        $canDo = auth()->user()->role->canDoAll();
        $sub_categories = $this->product_sub_category->all();

        return view('pages.products.sub-categories.show', compact('sub_category','sub_categories', 'storeBelongs', 'stores', 'statistics', 'licensors', 'canDo'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_sub_category = $this->product_sub_category->get($id);
        if ($this->product_sub_category->userIsLicensor() && !$this->product_sub_category->productBelongsToLicensor($product_sub_category)) {
            return redirect()->route('products.sub_categories.index')->with(['permission_error' => 'not allowed']);
        }
        $stores = $this->product_sub_category->getStores;
        $statistics = $this->product_sub_category->getStatistics();
        $licensors = $this->product_sub_category->getLicensors();
        return view('pages.products.sub_categories.edit', compact('product_sub_category', 'stores', 'statistics', 'stores', 'licensors'));
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
        $product_sub_category = $this->product_sub_category->get($id);
        if ($this->product_sub_category->userIsLicensor() && !$this->product_sub_category->productBelongsToLicensor($product_sub_category)) {
            return redirect()->route('products.sub_categories.index')->with(['permission_error', 'Not Allowed']);

            if ($this->product_sub_category->is_valid()) {
                $this->product_sub_category->update($id, $this->product_sub_category->getFormValues());
                redirect()->back()->with('success', 'Your product brand has been updated sucessfully.');
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
        $product_sub_category = $this->product_sub_category->get($id);

        if ($this->product_sub_category->userIsLicensor() && !$this->product_sub_category->productBelongsToLicensor($product_sub_category)) {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->product_sub_category->delete($id);
        return redirect()->back()->with('success', 'product brand has been deleted !!');
    }
}