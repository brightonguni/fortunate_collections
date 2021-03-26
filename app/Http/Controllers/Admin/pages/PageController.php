<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\Pages\PageRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{

    protected $page;
    protected $request;

    public function __construct(PageRepository $pageRepository, Request $request)
    {
        $this->page = $pageRepository;
        $this->middleware('auth');
        $this->request = $request;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->page->all();
        $stores = $this->page->getStores();
        $licensors = $this->page->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.pages.pages.index', compact('pages', 'licensors', 'stores', 'canDo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = $this->page->getStores();
        $licensors = $this->page->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.pages.pages.create', compact('licensors', 'stores', 'canDo'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->page->store($this->page->submission());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = $this->page->get($id);
        $stores = $this->page->index();
        $licensors = $this->page->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.pages.pages.show', compact('page', 'licensors', 'stores', 'canDo'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $page = $this->page->get($id);
        $stores = $this->page->index();
        $licensors = $this->page->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('web.pages.pages.pages.edit', compact('pages', 'licensors', 'stores', 'canDo'));

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
        return $this->page->update($id, $this->page->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->page->delete($id);
    }
}