@extends('layouts.app')
@section('content')
    <div class="breadcrumbs-area">
        <h3>Manage Employees</h3>
        <ul>
          <li>Employees</li>
          <li>
              <a href="{{ route('employees.index') }}">Employees</a>
          </li>
          <li>
              <a href="{{ route('employees.create') }}">Create Employee</a>
          </li>
          <li>Contracts</li>
          <li>
              <a href="{{ route('product_category.index') }}">View Contracts</a>
          </li>
          <li>
              <a href="{{ route('product_category.create') }}">Create Contract</a>
          </li>
          <li>Contract Types</li>
          <li>
              <a href="{{ route('product_sub_category.index') }}">View Contract types</a>
          </li>
          <li>
              <a href="{{ route('product_sub_category.create') }}">Create Contract Type</a>
          </li>
          <li>Skills</li>
          <li>
              <a href="{{ route('product_color.index') }}">View Skills</a>
          </li>
          <li>
              <a href="{{ route('product_color.create') }}">Create Skill</a>
          </li>
          <li>Teams</li>
          <li>
              <a href="{{ route('product_brand.index') }}">View Teams</a>
          </li>
          <li>
              <a href="{{ route('product_brand.create') }}">Create Teams</a>
          </li>
        </ul>
    </div>

    <!-- Breadcubs Area End Here -->
    <!-- Dashboard summery Start Here -->
    <div class="row gutters-20">
        <div class="col-md-4">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-green ">
                            <i class="fas fa-snowboarding fa-4x text-green"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Active</div>
                            <div class="item-number"><span class="counter" data-num="{{ $statistics->active }}">{{ $statistics->active }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-yellow">
                            <i class="fas text-orange fa-4x fa-ban"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Suspended</div>
                            <div class="item-number"><span class="counter" data-num="{{ $statistics->blocked }}">{{ $statistics->blocked }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-red">
                            <i class="fas fa-trash fa-4x text-red"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Deleted</div>
                            <div class="item-number"><span class="counter" data-num="{{ $statistics->deleted }}">{{ $statistics->deleted }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('permission_error'))
        <div class="alert alert-danger">{{ session()->get('permission_error') }}</div>
    @endif
  <div class="row gutters-20">
    <div class="card ui-tab-card">
      <div class="card-body p-0">
        <div class="border-nav-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#view-employees" role="tab" aria-selected="true">View employees</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-employee" role="tab" aria-selected="true"> New Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#employee-contracts" role="tab" aria-selected="false">Contracts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-contract" role="tab" aria-selected="true"> New Contract</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#contract-types" role="tab" aria-selected="false">Contract types</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-contract-type" role="tab" aria-selected="true"> New contract type</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#skill-sets" role="tab" aria-selected="false">skill sets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-skill" role="tab" aria-selected="true"> New skill</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#teams" role="tab" aria-selected="false">Teams</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-team" role="tab" aria-selected="true"> New team</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active" id="view-employees" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.employees.employees',['employees' => $employees, 'projects' => $projects, 'canDo' => $canDo ,'licensors' => $licensors,'stores' => $stores,'job_titles' => $job_titles,'departments' => $departments,'contracts' => $contracts,'skills' => $skills])
                      employee-table Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="create-employee" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  {{--  @component('components.forms.products.create',['stores' => $stores,'brands'=> $brands,'colors' => $colors,'categories'=>$categories,'sub_categories'=>$sub_categories,'licensors' => $licensors,'canDo' => $canDo])
                    product Create form Component
                  @endcomponent  --}}
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="employee-contracts" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  {{--  @component('components.tables.products.category.categories',['categories' => $categories, 'storeBelongs' => $storeBelongs,  'canDo' => $canDo,  ])
                      product categories table Component
                  @endcomponent  --}}
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="create-contract" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  {{--  @component('components.forms.products.category.create',['stores' => $stores,'categories'=>$categories,'licensors' => $licensors,'canDo' => $canDo])
                    product category Create form Component
                  @endcomponent  --}}
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="contract-types" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  {{--  @component('components.tables.products.sub-category.sub-categories',['sub_categories' => $sub_categories, 'storeBelongs' => $storeBelongs,  'canDo' => $canDo,  ])
                      product sub categories table Component
                  @endcomponent  --}}
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="create-contract-type" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  {{--  @component('components.forms.products.sub-category.create',['stores' => $stores,'categories'=>$categories,'licensors' => $licensors,'canDo' => $canDo])
                    product sub category Create form Component
                  @endcomponent  --}}
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="skill-sets" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  {{--  @component('components.tables.products.brands.brands',['brands' => $brands, 'storeBelongs' => $storeBelongs,  'canDo' => $canDo,  ])
                      product brands table Component
                  @endcomponent  --}}
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="create-skill" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  {{--  @component('components.forms.products.brands.create',['stores' => $stores,'brands'=>$brands,'licensors' => $licensors,'canDo' => $canDo])
                    product brands Create form Component
                  @endcomponent  --}}
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="teams" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  {{--  @component('components.tables.products.colors.colors',['colors' => $colors, 'storeBelongs' => $storeBelongs,  'canDo' => $canDo,  ])
                      product colors table Component
                  @endcomponent  --}}
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="create-team" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  {{--  @component('components.forms.products.colors.create',['stores' => $stores,'brands'=>$brands,'licensors' => $licensors,'canDo' => $canDo])
                    product brands Create form Component
                  @endcomponent  --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
