<?php

namespace App\Http\Controllers\Stores;

use App\Http\Controllers\Controller;
use App\Repositories\Stores\StoreBankRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreBankController extends Controller
{
    protected $bank;
    protected $request;

    public function __construct(StoreBankRepository $repository, Request $request)
    {
        $this->bank = $repository;
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

        $banks = $this->bank->all();
        $stores = $this->bank->getStores();
        $licensors = $this->bank->getLicensors();
        $statistics = $this->bank->getStatistics();
        // $bank_types = $this->bank->getbankTypes();
        $canDo = auth()->user()->role->canDoAll();

        $storeBelongs = true;
        return view('pages.stores.banks.index', compact('licensors', 'stores', 'banks', 'canDo', 'statistics', 'storeBelongs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statistics = $this->bank->getStatistics();
        $licensors = $this->bank->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.stores.banks.create', compact('statistics', 'licensors', 'canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->bank->store($this->bank->getFormValues());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = $this->bank->get($id);
        $storeBelongs = true;
        // if ($this->bank->userIsLicensor() && !$this->bank->bankBelongsToLicensor($bank)) {
        //     $storeBelongs = false;
        // }
        $stores = $this->bank->getStores();
        $statistics = $this->bank->getStatistics();
        // $bank_types = $this->bank->getbankTypes();
        $licensors = $this->bank->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.stores.banks.show', compact('bank', 'canDo', 'storeBelongs', 'stores', 'statistics', 'licensors'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = $this->bank->get($id);
        // if ($this->bank->userIsLicensor() && !$this->bank->projectBelongsToLicensor($bank)) {
        //     return redirect()->route('banks.index')->with(['permission_error' => 'not allowed']);
        // }
        // $bank_type = $this->bank->getbankTypes();
        // $stores = $this->bank->getStores();
        // $statistics = $this->bank->getStatistics();
        // $licensors = $this->bank->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.stores.banks.edit', compact('bank','canDo'));

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
        $banks = $this->bank->get($id);
        // if ($this->banks->userIsLicensor() && !$this->bank->bankBelongsToLicensor($bank)) {
        //     return redirect()->route('banks.index')->with(['permission_error', 'Not Allowed']);

            if ($this->bank->is_valid()) {
                $this->bank->update($id, $this->bank->getFormValues());
                redirect()->back()->with('success', 'Your banks has been updated sucessfully.');
            }
            return redirect()->back()->withErrors($this->bank->getErrors());
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = $this->bank->get($id);

        if ($this->bank->userIsLicensor() && !$this->bank->bankBelongsToLicensor($bank)) {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->bank->delete($id);
        return redirect()->back()->with('success', 'bank has been deleted !!');

    }
}