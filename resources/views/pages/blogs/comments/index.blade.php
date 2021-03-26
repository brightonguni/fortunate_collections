@extends('layouts.app')
@section('content')

  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Skills</h3>
    <ul>
      <li>
          <a href="{{ route('blog.index') }}">Home</a>
      </li>
      <li>All Comments</li>
    </ul>
  </div>
    <!-- Breadcubs Area End Here -->
    <!-- Dashboard summery Start Here -->
  <div class="row gutters-20">
    
    <div class="col-md-4">
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
                <div class="item-number">
                  <span 
                    class="counter" 
                    data-num="{{ ('$statistics->active ')}}"
                  >
                    {{(' $statistics->active ')}}
                  </span>  
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
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
              <div class="item-number">
                <span 
                  class="counter" 
                  data-num="{{(' $statistics->blocked') }}"
                >
                  {{ ('$statistics->blocked') }}
                </span> 
              </div> 
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="col-md-4">
    <div class="dashboard-summery-one mg-b-20">
      <div class="row align-items-center">
        <div class="col-6">
          <div class="item-icon bg-light-red">
            <i class="fas fa-trash fa-4x text-red"></i>
          </div>
        </div>
        <div class="col-6">
          <div class="item-content">
            <div 
              class="item-title"
            >
              Deleted
            </div>
              <div class="item-number">
                <span 
                  class="counter" 
                  data-num="{{ ('$statistics->deleted ')}}"
                >
                {{ ('$statistics->deleted') }}
              </span> 
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  @if(session()->has('permission_error'))
    <div 
      class="alert alert-danger"
    >
      {{ session()->get('permission_error') }}
    </div>
  @endif
  <!-- Dashboard summery End Here -->
  <!-- Dashboard Content Start Here -->
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-0">
          <div class="border-nav-tab">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#skills" role="tab" aria-selected="true">Skills</a>
              </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </div>
 
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('components.tables.blog.comments.comments',[ 'canDo' => $canDo ,'comments' => $comments])
        teams-table Component
      @endcomponent
    </div>
  </div>
  
  
@endsection
