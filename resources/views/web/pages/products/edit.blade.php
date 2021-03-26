@extends('layouts.app')
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Service</h3>
        <ul class="gradient-dodger-blue">
            <li>
                <a href="{{route('service.index')}}">Home</a>
            </li>
            <li>
                <a href="/service/{{ $service->id }}">Details</a>
            </li>
            <li>Edit Team</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Product Table Area Start Here -->
    <div class="row gutters-20">
        <div class="col-md-12">
            <div class="card ui-tab-card">
                <div class="card-body p-4">
                    <a href="javascript:history.back()" class="mt-2 float-right"><i class="fas fa-chevron-circle-left" style="font-size: 25px;"></i></a>
                    <h5 class="card-title mt-1">Update Service Details</h5>
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
                            @component('components.forms.services.edit',[ 'service' => $service, 'roles' => $roles, 'canDo' => $canDo])
                                Services Edit Form Component
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
