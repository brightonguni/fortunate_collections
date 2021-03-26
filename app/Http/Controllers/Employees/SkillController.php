<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Skills\SkillsRepository;

class SkillController extends Controller
{
    protected $request;
    protected $skill;

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
        $statistics = $this->skill->getStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.employees.skills.index', compact('skills', 'statistics', 'canDo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $skills = $this->skill->all();
        //$categories = $this->skill->getSkillCategories();
        $licensors = $this->skill->getLicensors();
        $stores = $this->skill->getStores();
        $canDo = auth()->user()->role->canDoAll();
        return view('pages.employees.skills.create', compact('canDo', 'licensors', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->skill->store($this->skill->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skill = $this->skill->show($id);
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->skill->getLicensors();
        $stores = $this->skill->getStores();

        return view('pages.employee.skills.show', compact('skill', 'stores', 'licensors', 'canDo'));
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
        $canDo = $this->auth()->user()->role->canDoAll();
        $licensors = $this->skill->getLicensors();
        $stores = $this->skill->getStores();

        return view('pages.employees.skills.edit', compact('skill', 'licensors', 'stores', 'canDo'));
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
        return $this->skill->update($id, $this->skill->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->skill->delete($id);

    }
}