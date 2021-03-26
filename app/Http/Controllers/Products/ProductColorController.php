<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Repositories\Products\ProductColorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductColorController extends Controller
{

    protected $product_color;
    protected $request;

    public function __construct(productColorRepository $repository, Request $request)
    {
        $this->product_color = $repository;
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
        $colors = $this->product_color->all();
        $statistics = $this->product_color->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;

        return view('pages.products.colors.index', compact('canDo', 'colors', 'statistics', 'storeBelongs'));
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statistics = $this->product_color->getStatistics();
        $licensors = $this->product_color->getLicensors();
        $stores = $this->product_color->getStores();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.products.colors.create', compact('canDo', 'stores', 'statistics', 'licensors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->product_color->store($this->product_color->submission());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $color = $this->product_color->get($id);
        $storeBelongs = true;
        // if ($this->product_color->userIsLicensor() && !$this->product_color->productBelongsToLicensor($product_color)) {
        //     $storeBelongs = false;
        // }
        $stores = $this->product_color->getStores();
        $statistics = $this->product_color->getStatistics();
        $licensors = $this->product_color->getLicensors();
        $canDo = auth()->user()->role->canDoAll();
        $colors = $this->product_color->all();

        return view('pages.products.colors.show', compact('canDo', 'colors', 'color', 'storeBelongs', 'stores', 'statistics', 'licensors'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = $this->product_color->get($id);
        // if ($this->product_color->userIsLicensor() && !$this->product_color->productBelongsToLicensor($product_color)) {
        //     return redirect()->route('products.colors.index')->with(['permission_error' => 'not allowed']);
        // }
        $canDo = auth()->user()->role->canDoAll();

        $stores = $this->product_color->getStores();
        $statistics = $this->product_color->getStatistics();
        $licensors = $this->product_color->getLicensors();
        return view('pages.products.colors.edit', compact('color', 'canDo','stores', 'statistics', 'stores', 'licensors'));
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
        $color = $this->product_color->get($id);
        // if ($this->product_color->userIsLicensor() && !$this->product_color->productBelongsToLicensor($product_color)) {
        //     return redirect()->route('products.colors.index')->with(['permission_error', 'Not Allowed']);

            if ($this->product_color->is_valid()) {
                $this->product_color->update($id, $this->product_color->getFormValues());
                redirect()->back()->with('success', 'Your product brand has been updated sucessfully.');
            }
            return redirect()->back()->withErrors($this->product_color->getErrors());
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
        $product_color = $this->product_color->get($id);

        if ($this->product_color->userIsLicensor() && !$this->product_color->productBelongsToLicensor($product_color)) {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->product_color->delete($id);
        return redirect()->back()->with('success', 'product brand has been deleted !!');
    }
}