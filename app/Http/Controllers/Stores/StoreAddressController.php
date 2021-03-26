<?php

namespace App\Http\Controllers\Stores;

use App\Http\Controllers\Controller;
use App\Repositories\Stores\StoreAddressRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreAddressController extends Controller
{
    protected $address;
    protected $request;

    public function __construct(StoreAddressRepository $repository, Request $request)
    {
        $this->address = $repository;
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
        $addresses = $this->address->all();
        $statistics = $this->address->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->address->getLicensors();
        $stores = $this->address->getStores();

        return view('pages.stores.address.index', compact('addresses', 'stores', 'licensors', 'statistics', 'canDo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->address->getLicensors();
        $stores = $this->address->getStores();

        return view('pages.stores.Address.create', compact('licensors', 'stores', 'canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->address->store($this->address->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = $this->address->get($id);
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->address->getLicensors();
        $stores = $this->address->getStores();

        return view('pages.stores.address.show', compact('licensors', 'stores', 'address', 'canDo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = $this->address->get($id);
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->address->getLicensors();
        $stores = $this->address->getStores();

        return view('pages.stores.address.edit', compact('licensors', 'stores', 'address', 'canDo'));

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
        return $this->address->update($id, $this->address->submission());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->address->delete($id);
    }
}