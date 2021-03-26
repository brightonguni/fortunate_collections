@extends('layouts.app')
@section('content')

    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Notification</h3>
        <ul>
            <li>
                <a href="{{route('notifications.index')}}">Home</a>
            </li>
            <li>Create Notification</li>
        </ul>
    </div>

    <!-- Breadcubs Area End Here -->
    <!-- Product Table Area Start Here -->
    <div class="row gutters-20">
        <div class="col-md-12">
            <div class="card ui-tab-card">
                <div class="card-body p-4">
                    <h5 class="card-title mt-1">Create Notifications</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row gutters-20">
        <div class="col-md-12">
            @if(session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif

            <div class="card ui-tab-card">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                        <div class="card-body">

                            @component('components.forms.notifications.create')
                                Notification create form Component
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
