<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Repositories\Projects\ProjectCategoryRepository;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    protected $request;
    protected $category;

    public function __construct(projectCategoryRepository $repository, Request $request)
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
        $project_categories = $this->category->all();
        $statistics = $this->category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;

        return view('pages.projects.categories.index', compact('project_categories', 'statistics', 'canDo', 'storeBelongs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_category = $this->category->all();
        $licensors = $this->category->getLicensors();
        $stores = $this->category->getStores();
        $canDo = auth()->user()->role->canDoAll();
        return view('pages.projects.categories.create', compact('canDo', 'project_category', 'licensors', 'stores'));
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
        $project_category = $this->category->show($id);
        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;
        $project_categories = $this->category->all();
        $licensors = $this->category->getLicensors();
        $stores = $this->category->getStores();

        return view('pages.projects.categories.show', compact('licensors', 'stores', 'project_category', 'canDo', 'storeBelongs', 'project_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project_category = $this->category->get($id);
        $canDo = $this->auth()->user()->role->canDoAll();
        $licensors = $this->category->getLicensors();
        $stores = $this->category->getStores();

        return view('pages.projects.categories.edit', compact('licensors', 'project_category', 'stores', 'canDo'));
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
        $this->category->delete($id);

    }
}