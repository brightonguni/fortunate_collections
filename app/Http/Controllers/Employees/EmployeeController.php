<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Repositories\Employees\EmployeeRepository;
use App\Repositories\Licensors\LicensorRepository;
use Illuminate\Support\Facades\App;

class EmployeeController extends Controller
{
    protected $employee;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employee = $employeeRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $employees = $this->employee->all();
        $statistics = $this->employee->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $departments = $this->employee->getDepartments();
        $skills = $this->employee->getSkills();
        $contracts = $this->employee->getContracts();
        $projects = $this->employee->getProjects();
        $job_titles = $this->employee->getJobTitles();
        $stores = $this->employee->getStores();
        $licensors = $this->employee->getLicensors();

        return view('pages.employees.index',
            compact(
                'employees',
                'statistics',
                'canDo',
                'projects',
                'contracts',
                'skills',
                'job_titles',
                'departments',
                'licensors',
                'stores'
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $licensors = App::make(LicensorRepository::class)->all();
        $roles = $this->employee->getRoles();
        $departments = $this->employee->getDepartments();
        $skills = $this->employee->getSkills();
        $contracts = $this->employee->getContracts();
        $contractTypes = $this->employee->getContractTypes();
        $projects = $this->employee->getProjects();
        $job_titles = $this->employee->getJobTitles();
        $teams = $this->employee->getTeams();
        //if ($this->customer->userIsNotAdmin()) {
        unset($roles[0]);
        //}

        return view('pages.employees.create',
            compact(
                'licensors',
                'teams',
                'roles',
                'projects',
                'contracts',
                'skills',
                'job_titles',
                'departments',
                'contractTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        return $this->employee->store($this->employee->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $employees = $this->employee->get($id);
        $statistics = $this->employee->getStatistics();
        $departments = $this->employee->getDepartments();
        $skills = $this->employee->getSkills();
        $contracts = $this->employee->getContracts();
        $projects = $this->getProjects();
        $job_titles = $this->getJobTitles();
        $roles = $this->employee->getRoles();
        $storeBelongs = true;
        $isNotA = ($this->employee->userIsNotAdmin()) ? 'true' : 'false';

        $canDo = auth()->user()->role->canDoAll();
        if ($this->employee->userIsLicensor() && !$this->employee->userBelongsToLicensor($id)) {
            return redirect()->route('employees.index')->with(['permission_error' => 'Not allowed']);
        }

        return view('pages.employees.show',
            compact('storeBelongs',
                'employee',
                'statistics',
                'canDo',
                'isNotA',
                'roles',
                'projects',
                'contracts',
                'skills',
                'job_titles',
                'departments'
            ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $employee = $this->employee->get($id);
        $departments = $this->employee->getDepartments();
        $skills = $this->employee->getSkills();
        $contracts = $this->employee->getContracts();
        $projects = $this->getProjects();
        $job_titles = $this->getJobTitles();

        $roles = $this->employee->getRoles();
        if ($this->employee->userIsNotAdmin() || $employee->role()->id != 1) {
            unset($roles[0]);
        }

        if (!$this->employee->userIsNotAdmin() && $employee->role()->id == 1) {
            unset($roles[1]);
            unset($roles[3]);
            unset($roles[2]);
        }

        if ($this->employee->userIsLicensor() && !$this->employee->userBelongsToLicensor($id)) {
            return redirect()->route('users.index')->with(['permission_error' => 'Not allowed']);
        }
        $stores = $this->employee->getStores();

        //DO: store owner

        $licensors = App::make(LicensorRepository::class)->all();
        return view('pages.employees.edit',
            compact(
                'employee',
                'roles',
                'stores',
                'licensors',
                'projects',
                'contracts',
                'skills',
                'job_titles',
                'departments'
            ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if ($this->employee->userIsLicensor() && !$this->employee->userBelongsToLicensor($id)) {
            return redirect()->route('employees.index')->with(['permission_error' => 'Not allowed']);
        }
        //DO: store owner

        return $this->employee->update($id, $this->employee->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->employee->userIsLicensor() && !$this->employee->userBelongsToLicensor($id)) {
            return redirect()->route('users.index')->with(['permission_error' => 'Not allowed']);
        }
        //DO: store owner

        $this->employee->delete($id);
        return redirect()->back();
    }

}