@extends('layouts.app')
@section('content')
    <div class="breadcrumbs-area">
        <h3>Manage Package Category Details</h3>
        <ul>
            <li>
                <a href="{{route('package_category.index')}}">Home</a>
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
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Category Details</a>
                        </li>
                        @if ( in_array('package_category_list', $canDo) )
                          <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#store" role="tab" aria-selected="false">Other categories</a>
                          </li>
                        @endif 
                        @if ( in_array('package_category_update', $canDo) )
                          <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#edit-package-category" role="tab" aria-selected="false">Edit Category</a>
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
                            @component('components.tables.packages.category.category-details',['storeBelongs' => $storeBelongs, 'package_category' => $package_category, 'canDo' => $canDo ])
                                package Details table Component
                            @endcomponent
                        </div>
                    </div>
                    @if ( in_array('package_category_list', $canDo) )
                    <div class="tab-pane fade" id="store" role="tabpanel">
                        <div class="card-body">
                            @component('components.tables.packages.category.categories',['package_categories' => $package_categories,  'storeBelongs' => $storeBelongs,  'canDo' => $canDo ])
                                Store Details table Component
                            @endcomponent
                        </div>
                    </div>
                    @endif 
                    @if ( in_array('package_category_update', $canDo) )
                    <div class="tab-pane fade" id="edit-package-category" role="tabpanel">
                      <div class="card-body p-0 pt-2"> 
                         @component('components.forms.packages.category.edit',['licensors' => $licensors, 'stores' => $stores ,'storeBelongs' => $storeBelongs, 'package_category' => $package_category, 'canDo' => $canDo ])
                              package Category edit form Component
                          @endcomponent
                      </div>
                    </div>
                    @endif
                </div>
            </div> -
        </div>
    </div>
    <!-- package Table Area End Here -->
    {{--  @component('components.modal.packages.edit',['package' => $package, 'stores' => $stores ])
        Store Details table Component
    @endcomponent  --}}
@endsection
