<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Repositories\Employees\ContractsRepository;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    protected $contract;

    public function __construct(ContractsRepository $contractsRepository)
    {
        $this->contract = contractsRepository;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = $this->contract->all();
        $statistics = $this->contract->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        $stores = $this->skill->getStores();
        $licensors = $this->skill->getLicensors();

        return view('pages.employees.contracts.index', compact('contracts', 'statistics', 'canDo', 'stores', 'licensors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contract_types = $this->contract->getContractTypes();
        $canDo = auth()->user()->role->canDoAll();
        $stores = $this->skill->getStores();
        $licensors = $this->skill->getLicensors();

        return view('pages.employees.contracts.create', compact('canDo', 'stores', 'licensors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->contract->store($this->contract->getFormValues());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = $this->contract->get($id);
        $storeBelongs = true;
        if ($this->contract->userIsLicensor() && !$this->contract->contractBelongsToLicensor($contract)) {
            $storeBelongs = false;
            return redirect()->route('contracts.index')->with(['permission_error' => 'Not allowed']);
        }

        $stores = $this->contract->getStores();
        $statistics = $this->contract->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        return view('pages.employees.contracts.show', compact('contract', 'storeBelongs', 'stores', 'canDo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contracts = $this->contract->get($id);
        if ($this->contract->userIsLicensor() && !$this->contract->contractBelongsToLicensor($contract)) {
            return redirect()->route('contract.index')->with(['permission_error' => 'Not allowed']);
        }
        $stores = $this->contract->getStores();
        $statistics = $this->contract->getStatistics();
        return view('pages.employees.contracts.edit', compact('contracts', 'stores', 'statistics'));

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
        $contract = $this->contract->get($id);
        if ($this->contract->userIsLicensor() && !$this->contract->contractBelongsToLicensor($contract)) {
            return redirect()->route('contracts.index')->with(['permission_error' => 'Not allowed']);
        }
        // store owner

        if ($this->contract->is_valid()) {
            $this->contract->update($id, $this->contract->getFormValues());
            return redirect()->back()->with('success', 'Your Contract has been updated successfully.');
        }

        return redirect()->back()->withErrors($this->contract->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract = $this->contract->get($id);

        if ($this->contract->userIsLicensor() && !$this->contract->contractBelongsToLicensor($contract)) 
        {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->contract->delete($id);
        return redirect()->back()->with('success', 'Contract has been deleted !!');
    }
    
}
