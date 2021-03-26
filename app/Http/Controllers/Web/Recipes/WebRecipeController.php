<?php

namespace App\Http\Controllers\Web\Recipes;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Products\ProductCategoryRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Recipes\RecipeCategoryRepository;
use App\Repositories\web\Recipes\RecipePageRepository;
use App\Repositories\web\Recipes\RecipeRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class WebRecipeController extends Controller
{

    protected $recipe;
    protected $service;
    protected $blog;
    protected $event;
    protected $category;
    protected $recipe_category;
    protected $product;
    protected $store;
    protected $service_category;
    protected $recipe_page;
    protected $blog_page;
    public function __construct(
        RecipeRepository $repository,
        ServicesRepository $servicesRepository,
        ProductRepository $productRepository,
        BlogRepository $blogRepository,
        EventsRepository $eventsRepository, RecipePageRepository $recipePageRepository,
        ServiceCategoryRepository $serviceCategoryRepository, ProductCategoryRepository $productCategoryRepository,
        RecipeCategoryRepository $recipeCategoryRepository, BlogPageRepository $blogPageRepository,
        StoreRepository $storeRepository) {
        $this->recipe = $repository;
        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->service = $servicesRepository;
        $this->recipe_category = $recipeCategoryRepository;
        $this->product_category = $productCategoryRepository;
        $this->product = $productRepository;
        $this->store = $storeRepository;
        $this->service_category = $serviceCategoryRepository;
        $this->recipe_page = $recipePageRepository;
        $this->blog_page = $blogPageRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = $this->recipe->index();
        $statistics = $this->recipe->getStatistics();
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $recipe_categories = $this->recipe_category->index();
        $products = $this->product->index();
        $product_category = $this->product_category->index();
        $stores = $this->store->index();
        $service_categories = $this->service_category->index();
        $recipe_page = $this->recipe_page->index();
        $blog_page = $this->blog_page->index();
        return view('web.pages.recipes.index', compact('recipe_page', 'blog_page', 'stores', 'service_categories', 'products', 'recipe_categories', 'services', 'blogs', 'product_category', 'events', 'recipes', 'statistics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $statistics = $this->recipe->getStatistics();
        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $products = $this->product->index();
        $stores = $this->store->index();
        $recipes = $this->recipe->index();
        $recipe_categories = $this->recipe_category->index();

        $service_categories = $this->service_category->index();
        $recipe_page = $this->recipe_page->index();
        $blog_page = $this->blog_page->index();
        return view('web.pages.recipes.show', compact('recipe_page', 'blog_page', 'recipes', 'service_categories', 'recipe_categories','stores', 'products', 'services', 'blogs', 'events', 'recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}