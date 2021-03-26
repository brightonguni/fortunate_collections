@extends('layouts.app')
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Manage Projects</h3>
        <ul>
          <li>Projects</li>
            <li>
                <a href="{{ route('project.create') }}">Create Project</a>
            </li>
            <li>Project Categories</li>
            <li>
                <a href="{{ route('project_category.create') }}">Create Category</a>
            </li>
            <li>Project Sub Categories</li>
            <li>
                <a href="{{ route('project_sub_category.create') }}">Create sub Category</a>
            </li>
        </ul>
    </div>
    <div class="row gutters-20">
        <div class="col-xl-3 col-sm-6 col-12">
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
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-blue">
                            <i class="fas text-blue fa-4x fa-spinner"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Pending</div>
                            <div class="item-number"><span class="counter" data-num="{{ $statistics->unverified }}">{{ $statistics->unverified }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
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
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-red">
                            <i class="fas fa-asterisk fa-4x text-red"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Total</div>
                         <div class="item-number"><span class="counter" data-num="{{ $statistics->total }}">{{ $statistics->total }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('permission_error'))
        <div class="alert alert-danger">{{ session()->get('permission_error') }}</div>
    @endif

    @if( request()->query('delete') )
        <div class="alert alert-success">Deleted project : {{ request()->query('delete') }}</div>
    @endif
     <div class="card ui-tab-card">
      <div class="card-body p-0">
        <div class="border-nav-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#view-projecs" role="tab" aria-selected="true">Projects</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="tab" href="#create-project" role="tab" aria-selected="true"> Create Project</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#project-categories" role="tab" aria-selected="false">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-categories" role="tab" aria-selected="true"> Create Category</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#project-sub-categories" role="tab" aria-selected="false">Sub Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-sub-categories" role="tab" aria-selected="true"> Create Sub Category</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active" id="view-projects" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.projects.projects',['projects' => $projects,'skills'=>$skills, 'canDo' => $canDo ,'licensors'=>$licensors,])
                    project-table Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="create-project" role="tabpanel">
              <div class="row gutters-20 m-4">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.projects.create',[ 'skills' =>$skills,'services'=>$services,'licensors'=>$licensors,'project_categories'=> $project_categories,'categories'=>$categories,'sub_categories'=>$sub_categories,'stores'=>$stores, 'canDo' => $canDo])
                      project Create Form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="project-categories" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.projects.category.categories',['project_categories' => $project_categories ,'canDo' => $canDo ])
                    project Categories edit form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="create-categories" role="tabpanel">
              <div class="row gutters-20 m-4">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.projects.category.create',[ 'licensors'=>$licensors,'categories'=> $categories,'stores'=>$stores,'projects' => $projects, 'canDo' => $canDo])
                      project Create Form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="project-sub-categories" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.projects.sub-category.sub-categories',['project_categories' => $project_categories ,'sub_categories'=>$sub_categories,'canDo' => $canDo ])
                    project Categories edit form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="create-sub-categories" role="tabpanel">
              <div class="row gutters-20 m-4">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.projects.sub-category.create',[ 'licensors'=>$licensors,'categories'=> $categories,'stores'=>$stores,'projects' => $projects, 'canDo' => $canDo])
                      project Create Form Component
                  @endcomponent
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
@endsection
