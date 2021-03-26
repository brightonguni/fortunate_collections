@extends('layouts.app')
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Packages</h3>
        <ul>
            <li>
                <a href="{{route('package.index')}}">Home</a>
            </li>
            <li>Create package</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Product Table Area Start Here -->
    <div class="row gutters-20">
        <div class="col-md-12">
            <div class="card ui-tab-card">
                <div class="card-body p-4">
                    <a href="javascript:history.back()" class="mt-2 float-right"><i class="fas fa-chevron-circle-left" style="font-size: 25px;"></i></a>
                    <h5 class="card-title mt-1">Create package</h5>
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
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                        <div class="card-body">
                            @component('components.forms.packages.create',[ 'products'=>$products,'licensors' => $licensors,'package_categories'=>$package_categories, 'services' => $services,'stores' => $stores,'statistics' => $statistics ])
                                package Create Form Component
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
