<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Blogs\BlogRepository;
use App\Repositories\Bookings\BookingRepository;
use App\Repositories\CaseStudies\CaseStudyRepository;
use App\Repositories\Customers\CustomerRepository;
use App\Repositories\Departments\DepartmentsRepository;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Projects\ProjectRepository;
use App\Repositories\Services\ServicesRepository;
use App\Repositories\Stores\StoreRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $customer;
    protected $store;
    protected $booking;
    protected $blog;
    protected $case_study;
    protected $department;
    protected $licensor;
    protected $project;
    protected $service;
    protected $team;

    public function __construct
    (
        LicensorRepository $licensorRepository,
        BlogRepository $blogRepository,
        StoreRepository $StoreRepository,
        DepartmentsRepository $departmentRepository,
        ServicesRepository $servicesRepository,
        CustomerRepository $customerRepository,
        ProjectRepository $projectRepository,
        CaseStudyRepository $case_studyRepository,
        BookingRepository $bookingRepository
    ) {
        $this->middleware('auth');
        $this->licensor = $licensorRepository;
        $this->blog = $blogRepository;
        $this->store = $StoreRepository;
        $this->department = $departmentRepository;
        $this->service = $servicesRepository;
        $this->customer = $customerRepository;
        $this->project = $projectRepository;
        $this->case_study = $case_studyRepository;
        $this->booking = $bookingRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customer->all();
        $statistics = $this->customer->getStatistics();
        $blogs = $this->blog->all();
        $statistics = $this->blog->getStatistics();
        $bookings = $this->booking->all();
        $statistics = $this->booking->getStatistics();
        $projects = $this->project->all();
        $statistics = $this->project->getStatistics();
        $case_studies = $this->case_study->all();
        $statistics = $this->case_study->getStatistics();
        $stores = $this->store->getStatistics();

        return view('pages.dashboard.index', compact('stores', 'projects', 'case_studies', 'bookings', 'statistics', 'customers', 'blogs'));

    }
    public function landing_page()
    {
        return view('welcome');
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
        //
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