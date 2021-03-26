<?php

namespace App\Http\Controllers\Recipes;

use App\Http\Controllers\Controller;
use App\Repositories\Recipes\RecipeMethodRepository;
use Illuminate\Http\Request;

class RecipeMethodController extends Controller
{
    protected $recipe_method;
    protected $request;

    public function __construct(RecipeMethodRepository $repository, Request $request)
    {
        $this->recipe_method = $repository;
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
        $recipe_methods = $this->recipe_method->all('created_at', 'asc');
        $statistics = $this->recipe_method->getStatistics();
        $stores = $this->recipe_method->getStores();
        $canDo = auth()->user()->role->canDoAll();
        $licensors = $this->recipe_method->getLicensors();

        return view('pages.recipes.methods.index', compact('recipe_methods', 'stores','statistics', 'licensors', 'canDo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipes = $this->recipe_method->getRecipes();
        $licensors = $this->recipe_method->getLicensors();
        $stores = $this->recipe_method->getStores();
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.recipes.methods.create', compact('stores', 'licensors', 'recipes', 'canDo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->recipe_method->store($this->recipe_method->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe_method = $this->recipe_method->get($id);
        $canDo = auth()->user()->role->canDoAll();

        return view('pages.recipes.methods.show', compact('licensors', 'stores', 'canDo', 'recipe_method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipes = $this->recipe_method->getRecipes();
        $licensors = $this->recipe_method->getLicensors();
        $stores = $this->recipe_method->getStores();

        return view('pages.recipes.methods.edit', compact('stores', 'licensors', 'recipes', 'canDo'));

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
        return $this->recipe_method->update($id, $this->recipe_method->submission());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe_method = $this->recipe_method->get($id);
        $this->recipe_method->delete($id);
        return redirect()->back()->with('success', 'recipe category has been deleted !!');

    }
}