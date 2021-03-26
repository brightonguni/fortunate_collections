@extends('layouts.app')
@section('content')

    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Store</h3>
        <ul>
            <li>
                <a href="{{route('store.index')}}">Home</a>
            </li>
            <li>Store Details</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- User Table Area Start Here -->
    <div class="row gutters-20">
        <div class="col-md-12">
        <div class="card ui-tab-card">
            <div class="card-body p-0">
                <div class="border-nav-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Store Profile</a>
                        </li>
                        @if( in_array('store_list', $canDo) )
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#projects" role="tab" aria-selected="false">projects</a>
                        </li>
                        @endif
                        @if( in_array('transaction_list', $canDo) )
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab7" role="tab" aria-selected="false">Purchases</a>
                        </li>
                        @endif

                        @if($storeBelongs)
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" data-toggle="tab" href="#tab8" role="tab" aria-selected="false">Request Payout Payment--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab9" role="tab" aria-selected="false">Menus</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" data-toggle="tab" href="#tab7" role="tab" aria-selected="false">Edit</a>--}}
{{--                        </li>--}}
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
                            @component('components.tables.stores.store-details',['storeBelongs' => $storeBelongs,  'store' => $store, 'canDo' => $canDo ])
                                Store Details table Component
                            @endcomponent
                        </div>
                    </div>
                    {{-- @if( in_array('store_list', $canDo) )
                    <div class="tab-pane fade" id="tab1" role="tabpanel">
                        <div class="card-body p-0 pt-2">
                            @component('components.tables.projects',['projects' => $store->projects, 'storeBelongs' => $storeBelongs, 'canDo' =>$canDo ])
                                Stores projects table Component
                            @endcomponent
                        </div>
                    </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection
