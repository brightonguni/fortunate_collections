<?php

namespace App\Http\Controllers\Faqs;

use App\Http\Controllers\Controller;
use App\Repositories\Faqs\FaqRepository;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $faq;
    protected $request;
    public function __construct(FaqRepository $repository, Request $request)
    {
        $this->faq = $repository;
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

        $faqs = $this->faq->all();
        $stores = $this->faq->getStores();
        $licensors = $this->faq->getLicensors();
        $statistics = $this->faq->getStatistics();
        $categories = $this->faq->getCategories();
        $faq_categories = $this->faq->getCategories();

        $canDo = auth()->user()->role->canDoAll();
        $storeBelongs = true;

        return view('pages.faqs.index', compact('licensors','faq_categories', 'stores', 'categories', 'faqs', 'canDo', 'statistics', 'storeBelongs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statistics = $this->faq->getStatistics();
        $licensors = $this->faq->getLicensors();
        $categories = $this->faq->AddFaqCategories();
        $stores = $this->faq->getStores();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.faqs.create', compact('statistics', 'categories', 'licensors', 'stores', 'canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->faq->store($this->faq->submission());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = $this->faq->get($id);
        $storeBelongs = true;
        // if ($this->faq->userIsLicensor() && !$this->faq->faqBelongsToLicensor($faq)) {
        //     $storeBelongs = false;
        // }
        $stores = $this->faq->getStores();
        $statistics = $this->faq->getStatistics();
        // $faq_types = $this->faq->getfaqTypes();
        $licensors = $this->faq->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.faqs.show', compact('faq', 'canDo', 'storeBelongs', 'stores', 'statistics', 'licensors'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = $this->faq->get($id);
        if ($this->faq->userIsLicensor() && !$this->faq->projectBelongsToLicensor($faq)) {
            return redirect()->route('faq.index')->with(['permission_error' => 'not allowed']);
        }
        $faq_type = $this->faq->getfaqTypes();
        $stores = $this->faq->getStores();
        $statistics = $this->faq->getStatistics();
        $licensors = $this->faq->getLicensors();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.faqs.edit', compact('faq', 'canDo','stores', 'statistics', 'stores', 'licensors'));

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
        $faq = $this->faq->get($id);
        if ($this->faq->userIsLicensor() && !$this->faq->faqBelongsToLicensor($faq)) {
            return redirect()->route('faq.index')->with(['permission_error', 'Not Allowed']);

            if ($this->faq->is_valid()) {
                $this->faq->update($id, $this->faq->getFormValues());
                redirect()->back()->with('success', 'Your faq has been updated sucessfully.');
            }
            return redirect()->back()->withErrors($this->faq->getErrors());
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
        $faq = $this->faq->get($id);

        if ($this->faq->userIsLicensor() && !$this->faq->faqBelongsToLicensor($faq)) {
            return $this->redirect()->route()->with(['permission_error' => 'Not Allowed']);
        }
        $this->faq->delete($id);
        return redirect()->back()->with('success', 'faq has been deleted !!');

    }
}