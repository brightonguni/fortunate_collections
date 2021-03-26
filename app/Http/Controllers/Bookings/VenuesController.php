<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Repositories\Bookings\VenuesRepository;
use Illuminate\Http\Request;

class VenuesController extends Controller
{
    protected $venue;
    protected $request;

    public function __construct(VenuesRepository $repository, Request $request)
    {
        $this->venue = $repository;
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
        $venues = $this->venue->all();
        $statistics = $this->venue->getStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.bookings.venues.index', compact('venues', 'statistics', 'canDo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->venue->getLicensors();
        $stores = $this->venue->getStores();

        return view('pages.bookings.venues.create', compact('licensors', 'stores', 'canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->venue->store($this->venue->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venue = $this->venue->get($id);
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.bookings.venues.show', compact('venue', 'canDo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venue = $this->venue->get($id);
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.bookings.venues.edit', compact('venue', 'canDo'));

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
        return $this->venue->update($id, $this->venue->submission());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->venue->delete($id);
    }
}