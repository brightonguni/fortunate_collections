@extends('layouts.app')
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Notifications</h3>
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>All Notifications</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Dashboard summery Start Here -->
    <!-- Dashboard summery End Here -->
    <!-- Dashboard Content Start Here -->
    <div class="row gutters-20">
        <div class="col-12 col-xl-12 col-12-xxxl">
            @component('components.tables.notifications',['notifications' => $notifications ])
                Notifications table Component
            @endcomponent
        </div>
    </div>
@endsection
