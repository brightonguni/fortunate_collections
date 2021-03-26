<?php

namespace App\Http\Controllers\Recipes;

use App\Http\Controllers\Controller;
use App\Repositories\Recipes\RecipeCategoryRepository;
use Illuminate\Http\Request;

class RecipeCategoryController extends Controller
{
    protected $recipe_category;
    protected $request;

    public function __construct(RecipeCategoryRepository $repository, Request $request)
    {
        $this->recipe_category = $repository;
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
        $recipe_categories = $this->recipe_category->all('created_at', 'asc');
        $statistics = $this->recipe_category->getStatistics();
        $stores = $this->recipe_category->getStores();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->recipe_category->getLicensors();

        return view('pages.recipes.category.index', compact('recipe_categories','statistics', 'stores', 'licensors', 'canDo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipe_category = $this->recipe_category->getRecipes();
        $licensors = $this->recipe_category->getLicensors();
        $stores = $this->recipe_category->getStores();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.recipes.category.create', compact('stores', 'licensors', 'recipe_category', 'canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->recipe_category->store($this->recipe_category->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe_category = $this->recipe_category->get($id);
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.recipes.category.show', compact('licensors', 'stores', 'canDo', 'recipe_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipes = $this->recipe_category->getRecipes();
        $licensors = $this->recipe_category->getLicensors();
        $stores = $this->recipe_category->getStores();

        return view('pages.recipes.category.edit', compact('stores', 'licensors', 'recipes', 'canDo'));

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
        return $this->recipe_category->update($id, $this->recipe_category->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe_category = $this->recipe_category->get($id);
        $this->recipe_category->delete($id);
        return redirect()->back()->with('success', 'recipe category has been deleted !!');

    }
}