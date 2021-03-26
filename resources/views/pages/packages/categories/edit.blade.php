@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3> Edit project Category</h3>
      <ul>
        <li>
            <a href="{{route('package_category.index')}}">Home</a>
        </li>
        <li>
            <a href="{{route('package_category.show', [ 'id' => $package_category->id ])}}">Package Details</a>
        </li>
      </ul>
  </div>

    @component('components.modals.alert')
        Alert Component
    @endcomponent
    <div class="row gutters-20">
        <div class="col-md-12">
            <div class="card ui-tab-card">
                <div class="card-body p-4">
                    <a href="javascript:history.back()" class="mt-2 float-right"><i class="fas fa-chevron-circle-left" style="font-size: 25px;"></i></a>
                    <h5 class="card-title mt-1">Update  Package Details</h5>
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
                            @component('components.forms.packages.category.edit',['package_category' => $package_category, 'stores' => $stores,'licensors' => $licensors,'canDo' => $canDo])
                                package edit form Component
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
