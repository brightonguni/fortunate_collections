<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Repositories\Bookings\BookingRepository;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $booking;
    protected $request;

    public function __construct(BookingRepository $repository, Request $request)
    {
        $this->booking = $repository;
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
        $bookings = $this->booking->all();
        $venues = $this->booking->getAllVenues();
        $categories = $this->booking->getAllCategories();
        $services = $this->booking->getAllServices();
        $events = $this->booking->getAllEvents();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->booking->getLicensors();
        $stores = $this->booking->getStores();
        $statistics = $this->booking->getStatistics();

        return view('pages.bookings.index', compact('bookings', 'statistics', 'stores', 'licensors', 'events', 'venues', 'services', 'categories', 'canDo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->booking->getCategories();
        $services = $this->booking->getServices();
        $venues = $this->booking->getVenues();
        $events = $this->booking->getEvents();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->booking->getLicensors();
        $stores = $this->booking->getStores();

        return view('pages.bookings.create', compact('stores', 'licensors', 'canDo', 'events', 'venues', 'services', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->booking->store($this->booking->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = $this->booking->get($id);
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.bookings.show', compact('canDo', 'booking'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = $this->booking->get($id);
        $venues = $this->booking->getVenues();
        $events = $this->booking->getEvents();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->booking->getLicensors();
        $stores = $this->booking->getStores();

        return view('pages.bookings.edit', compact('stores', 'licensors', 'canDo', 'booking', 'events', 'venues'));

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
        return $this->booking->update($id, $this->booking->submission());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->booking->delete($id);
    }
}