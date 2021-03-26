@extends('layouts.app')
@section('content')
    <div class="breadcrumbs-area">
        <h3>Manage Product Brands</h3>
        <ul>
            <li>
                <a href="{{route('product_brand.index')}}">Home</a>
            </li>
            <li>Product Brand Details</li>
        </ul>
    </div>
    <div class="row gutters-20">
        <div class="col-md-12">
        <div class="card ui-tab-card">
            <div class="card-body p-0">
                <div class="border-nav-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Brand Details</a>
                        </li>
                        @if ( in_array('product_brand_list', $canDo) )
                          <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#store" role="tab" aria-selected="false">Other Brands</a>
                          </li>
                        @endif 
                        @if ( in_array('product_brand_update', $canDo) )
                        <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#edit-product-brand" role="tab" aria-selected="false">Edit Brand</a>
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
                            @component('components.tables.products.brands.brand-details',['storeBelongs' => $storeBelongs, 'brand' => $brand, 'canDo' => $canDo ])
                                product Brand Details table Component
                            @endcomponent
                        </div>
                    </div>
                    @if ( in_array('product_brand_list', $canDo) )
                    <div class="tab-pane fade" id="store" role="tabpanel">
                        <div class="card-body">
                            @component('components.tables.products.brands.brands',['brands' => $brands,  'storeBelongs' => $storeBelongs,  'canDo' => $canDo ])
                                Store Details table Component
                            @endcomponent
                        </div>
                    </div>
                    @endif 
                    @if ( in_array('product_brand_update', $canDo) )
                    <div class="tab-pane fade" id="edit-product-brand" role="tabpanel">
                      <div class="card-body p-0 pt-2"> 
                         @component('components.forms.products.brands.edit',['licensors' => $licensors, 'stores' => $stores ,'storeBelongs' => $storeBelongs, 'brand' => $brand, 'canDo' => $canDo ])
                              Product Category edit form Component
                          @endcomponent
                      </div>
                    </div>
                    @endif
                </div>
            </div> -
        </div>
    </div>
    <!-- product Table Area End Here -->
    {{--  @component('components.modal.products.edit',['product' => $product, 'stores' => $stores ])
        Store Details table Component
    @endcomponent  --}}
@endsection
