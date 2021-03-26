<?php

namespace App\Http\Controllers\CaseStudies;

use App\Http\Controllers\Controller;
use App\Repositories\CaseStudies\CaseStudyRepository;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    protected $case_study;
    protected $request;

    public function __construct(CaseStudyRepository $repository, Request $request)
    {
        $this->case_study = $repository;
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
        $case_studies = $this->case_study->all();
        $canDo = auth()->user()->role->canDoAll();
        $statistics = $this->case_study->getStatistics();
        $categories = $this->case_study->getCategories();
        $licensors = $this->case_study->getLicensors();
        $stores = $this->case_study->getStores();

        return view('pages.case-studies.index', compact('stores', 'licensors', 'statistics', 'canDo', 'case_studies', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $canDo = auth()->user()->role->canDoAll();
        $statistics = $this->case_study->getStatistics();
        $categories = $this->case_study->getCategories();
        $licensors = $this->case_study->getLicensors();
        $stores = $this->case_study->getStores();

        return view('pages.case-studies.create', compact('stores', 'licensors', 'statistics', 'canDo', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->case_study->store($this->case_study->submission());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $case_study = $this->case_study->get($id);
        $canDo = auth()->user()->role->canDoAll();
        $statistics = $this->case_study->getStatistics();
        $categories = $this->case_study->getCategories();
        $licensors = $this->case_study->getLicensors();
        $stores = $this->case_study->getStores();

        return view('pages.case-studies.show', compact('stores', 'licensors', 'statistics', 'canDo', 'case_study', 'categories'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $case_study = $this->case_study->get($id);
        $canDo = auth()->user()->role->canDoAll();
        $statistics = $this->case_study->getStatistics();
        $categories = $this->case_study->getCategories();
        $licensors = $this->case_study->getLicensors();
        $stores = $this->case_study->getStores();

        return view('pages.case-studies.edit', compact('stores', 'licensors', 'statistics', 'canDo', 'case_study', 'categories'));

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
        return $this->case_study->update($id, $this->case_study->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->case_study->delete($id);
    }
}
