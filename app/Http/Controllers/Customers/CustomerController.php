<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Model\Stores\Store;
use App\Repositories\Customers\CustomerRepository;
use App\Repositories\Licensors\LicensorRepository;
use Illuminate\Support\Facades\App;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customer = $customerRepository;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $customers = $this->customer->all();
        $statistics = $this->customer->getStatistics();
        $canDo = auth()->user()->role->canDoAll();
        return view('pages.customers.index', compact('customers', 'canDo', 'statistics'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $licensors = App::make(LicensorRepository::class)->all();
        $roles = $this->customer->getRoles();
        //if ($this->customer->userIsNotAdmin()) {
        unset($roles[0]);
        //}
        return view('pages.customers.create', compact('licensors', 'roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        return $this->customer->store($this->customer->submission());
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $customer = $this->customer->get($id);
        // $statistics = $this->customer->getStatistics();
        $roles = $this->customer->getRoles();
        $storeBelongs = true;
        $isNotA = ($this->customer->userIsNotAdmin()) ? 'true' : 'false';
        $canDo = auth()->user()->role->canDoAll();
        if ($this->customer->userIsLicensor() && !$this->customer->userBelongsToLicensor($id)) {
            return redirect()->route('users.index')->with(['permission_error' => 'Not allowed']);
        }
        return view('pages.customers.show', compact('storeBelongs', 'customer', 'canDo', 'isNotA', 'roles'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $customer = $this->customer->get($id);
        $roles = $this->customer->getRoles();
        if ($this->customer->userIsNotAdmin() || $customer->role()->id != 1) {
            unset($roles[0]);
        }
        if (!$this->customer->userIsNotAdmin() && $customer->role()->id == 1) {
            unset($roles[1]);
            unset($roles[3]);
            unset($roles[2]);
        }
        if ($this->customer->userIsLicensor() && !$this->customer->userBelongsToLicensor($id)) {
            return redirect()->route('users.index')->with(['permission_error' => 'Not allowed']);
        }
        $stores = $this->customer->getStores();
        $licensors = App::make(LicensorRepository::class)->all();
        return view('pages.customers.edit', compact('customer', 'roles', 'stores', 'licensors'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if ($this->customer->userIsLicensor() && !$this->customer->userBelongsToLicensor($id)) {
            return redirect()->route('users.index')->with(['permission_error' => 'Not allowed']);
        }
        return $this->customer->update($id, $this->customer->submission());
    }
    /**
     * Remove the specified resource from storage.
     *
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->customer->userIsLicensor() && !$this->customer->userBelongsToLicensor($id)) {
            return redirect()->route('users.index')->with(['permission_error' => 'Not allowed']);
        }
        $this->customer->delete($id);
        return redirect()->back();
    }
}
