<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Repositories\Bookings\BookingCategoryRepository;
use Illuminate\Http\Request;

class BookingCategoryController extends Controller
{

    protected $category;
    protected $request;

    public function __construct(BookingCategoryRepository $repository, Request $request)
    {

        $this->category = $repository;
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
        $categories = $this->category->all();
        $statistics = $this->category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.Bookings.categories.index', compact('categories', 'canDo', statistics));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canDo = auth()->user()->role->canDoAll();
        return view('pages.bookings.categories.create', compact('canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->category->store($this->category->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->category->get($id);
        $canDo = auth()->user()->role->canDoAll();

        return view('bookings.categories.show', compact('category', 'canDo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->get($id);
        $canDo = auth()->user()->role->canDoAll();

        return view('bookings.categories.show', compact('category', 'canDo'));
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
        return $this->category->update($id, $this->category->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->category->delete($id);
    }
}