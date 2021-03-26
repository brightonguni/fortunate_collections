@extends('layouts.app')
@section('content')
    <div class="breadcrumbs-area">
        <h3>Manage project Category Details</h3>
        <ul>
            <li>
                <a href="{{route('project_category.index')}}">Home</a>
            </li>
            <li>project Category Details</li>
        </ul>
    </div>
    <div class="row gutters-20">
        <div class="col-md-12">
        <div class="card ui-tab-card">
            <div class="card-body p-0">
                <div class="border-nav-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Category Details</a>
                        </li>
                        @if ( in_array('project_category_list', $canDo) )
                          <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#store" role="tab" aria-selected="false">Other categories</a>
                          </li>
                        @endif 
                        @if ( in_array('project_category_update', $canDo) )
                        <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#edit-project-category" role="tab" aria-selected="false">Edit Category</a>
                          </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row gutters-20">
        <div class="col-md-12">
            <div class="card ui-tab-card">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                        <div class="card-body">
                            @component('components.tables.projects.category.category-details',['storeBelongs' => $storeBelongs, 'project_category' => $project_category, 'canDo' => $canDo ])
                                project Details table Component
                            @endcomponent
                        </div>
                    </div>
                    @if ( in_array('project_category_list', $canDo) )
                    <div class="tab-pane fade" id="store" role="tabpanel">
                        <div class="card-body">
                            @component('components.tables.projects.category.categories',['project_categories' => $project_categories,  'storeBelongs' => $storeBelongs,  'canDo' => $canDo ])
                                Store Details table Component
                            @endcomponent
                        </div>
                    </div>
                    @endif 
                    @if ( in_array('project_category_update', $canDo) )
                    <div class="tab-pane fade" id="edit-project-category" role="tabpanel">
                      <div class="card-body p-0 pt-2"> 
                         @component('components.forms.projects.category.edit',['licensors' => $licensors, 'stores' => $stores ,'storeBelongs' => $storeBelongs, 'project_category' => $project_category, 'canDo' => $canDo ])
                              project Category edit form Component
                          @endcomponent
                      </div>
                    </div>
                    @endif
                </div>
            </div> -
        </div>
    </div>
    <!-- project Table Area End Here -->
    {{--  @component('components.modal.projects.edit',['project' => $project, 'stores' => $stores ])
        Store Details table Component
    @endcomponent  --}}
@endsection
