<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Http\Controllers\Controller;
use App\Repositories\AboutUs\AboutUsRepository;
use Illuminate\Http\Request;
use Log;

class AboutUsController extends Controller
{
    protected $about;

    public function __construct(AboutUsRepository $repository)
    {
        $this->about = $repository;
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = $this->about->index();

        return view('pages.about_us.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = $this->about->getStores();
        $licensors = $this->about->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.pages.about_us.create', compact('stores', 'licensors', 'canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        Log::alert('i am here');
        if ($this->about->is_valid()) {
            $this->about->store($this->about->submission());
            return redirect()->back()->with('success', 'About us Page Created Successfuly');
        }
        return redirect()->back()->withErrors($this->about->getErrors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aboutPage = $this->about->get($id);

        return view('pages.pages.about_us.show', compact('aboutPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutPage = $this->about->get($id);
        $store = $this->about->getStores();
        $licensors = $this->about->getLicensors();

        return view('pages.about_us.create', compact('aboutPage', 'stores', 'licensors'));

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
        return $this->about->update($id, $this->update->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->about->delete($id);
    }
}