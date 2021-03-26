@extends('layouts.app')
@section('content')
    <div class="breadcrumbs-area">
        <h3>Manage Product Category Details</h3>
        <ul>
          <li>Product Category Details</li>
            <li>
                <a href="{{route('product_category.index')}}">Product Categories</a>
            </li>
            
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- product Table Area Start Here -->
    <div class="row gutters-20">
        <div class="col-md-12">
        <div class="card ui-tab-card">
            <div class="card-body p-0">
                <div class="border-nav-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Category Details</a>
                        </li>
                        @if ( in_array('product_category_list', $canDo) )
                          <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#store" role="tab" aria-selected="false">Other categories</a>
                          </li>
                        @endif 
                        @if ( in_array('product_category_update', $canDo) )
                        <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#edit-product-category" role="tab" aria-selected="false">Edit Category</a>
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
                            @component('components.tables.products.category.category-details',['storeBelongs' => $storeBelongs, 'product_category' => $product_category, 'canDo' => $canDo ])
                                product Details table Component
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div> -
        </div>
    </div>
    <!-- product Table Area End Here -->
    {{--  @component('components.modal.products.edit',['product' => $product, 'stores' => $stores ])
        Store Details table Component
    @endcomponent  --}}
@endsection
