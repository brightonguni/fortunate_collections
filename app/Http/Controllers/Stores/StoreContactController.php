<?php

namespace App\Http\Controllers\Stores;

use App\Http\Controllers\Controller;
use App\Repositories\Stores\StoreContactRepository;
use Illuminate\Http\Request;

class StoreContactController extends Controller
{
    protected $contact;
    protected $request;

    public function __construct(StoreContactRepository $repository, Request $request)
    {
        $this->contact = $repository;
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

        $contacts = $this->contact->all();
        $stores = $this->contact->getStores();
        $licensors = $this->contact->getLicensors();
        $statistics = $this->contact->getStatistics();
        // $contact_types = $this->contact->getcontactTypes();
        $canDo = auth()->user()->role->canDoAll();
        $users = $this->contact->getUsers();

        $storeBelongs = true;
        return view('pages.stores.contacts.index', compact('licensors', 'stores', 'contacts', 'users', 'canDo', 'statistics', 'storeBelongs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statistics = $this->contact->getStatistics();
        $stores = $this->contact->getStores();
        $licensors = $this->contact->getLicensors();
        $canDo = auth()->user()->role->canDoAll();
        $users = $this->contact->getUsers();
        return view('pages.stores.contacts.create', compact('statistics','licensors', 'stores', 'canDo', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->contact->store($this->contact->submission());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->contact->get($id);
        $storeBelongs = true;
        // if ($this->contact->userIsLicensor() && !$this->contact->contactBelongsToLicensor($contact)) {
        //     $storeBelongs = false;
        // }
        $stores = $this->contact->getStores();
        $statistics = $this->contact->getStatistics();
        // $contact_types = $this->contact->getcontactTypes();
        $licensors = $this->contact->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.stores.contacts.show', compact('contact', 'canDo', 'storeBelongs', 'stores', 'statistics', 'licensors'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = $this->contact->get($id);
        // if ($this->contact->userIsLicensor() && !$this->contact->projectBelongsToLicensor($contact)) {
        //     return redirect()->route('contacts.index')->with(['permission_error' => 'not allowed']);
        // }
        // $contact_type = $this->contact->getcontactTypes();
        $stores = $this->contact->getStores();
        $statistics = $this->contact->getStatistics();
        $licensors = $this->contact->getLicensors();
        $canDo = auth()->user()->role->canDoAll();
$users = $this->contact->getUsers();

        return view('pages.stores.contacts.edit', compact('contact','canDo', 'stores', 'statistics','users', 'licensors'));

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
        $contacts = $this->contact->get($id);
        // if ($this->contacts->userIsLicensor() && !$this->contact->contactBelongsToLicensor($contact)) {
        //     return redirect()->route('contacts.index')->with(['permission_error', 'Not Allowed']);

            if ($this->contact->is_valid()) {
                $this->contact->update($id, $this->contact->getFormValues());
                redirect()->back()->with('success', 'Your contacts has been updated sucessfully.');
            }
            return redirect()->back()->withErrors($this->contact->getErrors());
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = $this->contact->get($id);

        if ($this->contact->userIsLicensor() && !$this->contact->contactBelongsToLicensor($contact)) {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->contact->delete($id);
        return redirect()->back()->with('success', 'contact has been deleted !!');

    }
}