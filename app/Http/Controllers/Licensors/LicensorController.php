<?php

namespace App\Http\Controllers\Licensors;

use App\Http\Controllers\Controller;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreRepository;

class LicensorController extends Controller
{

    protected $licensor;
    protected $store;

    public function __construct(LicensorRepository $licensor, StoreRepository $store)
    {
        $this->licensor = $licensor;
        $this->store    = $store;
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $licensors   = $this->licensor->all();
        $statistics  = $this->licensor->getStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.licensors.index', compact('licensors', 'canDo', 'statistics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.licensors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if($this->licensor->is_valid())
        {
            $licensor = $this->licensor->store($this->licensor->getFormValues());
            return redirect()->route('licensors.show', [$licensor->id])->with('success', 'Licensor has been created');
        }
        return redirect()->back()->withErrors($this->licensor->getErrors())->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $licensor = $this->licensor->get($id);
        $sales = $this->store->getSales();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.licensors.show', compact('licensor', 'canDo', 'sales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $licensor = $this->licensor->get($id);
        return view('pages.licensors.edit', compact('licensor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

        if($this->licensor->is_valid(true)) {
            $this->licensor->update($id, $this->licensor->getFormValues());
            return redirect()->route('licensors.show', [$id])->with('success', 'Licensor has been updated');
        }
        return redirect()->back()->withErrors($this->licensor->getErrors())->withInput();
    }

    public function getLinkPartial($number)
    {
        return view('components.form.licensors.link_clean_partial', ['number' => $number,
            'no_remove' => ($number > 1) ? true :false ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
