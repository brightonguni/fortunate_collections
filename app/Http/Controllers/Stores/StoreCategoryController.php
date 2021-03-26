<?php

namespace App\Http\Controllers\Stores;

use App\Http\Controllers\Controller;
use App\Repositories\Stores\StoreCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreCategoryController extends Controller
{

    protected $categories;
    protected $request;
    public function __construct(StoreCategoryRepository $categories, Request $request)
    {
        $this->categories = $categories;
        $this->middleware('auth');
        $this->request = $request;

    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $statistics = $this->categories->getStatistics();
        $categories = $this->categories->all();
        $canDo = auth()->user()->role->canDoAll();
        
        return view('pages.stores.category.index', compact('categories','canDo', 'statistics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.stores.category.create',compact('canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if ($this->categories->is_valid()) {
            $categories = $this->categories->store($this->categories->getFormValues());
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
        $storeBelongs = true;
        // if($this->categories->userIsLicensor() && !$this->categories->storeBelongsToLicensor($id)) {
        //     // return redirect()->route('store.index')->with(['permission_error' => 'Not allowed']);
        //     $storeBelongs = false;
        // }

        //DO: store owner

        $category = $this->categories->get($id);
        // $loads = $this->store->loads($id);
        // if store does not belong to licensor, don't show other stores.

        $statistics = $this->categories->getStatistics();

        $canDo = auth()->user()->role->canDoAll();
        return view('pages.stores.category.show', compact('storeBelongs', 'category',  'canDo'));
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
        return view('pages.stores.category.edit', compact('category', 'is'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

        if ($this->categories->is_valid(true)) {
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
        if ($this->categories->userIsLicensor() && !$this->categories->storeBelongsToLicensor($id)) {
            return redirect()->route('store.index')->with(['permission_error' => 'Not allowed']);
        }
        //DO: store owner

        return $this->categories->delete($id);
    }

}