<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Repositories\Products\ProductCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductCategoryController extends Controller
{

    protected $product_category;
    protected $request;

    public function __construct(productCategoryRepository $repository, Request $request)
    {
        $this->product_category = $repository;
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
        $categories = $this->product_category->all();
        $statistics = $this->product_category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;
        $licensors = $this->product_category->getLicensors();
        $stores = $this->product_category->getStores();

        return view('pages.products.categories.index', compact('canDo', 'categories', 'stores', 'statistics', 'storeBelongs', 'licensors'));
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statistics = $this->product_category->getStatistics();
        $licensors = $this->product_category->getLicensors();
        $stores = $this->product_category->getStores();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.products.categories.create', compact('canDo', 'stores', 'statistics', 'licensors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->product_category->store($this->product_category->submission());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_category = $this->product_category->get($id);
        $storeBelongs = true;
        $categories = $this->product_category->all();

        // if ($this->product_category->userIsLicensor() && !$this->product_category->productCategoryBelongsToLicensor($product_category)) {
        //     $storeBelongs = false;
        // }
        $stores = $this->product_category->getStores();
        $statistics = $this->product_category->getStatistics();
        $licensors = $this->product_category->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.products.categories.show', compact('product_category', 'storeBelongs', 'stores', 'categories', 'statistics', 'licensors', 'canDo'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_category = $this->product_category->get($id);
        // if ($this->product_category->userIsLicensor() && !$this->product_category->productBelongsToLicensor($product_category)) {
        //     return redirect()->route('products.categories.index')->with(['permission_error' => 'not allowed']);
        // }
        $canDo = auth()->user()->role->canDoAll();
        $stores = $this->product_category->getStores();
        $statistics = $this->product_category->getStatistics();
        $licensors = $this->product_category->getLicensors();
        return view('pages.products.categories.edit', compact('product_category', 'statistics', 'stores', 'canDo', 'licensors'));
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
        $product_category = $this->product_category->get($id);
        // if ($this->product_category->userIsLicensor() && !$this->product_category->productBelongsToLicensor($product_category)) {
        //     return redirect()->route('products.categories.index')->with(['permission_error', 'Not Allowed']);

        if ($this->product_category->is_valid()) {
            $this->product_category->update($id, $this->product_category->getFormValues());
            redirect()->back()->with('success', 'Your Product category has been updated sucessfully.');
        }
        return redirect()->back()->withErrors($this->product_category->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_category = $this->product_category->get($id);

        if ($this->product_category->userIsLicensor() && !$this->product_category->productBelongsToLicensor($product_category)) {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->product_category->delete($id);
        return redirect()->back()->with('success', 'product brand has been deleted !!');
    }

}