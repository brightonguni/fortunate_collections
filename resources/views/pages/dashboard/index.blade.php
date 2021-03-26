@extends('layouts.app')
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Dashboard</h3>
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>Dashboard</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Dashboard summery Start Here -->
<div class="row gutters-20">
    <div class="col-xl-3 col-sm-6 col-12">
        <a href="{{route('users.index')}}">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-green ">
                            <i class="flaticon-multiple-users-silhouette text-green"></i>
                        </div>
                    </div>
                    <div class="col-6">
                       <div class="item-content">
                            <div class="item-title">Customers</div>
                            <div class="item-number"><span class="counter" data-num="{{('$statistics->customers->active')}}">{{('$statistics->customers->active')}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <a href="{{route('store.index')}}">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-blue">
                            <i class="flaticon-planet-earth text-blue"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Stores</div>
                            <!--<div class="item-number"><span class="counter" data-num="{{('$statistics->stores->active')}}">{{('$statistics->stores->active')}}</span></div>-->
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- Dashboard summery End Here -->
<!-- Dashboard Content Start Here -->
<div class="row gutters-20">
    {{-- @component('components.chart.orders',['monthlyTotal' => $monthlyTotal ]) --}}
        {{-- Top customer Component --}}
    {{-- @endcomponent --}}
        {{-- @component('components.chart.summary',['statistics' => $statistics, 'licensor' =>$licensor ]) --}}
            {{-- Top store Component --}}
        {{-- @endcomponent --}}
        {{-- @component('components.chart.stores',['stores' => $stores ]) --}}
            {{-- Top store Component --}}
        {{-- @endcomponent --}}
        {{-- @component('components.chart.payments',['paymentMethods' => $paymentMethods ]) --}}
            {{-- Top payments Component --}}
        {{-- @endcomponent --}}
        {{-- @component('components.chart.customers',['customers' => $customers ]) --}}
            {{-- Top customer Component --}}
        {{-- @endcomponent --}}
</div>
<!-- Dashboard Content End Here -->
@endsection
