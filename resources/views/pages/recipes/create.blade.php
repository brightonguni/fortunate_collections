@extends('layouts.app')
@section('content')
    <div class="breadcrumbs-area">
        <h3>recipes</h3>
        <ul>
            <li>
                <a href="{{route('recipe.index')}}">Home</a>
            </li>
            <li>Create recipe</li>
        </ul>
    </div>
    <div class="row gutters-20">
      <div class="col-xs-12 col-sm-12 cpl-lg-12 col-md-12">
        <div class="card ui-tab-card">
          <div class="card-body p-4">
            <a href="javascript:history.back()" class="mt-2 float-right"><i class="fas fa-chevron-circle-left" style="font-size: 25px;"></i></a>
            <h5 class="card-title mt-1">Create recipe</h5>
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
                  <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Create recipe</a>
              </li>
              
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#category" role="tab" aria-selected="false">Create recipe Category</a>
              </li>
              
            </ul>
          <div class="tab-content">
    <!-- Dashboard summery Start Here -->
            
            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
              <div class="card-body">
                @component('components.forms.recipes.create',[ 'licensors'=>$licensors,'recipes_category'=> $recipes_category,'stores'=>$stores,'canDo' => $canDo])
                    recipe Create Form Component
                @endcomponent
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
