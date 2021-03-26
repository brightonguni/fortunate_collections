<?php

namespace App\Http\Controllers\Faqs;

use App\Http\Controllers\Controller;
use App\Repositories\Faqs\FaqCategoryRepository;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    protected $faq_category;
    protected $request;

    public function __construct(FaqCategoryRepository $repository, Request $request)
    {
        $this->faq_category = $repository;
        $this->request = $request;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->faq_category->all();
        $statistics = $this->faq_category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.faqs.category.index', compact('categories', 'statistics', 'canDo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canDo = auth()->user()->role->canDoAll();
        $stores = $this->faq_category->getStores();
        $licensors = $this->faq_category->getLicensors();
        $statistics = $this->faq_category->getStatistics();

        return view('pages.faqs.category.create', compact('canDo', 'stores', 'licensors', 'statistics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->faq_category->store($this->faq_category->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->faq_category->get($id);
        $statistics = $this->faq_category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.faqs.category.show', compact('category', 'statistics', 'canDo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->faq_category->get($id);
        $statistics = $this->faq_category->getStatistics();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.faqs.category.show', compact('category', 'statistics', 'canDo'));

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
        return $this->faq_category->update($id, $this->faq_category->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->faq_category->delete($id);
    }
}