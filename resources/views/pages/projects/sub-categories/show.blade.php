@extends('layouts.app')
@section('content')
    <div class="breadcrumbs-area">
        <h3>Manage Sub categories Details</h3>
        <ul>
           <li>project Sub Category Details</li>
            <li>
                <a href="{{route('project_sub_category.index')}}">Home</a>
            </li>
            <li>Edit Sub Category Details</li>
            <li>
                <a href="{{route('project_sub_category.edit',['id' => $sub_category->id])}}">Edit Details</a>
            </li>
        </ul>
    </div>
    <div class="row gutters-20">
        <div class="col-md-12">
        <div class="card ui-tab-card">
            <div class="card-body p-0">
                <div class="border-nav-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Sub Category Details</a>
                        </li>
                        @if ( in_array('project_sub_category_list', $canDo) )
                          <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#store" role="tab" aria-selected="false">Other Sub categories</a>
                          </li>
                        @endif 
                        @if ( in_array('project_sub_category_update', $canDo) )
                        <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#edit-project-sub-category" role="tab" aria-selected="false">Edit Sub Category</a>
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
                            @component('components.tables.projects.sub-category.sub-category-details',['storeBelongs' => $storeBelongs, 'sub_category' => $sub_category, 'canDo' => $canDo ])
                                project Details table Component
                            @endcomponent
                        </div>
                    </div>
                    @if ( in_array('project_sub_category_list', $canDo) )
                    <div class="tab-pane fade" id="store" role="tabpanel">
                        <div class="card-body">
                            @component('components.tables.projects.sub-category.sub-categories',['sub_categories' => $sub_categories, 'storeBelongs' => $storeBelongs,  'canDo' => $canDo ])
                                Store Details table Component
                            @endcomponent
                        </div>
                    </div>
                    @endif 
                    @if ( in_array('project_sub_category_update', $canDo) )
                    <div class="tab-pane fade" id="edit-project-sub-category" role="tabpanel">
                      <div class="card-body p-0 pt-2"> 
                         @component('components.forms.projects.sub-category.edit',['licensors' => $licensors, 'stores' => $stores ,'storeBelongs' => $storeBelongs, 'sub_category' => $sub_category,'categories'=>$categories, 'canDo' => $canDo ])
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
