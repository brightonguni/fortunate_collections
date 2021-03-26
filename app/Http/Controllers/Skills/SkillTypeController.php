<?php

namespace App\Http\Controllers\Skills;

use App\Http\Controllers\Controller;
use App\Repositories\Skills\SkillsTypeRepository;
use Illuminate\Http\Request;

class SkillTypeController extends Controller
{

    protected $skill_type;
    protected $request;

    public function __construct(SkillsTypeRepository $repository, Request $request)
    {
        $this->skill_type = $repository;
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
        $skill_types = $this->skill_type->all();
        $stores = $this->skill_type->getStores();
        $licensors = $this->skill_type->getLicensors();
        $statistics = $this->skill_type->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;

        return view('pages.skills.skill_types.index', compact('canDo', 'statistics', 'storeBelongs', 'skill_types'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = $this->skill_type->getStores();
        $licensors = $this->skill_type->getLicensors();
        $statistics = $this->skill_type->getStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.skills.skill_types.create', compact('licensors', 'stores', 'statistics', 'canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
