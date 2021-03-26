<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Repositories\Projects\ProjectSubCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProjectSubCategoryController extends Controller
{

    protected $project_sub_category;
    protected $request;

    public function __construct(ProjectSubCategoryRepository $repository, Request $request)
    {
        $this->project_sub_category = $repository;
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
        $sub_categories = $this->project_sub_category->all();
        $licensors = $this->project_sub_category->all();
        $stores = $this->project_sub_category->all();
        $categories = $this->project_sub_category->all();
        $statistics = $this->project_sub_category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;

        return view('pages.projects.sub-categories.index', compact('canDo', 'sub_categories', 'statistics', 'licensors', 'stores', 'categories', 'storeBelongs'));
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $licensors = $this->project_sub_category->getLicensors();
        $stores = $this->project_sub_category->getStores();
        $categories = $this->project_sub_category->getCategories();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.projects.sub-categories.create', compact('canDo', 'categories', 'stores', 'licensors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->project_sub_category->store($this->project_sub_category->submission());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_category = $this->project_sub_category->get($id);
        $storeBelongs = true;
        // if ($this->project_sub_category->userIsLicensor() && !$this->project_sub_category->projectSubCategoryBelongsToLicensor($project_sub_category)) {
        //      $storeBelongs = false;
        // }
        $categories = $this->project_sub_category->all();
        $stores = $this->project_sub_category->getStores();
        $statistics = $this->project_sub_category->getStatistics();
        $licensors = $this->project_sub_category->getLicensors();
        $canDo = auth()->user()->role->canDoAll();
        $sub_categories = $this->project_sub_category->all();

        return view('pages.projects.sub-categories.show', compact('sub_categories', 'sub_category', 'categories', 'storeBelongs', 'stores', 'statistics', 'licensors', 'canDo'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_category = $this->project_sub_category->get($id);
        // if ($this->project_sub_category->userIsLicensor() && !$this->project_sub_category->projectBelongsToLicensor($project_sub_category)) {
        //     return redirect()->route('projects.sub_categories.index')->with(['permission_error' => 'not allowed']);
        // }
        $canDo = auth()->user()->role->canDoAll();

        $categories = $this->project_sub_category->getCategories();
        $stores = $this->project_sub_category->getStores();
        $statistics = $this->project_sub_category->getStatistics();
        $licensors = $this->project_sub_category->getLicensors();
        $canDo = auth()->user()->role->canDoAll();
        return view('pages.projects.sub-categories.edit', compact('sub_category', 'categories', 'statistics', 'stores', 'licensors', 'canDo'));
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
        $project_sub_category = $this->project_sub_category->get($id);
        // if ($this->project_sub_category->userIsLicensor() && !$this->project_sub_category->projectBelongsToLicensor($project_sub_category)) {
        //     return redirect()->route('projects.sub_categories.index')->with(['permission_error', 'Not Allowed']);

        if ($this->project_sub_category->is_valid()) {
            $this->project_sub_category->update($id, $this->project_sub_category->getFormValues());
            redirect()->back()->with('success', 'Your project brand has been updated sucessfully.');
        }
        return redirect()->back()->withErrors($this->project->getErrors());
        //}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project_sub_category = $this->project_sub_category->get($id);

        if ($this->project_sub_category->userIsLicensor() && !$this->project_sub_category->projectBelongsToLicensor($project_sub_category)) {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->project_sub_category->delete($id);
        return redirect()->back()->with('success', 'project brand has been deleted !!');
    }
}