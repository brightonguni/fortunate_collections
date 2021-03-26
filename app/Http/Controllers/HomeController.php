<?php

namespace App\Http\Controllers;

use App\Repositories\web\AboutUs\AboutUsRepository;
use App\Repositories\web\Blogs\BlogPageRepository;
use App\Repositories\web\Blogs\BlogRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\CaseStudies\CaseStudyRepository;
use App\Repositories\web\Faqs\FaqPageRepository;
use App\Repositories\web\Faqs\FaqRepository;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Packages\PackagePageRepository;
use App\Repositories\web\Packages\PackageRepository;
use App\Repositories\web\Products\ProductCategoryPageRepository;
use App\Repositories\web\Products\ProductCategoryRepository;
use App\Repositories\web\Products\ProductPageRepository;
use App\Repositories\web\Products\ProductRepository;
use App\Repositories\web\Projects\ProjectCategoryRepository;
use App\Repositories\web\Projects\ProjectPageRepository;
use App\Repositories\web\Projects\ProjectRepository;
use App\Repositories\web\Recipes\RecipePageRepository;
use App\Repositories\web\Recipes\RecipeRepository;
use App\Repositories\web\Services\ServiceCategoryRepository;
use App\Repositories\web\Services\ServicePageRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use App\Repositories\web\Teams\EmployeeCategoryRepository;
use App\Repositories\web\Teams\EmployeeRepository;
use App\Repositories\web\Teams\TeamPageRepository;
use App\Repositories\web\Teams\TeamRepository;

class HomeController extends Controller
{
    protected $customer;
    protected $store;
    protected $blog;
    protected $case_study;
    protected $licensor;
    protected $project;
    protected $service;
    protected $team;
    protected $event;
    protected $faq;
    protected $product;
    protected $product_category;
    protected $project_category;
    protected $recipe;
    protected $package;
    protected $aboutUs;
    protected $service_category;
    protected $employee_category;
    protected $employee;
    protected $service_page;
    protected $blog_page;
    protected $faq_page;
    protected $product_page;
    protected $product_category_page;
    protected $team_page;
    protected $project_page;
    protected $package_page;
    public function __construct
    (
        LicensorRepository $licensorRepository, BlogRepository $blogRepository,
        StoreRepository $StoreRepository, ServicesRepository $servicesRepository, PackagePageRepository $packagePageRepository,
        ServicePageRepository $servicePageRepository, BlogPageRepository $blogPageRepository,
        ProductPageRepository $productPageRepository, RecipePageRepository $recipePageRepository,
        FaqPageRepository $faqPageRepository, TeamPageRepository $teamPageRepository, ProjectPageRepository $projectPageRepository,
        //CustomerRepository $customerRepository,
        // ProjectRepository $projectRepository,
        ProductCategoryPageRepository $productCategoryPageRepository,
        TeamRepository $teamRepository,
        CaseStudyRepository $case_studyRepository, EventsRepository $eventsRepository, FaqRepository $faqRepository,
        ProjectRepository $projectRepository, PackageRepository $packageRepository, ProjectCategoryRepository $projectCategoryRepository, ProductRepository $productRepository,
        ProductCategoryRepository $productCategoryRepository, RecipeRepository $recipeRepository, AboutUsRepository $aboutUsRepository,
        EmployeeCategoryRepository $employeeCategoryRepository,
        ServiceCategoryRepository $serviceCategoryRepository, EmployeeRepository $employeeRepository
    ) {
        $this->service_page = $servicePageRepository;
        $this->product_page = $productPageRepository;
        $this->package_page = $packagePageRepository;

        $this->recipe_page = $recipePageRepository;
        $this->project_page = $projectPageRepository;
        $this->team_page = $teamPageRepository;
        $this->blog_page = $blogPageRepository;
        $this->faq_page = $faqPageRepository;
        $this->team = $teamRepository;
        $this->employee_category = $employeeCategoryRepository;
        $this->licensor = $licensorRepository;
        $this->blog = $blogRepository;
        $this->store = $StoreRepository;
        $this->service = $servicesRepository;
        // $this->customer = $customerRepository;
        // $this->project = $projectRepository;
        $this->case_study = $case_studyRepository;
        // $this->middleware('auth');
        $this->employee = $employeeRepository;
        $this->event = $eventsRepository;
        $this->faq = $faqRepository;
        $this->package = $packageRepository;

        $this->product_category_page = $productCategoryPageRepository;

        $this->product = $productRepository;
        $this->product_category = $productCategoryRepository;
        $this->project = $projectRepository;
        $this->project_category = $projectCategoryRepository;
        $this->recipe = $recipeRepository;
        $this->aboutUs = $aboutUsRepository;
        $this->service_category = $serviceCategoryRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // $customers = $this->customer->all()->paginate(10);
        $blogs = $this->blog->all();
        $projects = $this->project->all();
        $project_categories = $this->project_category->get_project_categories();
        $case_studies = $this->case_study->all();
        $stores = $this->store->all();
        $services = $this->service->all();
        $events = $this->event->all();
        $products = $this->product->index();
        $latest_products = $this->product->getLatestProducts();
        $recipes = $this->recipe->index();
        $faqs = $this->faq->all();
        $packages = $this->package->all();
        // $package_products = $this->package->getProducts();

        $teams = $this->employee->all();
        // $teams = $this->team->all();
        $employee_categories = $this->employee_category->index();
        $aboutUs = $this->aboutUs->all();
        //$product_categories = $this->product_category->get_product_categories();
        $product_categories = $this->product->getAllCategories();
        $sub_categories = $this->product->getAllProductSubCategory();

        $service_categories = $this->service_category->index();
        //$teams = $this->employee->getTeams();
        $service_page = $this->service_page->index();
        $package_page = $this->package_page->index();
        $product_category_page = $this->product_category_page->index();
        $blog_page = $this->blog_page->index();
        $product_page = $this->product_page->index();
        $recipe_page = $this->recipe_page->index();
        $faq_page = $this->faq_page->index();
        $faq_categories = $this->faq->getCategories();
        $project_page = $this->project_page->index();
        $team_page = $this->team_page->index();

        return view('home', compact(
            'service_page', 'faq_categories',
            'blog_page', 'latest_products',
            'faq_page',
            'product_page',
            'package_page',
            'project_page',
            'recipe_page',
            'team_page',
            'product_category_page',
            'product_categories', 'sub_categories',
            'project_categories',
            'projects',
            'aboutUs',
            'stores',
            'products',
            'recipes',
            'faqs',
            'blogs',
            'services',
            'case_studies',
            'events',
            'teams',
            'packages',
            'service_categories',
            'employee_categories'
        ));
    }
}