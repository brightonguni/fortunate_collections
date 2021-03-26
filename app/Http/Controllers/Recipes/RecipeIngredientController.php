<?php

namespace App\Http\Controllers\Recipes;

use App\Http\Controllers\Controller;
use App\Repositories\Recipes\RecipeIngredientRepository;
use Illuminate\Http\Request;

class RecipeIngredientController extends Controller
{
    protected $recipe_ingredient;
    protected $request;

    public function __construct(RecipeIngredientRepository $repository, Request $request)
    {
        $this->recipe_ingredient = $repository;
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
        $recipe_ingredients = $this->recipe_ingredient->all('created_at', 'asc');
        $statistics = $this->recipe_ingredient->getStatistics();
        $stores = $this->recipe_ingredient->getStores();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->recipe_ingredient->getLicensors();

        return view('pages.recipes.ingredients.index', compact('recipe_ingredients','statistics', 'stores', 'licensors', 'canDo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipes = $this->recipe_ingredient->getRecipes();
        $licensors = $this->recipe_ingredient->getLicensors();
        $stores = $this->recipe_ingredient->getStores();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.recipes.ingredients.create', compact('stores', 'licensors', 'recipes', 'canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->recipe_ingredient->store($this->recipe_ingredient->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe_ingredient = $this->recipe_ingredient->get($id);
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.recipes.ingredients.show', compact('licensors', 'stores', 'canDo', 'recipe_ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipes = $this->recipe_ingredient->getRecipes();
        $licensors = $this->recipe_ingredient->getLicensors();
        $stores = $this->recipe_ingredient->getStores();

        return view('pages.recipes.ingredients.edit', compact('stores', 'licensors', 'recipes', 'canDo'));

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
        return $this->recipe_ingredient->update($id, $this->recipe_ingredient->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe_ingredient = $this->recipe_ingredient->get($id);
        $this->recipe_ingredient->delete($id);
        return redirect()->back()->with('success', 'recipe category has been deleted !!');

    }
}