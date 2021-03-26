<?php

namespace App\Http\Controllers\Recipes;

use App\Http\Controllers\Controller;
use App\Repositories\Recipes\RecipeRepository;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    protected $recipe;
    protected $request;

    public function __construct(RecipeRepository $repository, Request $request)
    {
        $this->recipe = $repository;
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
        $recipes = $this->recipe->all('created_at', 'asc');
        $recipe_categories = $this->recipe->getRecipeCategories('created_at', 'asc');
        $statistics = $this->recipe->getStatistics();
        $stores = $this->recipe->getStores();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->recipe->getLicensors();
        $recipes_category = $this->recipe->getRecipesCategory();

        return view('pages.recipes.index', compact('recipes', 'recipe_categories', 'recipes_category', 'stores', 'statistics', 'licensors', 'canDo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipes_category = $this->recipe->getRecipesCategory();
        $licensors = $this->recipe->getLicensors();
        $stores = $this->recipe->getStores();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.recipes.create', compact('stores', 'licensors', 'recipes_category', 'canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->recipe->store($this->recipe->submission());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = $this->recipe->get($id);
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->recipe->getLicensors();
        $stores = $this->recipe->getStores();

        return view('pages.recipes.show', compact('licensors', 'stores', 'canDo', 'recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $licensors = $this->recipe->getLicensors();
        $stores = $this->recipe->getStores();
        $recipes_category = $this->recipe->getRecipesCategory();

        return view('pages.recipes.edit', compact('stores', 'licensors', 'recipes_category', 'canDo'));

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
        return $this->recipe->update($id, $this->recipe->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = $this->recipe->get($id);
        $this->recipe->delete($id);
        return redirect()->back()->with('success', 'recipe category has been deleted !!');

    }
}