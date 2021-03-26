<?php

namespace App\Http\Controllers\Skills;

use App\Http\Controllers\Controller;
use App\Model\Employees\Skill;
use App\Repositories\Skills\SkillsRepository;
use Illuminate\Http\Request;

class SkillController extends Controller
{

    protected $skill;
    protected $request;

    public function __construct(SkillsRepository $repository, Request $request)
    {
        $this->skill = $repository;
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

        $skills = $this->skill->all();
        $stores = $this->skill->getStores();
        $licensors = $this->skill->getLicensors();
        $statistics = $this->skill->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;
        return view('pages.skills.index', compact('skills', 'canDo', 'statistics', 'storeBelongs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statistics = $this->skill->getStatistics();
        $licensors = $this->skill->getLicensors();
        $stores = $this->skill->getStores();
        $skill_levels = $this->skill->getSkillLevels();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.skills.create', compact('skill_levels', 'statistics', 'licensors', 'stores', 'canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->skill->store($this->skill->getFormValues());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skill = $this->skill->get($id);
        $stores = $this->skill->getStores();
        $statistics = $this->skill->getStatistics();
        $skill_types = $this->skill->getSkillTypes();
        $licensors = $this->skill->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.skills.show', compact('skill', 'stores', 'statistics', 'licensors', 'canDo'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = $this->skill->get($id);
        if ($this->skill->userIsLicensor() && !$this->skill->projectBelongsToLicensor($skill)) {
            return redirect()->route('skills.index')->with(['permission_error' => 'not allowed']);
        }
        $skill_type = $this->skill->getSkillTypes();
        $stores = $this->skill->getStores();
        $statistics = $this->skill->getStatistics();
        $licensors = $this->skill->getLicensors();
        return view('pages.skills.edit', compact('skill', 'stores', 'statistics', 'stores', 'licensors'));

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
        $skills = $this->skill->get($id);
        if ($this->skills->userIsLicensor() && !$this->skill->skillBelongsToLicensor($skill)) {
            return redirect()->route('skills.index')->with(['permission_error', 'Not Allowed']);

            if ($this->skill->is_valid()) {
                $this->skill->update($id, $this->skill->getFormValues());
                redirect()->back()->with('success', 'Your Skills has been updated sucessfully.');
            }
            return redirect()->back()->withErrors($this->skill->getErrors());
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
        $skill = $this->skill->get($id);

        if ($this->skill->userIsLicensor() && !$this->skill->skillBelongsToLicensor($skill)) {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->skill->delete($id);
        return redirect()->back()->with('success', 'Skill has been deleted !!');

    }
}