@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Manage Frequently Asked Questions (faqs)</h3>
    <ul>
      <li>faqs</li>
      <li>
          <a href="{{ route('faq.index') }}">View faqs</a>
      </li>
      <li>
          <a href="{{ route('faq.create') }}">Create faq</a>
      </li>
      <li>Categories</li>
      <li>
          <a href="{{ route('faq_category.index') }}">Categories</a>
      </li>
      <li>
          <a href="{{ route('faq_category.create') }}">Create category</a>
      </li>
    </ul>
  </div>
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
                    data-num="{{ $statistics->active }}"
                  >
                    {{ $statistics->active }}
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
                  data-num="{{ $statistics->blocked }}"
                >
                  {{ $statistics->blocked }}
                </span> 
              </div> 
            </div>
          </div>
        </div>
      </div>
  </div>
   <div class="col-xl-3 col-sm-6 col-md-4">
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
    <div 
      class="alert alert-danger"
    >
      {{ session()->get('permission_error') }}
    </div>
  @endif
    <div class="card ui-tab-card">
      <div class="card-body p-0">
        <div class="border-nav-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#faqs" role="tab" aria-selected="true">faqs</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="tab" href="#create-faqs" role="tab" aria-selected="true"> New faq</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#faq-categories" role="tab" aria-selected="false">faq Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-categories" role="tab" aria-selected="true"> New Category</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active" id="faqs" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.faqs.faqs',['faqs' => $faqs, 'canDo' => $canDo ])
                    faqs-table Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="faq-categories" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.faqs.category.categories',['categories' => $categories ,'canDo' => $canDo ])
                    faq Categories edit form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="create-faqs" role="tabpanel">
              <div class="row gutters-20 m-4">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.faqs.create',[ 'licensors'=>$licensors,'categories'=> $categories,'stores'=>$stores,'faqs' => $faqs, 'canDo' => $canDo])
                      faq Create Form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="create-categories" role="tabpanel">
              <div class="row gutters-20 m-4">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.faqs.category.create',[ 'licensors'=>$licensors,'categories'=> $categories,'stores'=>$stores,'faqs' => $faqs, 'canDo' => $canDo])
                      faq Create Form Component
                  @endcomponent
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
