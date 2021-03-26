@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <ul>
      <li>
        <a href="{{route('page.index')}}">Home</a>
      </li>
      <li>Create New Page</li>
    </ul>
  </div>
  @component('components.modals.alert')
      Alert Component
  @endcomponent
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab1" role="tabpanel">
            <div class="card-body">
              @component('components.forms.pages.create',[ 'stores' => $stores,'licensors'=> $licensors, 'canDo' => $canDo])
                  Page Create Form Component
              @endcomponent
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
