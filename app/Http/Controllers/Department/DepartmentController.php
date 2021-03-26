<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Repositories\Departments\DepartmentsRepository;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $department;
    protected $request;

    public function __construct(DepartmentsRepository $repository, Request $request)
    {
        $this->department = $repository;
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

        $departments = $this->department->all();
        $stores = $this->department->getStores();
        $licensors = $this->department->getLicensors();
        $statistics = $this->department->getStatistics();
        // $department_types = $this->department->getdepartmentTypes();
        $canDo = auth()->user()->role->canDoAll();

        $storeBelongs = true;
        return view('pages.departments.index', compact('licensors', 'stores', 'departments', 'canDo', 'statistics', 'storeBelongs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statistics = $this->department->getStatistics();
        $licensors = $this->department->getLicensors();
        $stores = $this->department->getStores();

        return view('pages.departments.create', compact('statistics', 'licensors', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->department->store($this->department->getFormValues());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = $this->department->get($id);
        $storeBelongs = true;
        // if ($this->department->userIsLicensor() && !$this->department->departmentBelongsToLicensor($department)) {
        //     $storeBelongs = false;
        // }
        $stores = $this->department->getStores();
        $statistics = $this->department->getStatistics();
        // $department_types = $this->department->getdepartmentTypes();
        $licensors = $this->department->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.departments.show', compact('department', 'canDo', 'storeBelongs', 'stores', 'statistics', 'licensors'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = $this->department->get($id);
        if ($this->department->userIsLicensor() && !$this->department->projectBelongsToLicensor($department)) {
            return redirect()->route('departments.index')->with(['permission_error' => 'not allowed']);
        }
        $department_type = $this->department->getdepartmentTypes();
        $stores = $this->department->getStores();
        $statistics = $this->department->getStatistics();
        $licensors = $this->department->getLicensors();
        return view('pages.departments.edit', compact('department', 'stores', 'statistics', 'stores', 'licensors'));

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
        $departments = $this->department->get($id);
        if ($this->departments->userIsLicensor() && !$this->department->departmentBelongsToLicensor($department)) {
            return redirect()->route('departments.index')->with(['permission_error', 'Not Allowed']);

            if ($this->department->is_valid()) {
                $this->department->update($id, $this->department->getFormValues());
                redirect()->back()->with('success', 'Your departments has been updated sucessfully.');
            }
            return redirect()->back()->withErrors($this->department->getErrors());
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
        $department = $this->department->get($id);

        if ($this->department->userIsLicensor() && !$this->department->departmentBelongsToLicensor($department)) {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->department->delete($id);
        return redirect()->back()->with('success', 'department has been deleted !!');

    }
}