@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Stores</h3>
      <ul>
        <li>
          <a href="{{route('store.index')}}">Home</a>
        </li>
        <li>All Clients / Businesses</li>
      </ul>
    </div>
    @component('components.modals.alert')
      Alert Component
    @endcomponent
    <!-- Breadcubs Area End Here -->
    <!-- Dashboard summery Start Here -->
    <div class="row gutters-20">
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="dashboard-summery-one mg-b-20">
          <div class="row align-items-center">
            <div class="col-6">
              <div class="item-icon bg-light-green ">
                  <i class="fas fa-cash-register fa-4x text-green"></i>
              </div>
            </div>
            <div class="col-6">
              <div class="item-content">
                <div class="item-title">Teams</div>
                {{-- <div class="item-number"><span class="counter" data-num="{{ $statistics->payoutTotal }}">{{ $statistics->payoutTotal }}</span></div> --}}
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
                <i class="fas text-blue fa-4x fa-money-bill-alt"></i>
              </div>
            </div>
            <div class="col-6">
              <div class="item-content">
                <div class="item-title">New Clients</div>
                  <!-- <div class="item-number"><span class="counter" data-num="{{ $statistics->unverified }}">{{ $statistics->unverified }}</span></div> -->
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
                  <i class="fas text-orange fa-4x fa-thumbs-up"></i>
                </div>
              </div>
              <div class="col-6">
                <div class="item-content">
                  <div class="item-title">Projects</div>
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
                <i class="fas fa-thumbs-down fa-4x text-red"></i>
              </div>
            </div>
            <div class="col-6">
              <div class="item-content">
                <div class="item-title">My Active Categories</div>
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
    @if(session()->has('success'))
      <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <!-- Dashboard summery End Here -->
    <!-- Dashboard Content Start Here -->
    <div class="row gutters-20">
      <div class="col-12 col-xl-12 col-12-xxxl">
        @component('components.tables.stores.categories.categories',['categories'=>$categories, 'canDo' => $canDo ])
            Stores table Component
        @endcomponent
      </div>
    </div>
@endsection
