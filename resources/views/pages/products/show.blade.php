@extends('layouts.app')
@section('content')
    <div class="breadcrumbs-area">
        <h3>product</h3>
        <ul>
            <li>
                <a href="{{route('product.index')}}">Home</a>
            </li>
            <li>product Details</li>
        </ul>
    </div>
    <div class="row gutters-20">
        <div class="col-md-12">
        <div class="card ui-tab-card">
            <div class="card-body p-0">
                <div class="border-nav-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Profile</a>
                        </li>
                        @if ( in_array('store_list', $canDo) )
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#store" role="tab" aria-selected="false">Store</a>
                        </li>
                        @endif
                        @if ( in_array('transaction_list', $canDo) )
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">Teams</a>--}}
                        {{--</li>--}}
                        @endif
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" data-toggle="tab" href="#tab6" role="tab" aria-selected="false">Activity Log</a>--}}
                        {{--</li>--}}
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
                            @component('components.tables.products.product-details',['storeBelongs' => $storeBelongs, 'product' => $product, 'canDo' => $canDo ,'categories' =>$categories])
                                product Details table Component
                            @endcomponent
                        </div>
                    </div>
                    {{-- @if ( in_array('store_list', $canDo) )
                    <div class="tab-pane fade" id="store" role="tabpanel">
                        <div class="card-body">
                            @component('components.tables.stores-details',['store' => $product->store, 'storeBelongs' => $storeBelongs,  'canDo' => $canDo ])
                                Store Details table Component
                            @endcomponent
                        </div>
                    </div>
                    @endif --}}
                    {{-- <div class="tab-pane fade" id="tab7" role="tabpanel">
                        <div class="card-body p-0 pt-2"> --}}
{{--                            @component('components.form.customers.edit',['customer' => $customer , 'roles' => $roles ])--}}
{{--                                Users edit form Component--}}
{{--                            @endcomponent--}}
                        {{-- </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- product Table Area End Here -->
    {{--  @component('components.modals.products.edit',['product' => $product, 'stores' => $stores ])
        Store Details table Component
    @endcomponent  --}}
@endsection
