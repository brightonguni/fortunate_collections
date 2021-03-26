@extends('layouts.app')
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Manage Products</h3>
        <ul>
          <li>Products</li>
          <li>
              <a href="{{ route('product.create') }}">Create Product</a>
          </li>
          <li>Categories</li>
          <li>
              <a href="{{ route('product_category.create') }}">Create Category</a>
          </li>
          <li>Sub Categories</li>
          <li>
              <a href="{{ route('product_sub_category.create') }}">Create Sub Categories</a>
          </li>
          <li>Colours</li>
          
          <li>
              <a href="{{ route('product_color.create') }}">Create Colour</a>
          </li>
          <li>Brands</li>
          <li>
              <a href="{{ route('product_brand.create') }}">Create Brand</a>
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
                <a class="nav-link active" data-toggle="tab" href="#view-products" role="tab" aria-selected="true">View Products</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-products" role="tab" aria-selected="true"> New Product</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#product-categories" role="tab" aria-selected="false">Product Categories</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-categories" role="tab" aria-selected="true"> New Category</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#product-sub-categories" role="tab" aria-selected="false">Sub Categories</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-sub-categories" role="tab" aria-selected="true"> New Sub Category</a>
            </li>  --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#product-brands" role="tab" aria-selected="false">Brands</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-brand" role="tab" aria-selected="true"> New Brand</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#product-colour" role="tab" aria-selected="false">View Colours</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-colour" role="tab" aria-selected="true"> New Colour</a>
            </li> --}}
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active" id="view-products" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.products.products',['products' => $products, 'storeBelongs' => $storeBelongs,  'canDo' => $canDo,  ])
                      projects table Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="create-products" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.products.create',['stores' => $stores,'brands'=> $brands,'colors' => $colors,'categories'=>$categories,'sub_categories'=>$sub_categories,'licensors' => $licensors,'canDo' => $canDo])
                    product Create form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="product-categories" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.products.category.categories',['categories' => $categories, 'storeBelongs' => $storeBelongs,  'canDo' => $canDo,  ])
                      product categories table Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="create-categories" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.products.category.create',['stores' => $stores,'categories'=>$categories,'licensors' => $licensors,'canDo' => $canDo])
                    product category Create form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="product-sub-categories" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.products.sub-category.sub-categories',['sub_categories' => $sub_categories, 'storeBelongs' => $storeBelongs,  'canDo' => $canDo,  ])
                      product sub categories table Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="create-sub-categories" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.products.sub-category.create',['stores' => $stores,'categories'=>$categories,'licensors' => $licensors,'canDo' => $canDo])
                    product sub category Create form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="product-brands" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.products.brands.brands',['brands' => $brands, 'storeBelongs' => $storeBelongs,  'canDo' => $canDo,  ])
                      product brands table Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="create-brand" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.products.brands.create',['stores' => $stores,'brands'=>$brands,'licensors' => $licensors,'canDo' => $canDo])
                    product brands Create form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="product-colour" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.products.colors.colors',['colors' => $colors, 'storeBelongs' => $storeBelongs,  'canDo' => $canDo,  ])
                      product colors table Component
                  @endcomponent
                </div>
              </div>
            </div>
            {{-- <div class="tab-pane fade show" id="create-colour" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.products.colors.create',['stores' => $stores,'brands'=>$brands,'licensors' => $licensors,'canDo' => $canDo])
                    product brands Create form Component
                  @endcomponent
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
@endsection
