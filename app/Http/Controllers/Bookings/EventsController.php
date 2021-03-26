<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Repositories\Bookings\EventsRepository;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    protected $event;
    protected $request;

    public function __construct(EventsRepository $repository, Request $request)
    {
        $this->event = $repository;
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
        $events = $this->event->all();
        $statistics = $this->event->getstatistics();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->event->getLicensors();
        $stores = $this->event->getStores();

        return view('pages.Bookings.events.index', compact('licensors', 'stores', 'events', 'statistics', 'canDo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->event->getLicensors();
        $stores = $this->event->getStores();
        $venues = $this->event->getVenues();
        $stores = $this->event->getStores();
        $licensors = $this->event->getLicensors();
        $services = $this->event->getServices();


        return view('pages.Bookings.events.create', compact('venues', 'canDo', 'stores', 'services','licensors'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->event->store($this->event->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = $this->event->get($id);
        $stores = $this->event->getStores();
        $licensors = $this->event->getLicensors();
        $venues = $this->event->getVenues();

        $canDo = auth()->user()->role->canDoAll();

        return view('pages.Bookings.events.show', compact('licensors', 'stores', 'event', 'venues', 'canDo'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = $this->event->get($id);
        $stores = $this->event->getStores();
        $licensors = $this->event->getLicensors();
        $venues = $this->event->getVenues();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.Bookings.events.edit', compact('licensors', 'stores', 'venues', 'event', 'canDo'));
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
        return $this->event->update($id, $this->event->submission());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->event->delete($id);
    }
}