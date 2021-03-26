<?php

namespace App\Http\Controllers\web\Stores;


use App\Http\Controllers\Controller;
use App\Repositories\web\Stores\StoreCategoryRepository;
use App\Repositories\web\Stores\StoreRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;

class StoreCategoryController extends Controller
{

    protected $store;
    protected $categories;

    public function __construct(StoreRepository $store, StoreCategoryRepository $categories)
    {
        $this->store       = $store;
        $this->categories  = $categories;
        
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        //$licensors   = $this->licensor->all();
        //$statistics  = $this->licensor->getStatistics();

        $categories  = $this->categories->all();
        $canDo = auth()->user()->role->canDoAll();
        $is = $this->categories->getIcons();
        return view('pages.stores.category.index', compact('categories', 'canDo','is' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $is = $this->categories->getIcons();

        return view('pages.stores.category.create', ['is' => $is]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if($this->categories->is_valid())
        {
            $categories  = $this->categories->store($this->categories->getFormValues());
            return redirect()->route('stores.categories.index')->with('success', 'Category has been created');
        }
        return redirect()->back()->withErrors($this->categories->getErrors())->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // $storeBelongs = true;
        // if($this->categories->userIsLicensor() && !$this->categories->storeBelongsToLicensor($id)) {
        //     // return redirect()->route('store.index')->with(['permission_error' => 'Not allowed']);
        //     $storeBelongs = false;
        // }

        //DO: store owner

        $categories = $this->categories->get($id);
        // $loads = $this->store->loads($id);
        // if store does not belong to licensor, don't show other stores.

        $statistics = $this->categories->getStatistics();

        $canDo = auth()->user()->role->canDoAll();
        return view('pages.stores.category.show',compact('storeBelongs', 'categories','store', 'canDo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categories->get($id);
        $is = $this->categories->getIcons();
        return view('pages.stores.category.edit', compact('category', 'is' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

        if($this->categories->is_valid(true)) {
            $this->categories->update($id, $this->categories->getFormValues());
            return redirect()->route('stores.category.index')->with('success', 'Category has been updated');
        }
        return redirect()->back()->withErrors($this->categories->getErrors())->withInput();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->categories->userIsLicensor() && !$this->categories->storeBelongsToLicensor($id)) {
            return redirect()->route('store.index')->with(['permission_error' => 'Not allowed']);
        }
        //DO: store owner

        return $this->categories->delete($id);
    }

}