<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Repositories\Projects\ProjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProjectController extends Controller
{

    protected $project;
    protected $request;

    public function __construct(ProjectRepository $repository, Request $request)
    {
        $this->project = $repository;
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
        $projects = $this->project->all();
        $statistics = $this->project->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;
        $licensors = $this->project->getLicensors();
        $stores = $this->project->getStores();
        $teams = $this->project->getAllTeams();
        $project_categories = $this->project->getAllCategories();
        $categories = $this->project->getAllCategories();
        $skill_levels = $this->project->getSkillLevels();
        $skills = $this->project->getAllSkills();
        $sub_categories = $this->project->getAllSubCategories();
        $services = $this->project->getAllServices();

        return view('pages.projects.index', compact('canDo', 'services', 'sub_categories', 'skills', 'categories', 'stores', 'licensors', 'project_categories', 'teams', 'skill_levels', 'projects', 'statistics', 'storeBelongs'));
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = $this->project->getStores();
        $statistics = $this->project->getStatistics();
        $licensors = $this->project->getLicensors();
        $categories = $this->project->getAllCategories();
        $skills = $this->project->getAllSkills();
        $services = $this->project->getAllServices();
        $canDo = auth()->user()->role->canDoAll();
        $sub_categories = $this->project->getAllSubCategories();

        return view('pages.projects.create', compact('canDo', 
        'sub_categories', 'services', 'stores', 
        'categories', 'statistics', 
        'licensors', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->project->store($this->project->submission());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = $this->project->get($id);
        $storeBelongs = true;
        // if ($this->project->userIsLicensor() && !$this->project->projectBelongsToLicensor($project)) {
        //     $storeBelongs = false;
        // }
        $stores = $this->project->getStores();
        $statistics = $this->project->getStatistics();
        $team = $this->project->getTeams();
        $licensors = $this->project->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.projects.show', compact('project', 'storeBelongs', 'stores',  'statistics', 'licensors','canDo'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = $this->project->get($id);
        if ($this->project->userIsLicensor() && !$this->project->projectBelongsToLicensor($project)) {
            return redirect()->route('projects.index')->with(['permission_error' => 'not allowed']);
        }
        $stores = $this->project->getStores;
        $teams = $this->project->getTeams();
        $statistics = $this->project->getStatistics();
        $licensors = $this->project->getTeams();
        return view('pages.projects.edit', compact('project', 'stores', 'statistics', 'stores', 'teams', 'licensors'));
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
        $project = $this->project->get($id);
        if ($this->project->userIsLicensor() && !$this->project->projectBelongsToLicensor($project)) {
            return redirect()->route('projects.index')->with(['permission_error', 'Not Allowed']);

            if ($this->project->is_valid()) {
                $this->project->update($id, $this->project->getFormValues());
                redirect()->back()->with('success', 'Your Project has been updated sucessfully.');
            }
            return redirect()->back()->withErrors($this->project->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = $this->project->get($id);

        if ($this->project->userIsLicensor() && !$this->project->projectBelongsToLicensor($project)) {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->project->delete($id);
        return redirect()->back()->with('success', 'Project has been deleted !!');
    }
}