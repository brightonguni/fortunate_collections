<?php

namespace App\Http\Controllers\Web\Recipes;

use App\Http\Controllers\Controller;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Faqs\FaqRepository;
use App\Repositories\web\Products\ProductCategoryRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Recipes\RecipeCategoryRepository;
use App\Repositories\web\Recipes\RecipeRepository;
use App\Repositories\web\Recipes\RecipePageRepository;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Http\Request;

class WebRecipeCategoryController extends Controller
{
    protected $category;
    protected $service;
    protected $blog;
    protected $event;
    protected $product;
    protected $productCategory;
    protected $recipe;
    protected $recipe_Category;
    protected $project;
    protected $store;
    protected $faq;
    protected $recipe_page;
    protected $blog_page;
    protected $service_category;
    public function __construct(
        RecipeCategoryRepository $repository,
        ProductRepository $projectRepository,
        ProductCategoryRepository $productCategoryRepository,
        ServicesRepository $servicesRepository,
        BlogRepository $blogRepository,
        BlogRepository $blogPageRepository,
        EventsRepository $eventsRepository,
        RecipeCategoryRepository $recipeCategoryRepository,
        RecipeRepository $recipeRepository,
        RecipePageRepository $recipePageRepository,
        ServiceCategoryRepository $serviceCategoryRepository,
        ProductRepository $productRepository,
        StoreRepository $storeRepository,
        FaqRepository $faqRepository) {

        $this->blog = $blogRepository;
        $this->event = $eventsRepository;
        $this->service = $servicesRepository;
        $this->category = $repository;
        $this->recipe_category = $recipeCategoryRepository;
        $this->product = $productRepository;
        $this->recipe = $recipeRepository;
        $this->project = $projectRepository;
        $this->faq = $faqRepository;
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
        $categories = $this->category->index();
        $recipe_categories = $this->recipe_category->index();

        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $products = $this->product->index();
        $recipes = $this->recipe->index();
        $service_categories = $this->service_category->index();
        $stores = $this->store->index();
        $recipe_page = $this->recipe_page->index();
        $blog_page = $this->blog_page->index();
        return view('web.pages.recipes.categories.index', compact( 'blog_page','recipe_page', 'recipes', 'recipe_categories','service_categories', 'stores', 'products', 'categories', 'services', 'blogs', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $recipe_category = $this->category->get($id);
        $recipe_categories = $this->recipe_category->index();

        $services = $this->service->index();
        $events = $this->event->index();
        $blogs = $this->blog->index();
        $categories = $this->category->index();
        $recipeByCategories = $this->recipe_category->recipeByCategory($id);
        $products = $this->product->index();
        $projects = $this->project->index();
        $stores = $this->store->index();
        $faqs = $this->faq->index();
        $service_categories = $this->service_category->index();
        $recipe_page = $this->recipe_page->index();
        $blog_page = $this->blog_page->index();

        return view('web.pages.recipes.categories.show', compact('recipe_page', 'blog_page', 'projects','recipe_categories', 'service_categories', 'faqs', 'stores', 'products', 'categories', 'recipeByCategories', 'recipe_category', 'services', 'blogs', 'events'));

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