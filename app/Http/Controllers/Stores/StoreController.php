<?php

namespace App\Http\Controllers\Stores;

use App\Http\Controllers\Controller;
use App\Model\Licensors\LicensorStore;
use App\Model\Stores\Store;
use App\Repositories\Stores\StoreCategoryRepository;
use App\Repositories\Stores\StoreRepository;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    protected $store;
    protected $categories;

    public function __construct(StoreRepository $repository, StoreCategoryRepository $categories)
    {
        $this->store = $repository;
        $this->categories = $categories;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $stores = $this->store->all();
        $statistics = $this->store->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $categories = $this->categories->all();
        $is = $this->categories->getIcons();

        return view('pages.stores.index', compact('stores', 'canDo', 'statistics', 'categories', 'is'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->store->getAllCategories();
        $hours = $this->store->getAllTradeHours();
        // $banks = $this->store->getBanks();
        $addresses = $this->store->getAllAddresses();


        $isAdmin = (Auth::user()->role->name == 'Administrator') ? true : false;
        return view('pages.stores.create', compact('isAdmin', 'categories', 'hours','addresses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        return $this->store->store($this->store->submission());
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
        // if ($this->store->userIsLicensor() && !$this->store->storeBelongsToLicensor($id)) {
        //     return redirect()->route('store.index')->with(['permission_error' => 'Not allowed']);
       ///    $storeBelongs = false;
        //}

        $store = $this->store->get($id);
        // $loads = $this->store->loads($id);
        // if store does not belong to licensor, don't show other stores.

        $statistics = $this->store->getStatistics();

        $canDo = auth()->user()->role->canDoAll();
        return view('pages.stores.show', compact('storeBelongs', 'store','statistics', 'canDo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $owned = "";

        if ($this->store->userIsLicensor()) {

            $owned = $this->store->storeLicensorOwn($id);
            if (!$owned) {
                return redirect()->route('store.index')->with(['permission_error' => 'Not allowed']);
            }
        }
        // licensorActive
        $store = $this->store->get($id);
        if ($owned) {
            $store->activate = $owned->isActive;
        }
        // $banks = $this->store->getBanks();
        $statistics = $this->store->getStatistics();
        $categories = $this->store->getAllCategories();
        $hours = $this->store->getAllTradeHours();
        return view('pages.stores.edit', compact('store', 'categories', 'hours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if ($this->store->userIsLicensor() && !$this->store->storeBelongsToLicensor($id)) {
            return redirect()->route('store.index')->with(['permission_error' => 'Not allowed']);
        }
        return $this->store->update($id, $this->store->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->store->userIsLicensor() && !$this->store->storeBelongsToLicensor($id)) {
            return redirect()->route('store.index')->with(['permission_error' => 'Not allowed']);
        }
        //DO: store owner

        return $this->store->delete($id);
    }

    public function activate($store_id)
    {

        if (Auth::user()->role->id == 4) {
            $store = $this->store->storeLicense($store_id);
            if ($store) {
                $store->update(['isActive' => '1']);
            } else {
                LicensorStore::create([
                    'licensor_id' => Auth::user()->licensorUser()->licensor_id,
                    'store_id' => $store_id,
                    'user_id' => Auth::user()->id,
                    'own_store' => 0,
                    'isActive' => 1,
                ]);
            }
        }
        return redirect()->route('store.index')->with('success', 'Store with ID: ' . $store_id . ' activated');
    }

    public function deactivate($store_id)
    {
        if (Auth::user()->role->id == 4) {
            $store = $this->store->storeLicense($store_id);
            if ($store) {
                $store->update(['isActive' => '0']);
            } else {
                LicensorStore::create([
                    'licensor_id' => Auth::user()->licensorUser()->licensor_id,
                    'store_id' => $store_id,
                    'user_id' => Auth::user()->id,
                    'own_store' => 0,
                    'isActive' => 0,
                ]);
            }
        }
        return redirect()->route('stores.index')->with('success', 'Store with ID: ' . $store_id . ' deactivated');

    }

    //TODO: permission ?
    public function getStoreCategory($id)
    {
        return $store = $this->store->get($id)->categories;
    }
    //TODO: permission ?
    public function getStoreHours($id)
    {
        return $store = $this->store->get($id)->hours;
    }

}