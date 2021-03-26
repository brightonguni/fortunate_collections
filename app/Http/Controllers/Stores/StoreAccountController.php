<?php

namespace App\Http\Controllers\Stores;

use App\Http\Controllers\Controller;
use App\Repositories\Stores\StoreAccountRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreAccountController extends Controller
{
    protected $account;
    protected $request;

    public function __construct(StoreAccountRepository $repository, Request $request)
    {
        $this->account = $repository;
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

        $accounts = $this->account->all();
        $stores = $this->account->getStores();
        $licensors = $this->account->getLicensors();
        $statistics = $this->account->getStatistics();
        // $account_types = $this->account->getAccountTypes();
        $canDo = auth()->user()->role->canDoAll();

        $storeBelongs = true;
        return view('pages.stores.accounts.index', compact('licensors', 'stores', 'accounts', 'canDo', 'statistics', 'storeBelongs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statistics = $this->account->getStatistics();
        $banks = $this->account->getBanks();
        $canDo = auth()->user()->role->canDoAll();
        $stores = $this->account->getStores();

        return view('pages.stores.accounts.create', compact('statistics', 'stores', 'canDo', 'banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->account->store($this->account->getFormValues());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = $this->account->get($id);
        $storeBelongs = true;
        // if ($this->account->userIsLicensor() && !$this->account->accountBelongsToLicensor($account)) {
        //     $storeBelongs = false;
        // }
        $stores = $this->account->getStores();
        $statistics = $this->account->getStatistics();
        // $account_types = $this->account->getaccountTypes();
        $licensors = $this->account->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.stores.accounts.show', compact('account', 'canDo', 'storeBelongs', 'stores', 'statistics', 'licensors'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = $this->account->get($id);
        if ($this->account->userIsLicensor() && !$this->account->projectBelongsToLicensor($account)) {
            return redirect()->route('accounts.index')->with(['permission_error' => 'not allowed']);
        }
        $account_type = $this->account->getaccountTypes();
        $stores = $this->account->getStores();
        $statistics = $this->account->getStatistics();
        $licensors = $this->account->getLicensors();
        return view('pages.stores.accounts.edit', compact('account', 'stores', 'statistics', 'stores', 'licensors'));

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
        $accounts = $this->account->get($id);
        if ($this->accounts->userIsLicensor() && !$this->account->accountBelongsToLicensor($account)) {
            return redirect()->route('accounts.index')->with(['permission_error', 'Not Allowed']);

            if ($this->account->is_valid()) {
                $this->account->update($id, $this->account->getFormValues());
                redirect()->back()->with('success', 'Your accounts has been updated sucessfully.');
            }
            return redirect()->back()->withErrors($this->account->getErrors());
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
        $account = $this->account->get($id);

        if ($this->account->userIsLicensor() && !$this->account->accountBelongsToLicensor($account)) {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->account->delete($id);
        return redirect()->back()->with('success', 'account has been deleted !!');

    }
}