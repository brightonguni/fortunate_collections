@extends('layouts.app')
@section('content')
    <div class="breadcrumbs-area">
        <h3>faqs</h3>
        <ul>
            <li>
                <a href="{{route('faq.index')}}">Home</a>
            </li>
            <li>Create faq</li>
        </ul>
    </div>
    <div class="row gutters-20">
      <div class="col-xs-12 col-sm-12 cpl-lg-12 col-md-12">
        <div class="card ui-tab-card">
          <div class="card-body p-4">
            <a href="javascript:history.back()" class="mt-2 float-right"><i class="fas fa-chevron-circle-left" style="font-size: 25px;"></i></a>
            <h5 class="card-title mt-1">Create faq</h5>
          </div>
        </div>
      </div>
    </div>
    @component('components.modals.alert')
        Alert Component
    @endcomponent
    <div class="row gutters-20">
      <div class="col-md-12">
        <div class="card ui-tab-card">
          <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Create faq</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#category" role="tab" aria-selected="false">Create faq Category</a>
              </li>
            </ul>
          <div class="tab-content">
    <!-- Dashboard summery Start Here -->
            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
              <div class="card-body">
                @component('components.forms.faqs.create',[ 'licensors'=>$licensors,'categories'=> $categories,'stores'=>$stores, 'canDo' => $canDo])
                    faq Create Form Component
                @endcomponent
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
