<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Repositories\Teams\TeamRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TeamController extends Controller
{

    protected $team;
    protected $request;

    public function __construct(TeamRepository $repository, Request $request)
    {
        $this->team = $repository;
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
        $teams = $this->team->all();
        $statistics = $this->team->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;

        return view('pages.teams.index', compact('canDo', 'teams', 'statistics', 'storeBelongs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $licensors = $this->team->getLicensors();
        $stores = $this->team->getStores();
        $statistics = $this->team->getStatistics();
        $team_members = $this->team->getTeamEmployees();
        $projects = $this->team->getTeamProjects();
        $skills = $this->team->getTeamSkills();
        $roles = $this->team->getRoles();

        return view('pages.teams.create', compact('team_members', 'skills', 'licensors', 'roles', 'stores','projects' ,'statistics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return $this->team->store($this->team->submission());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = $this->team->get($id);
        $statistics = $this->team->getStatistics();
        $roles = $this->team->getRoles();
        $storeBelongs = true;
        $isNotA = ($this->team->userIsNotAdmin()) ? 'true' : 'false';
        $canDo = auth()->user()->role->canDoAll();
        if ($this->team->userIsLicensor() && !$this->team->userBelongsToLicensor($id)) {
            return redirect()->route('teams.index')->with(['permission_error' => 'Not allowed']);
        }
        return view('pages.teams.show', compact('storeBelongs', 'team', 'canDo', 'isNotA', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = $this->team->get($id);
        if ($this->team->userIsLicensor() && !$this->team->projectBelongsToLicensor($team)) {
            return redirect()->route('teams.index')->with(['permission_error' => 'not allowed']);
        }
        $stores = $this->team->getStores;
        $statistics = $this->team->getStatistics();
        $licensors = $this->team->getLicensors();
        return view('pages.teams.edit', compact('team', 'stores', 'statistics', 'stores', 'licensors'));

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
        if ($this->team->userIsLicensor() && !$this->team->storeBelongsToLicensor($id)) {
            return redirect()->route('teams.index')->with(['permission_error' => 'Not allowed']);
        }
        return $this->team->update($id, $this->team->submission());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->team->userIsLicensor() && !$this->team->teamBelongsToLicensor($id)) {
            return redirect()->route('teams.index')->with(['permission_error' => 'Not allowed']);
        }
        $this->team->delete($id);
        return redirect()->back();
    }

    public function getTeams(Request $request)
    {
        // LeaveStatus::whereIn('leave_status', $request->input('leave_status', []))->get();
        $items = $request->get('leave_status');
        $selected_items = '';
        foreach ($items as $item) {
            //do something
            $selected_items .= $item . ',';
        }
        dd($selected_items);

    }
}