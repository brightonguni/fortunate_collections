@extends('layouts.app')
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area gutters-20">
        <h3>Permissions</h3>
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>Permissions</li>
        </ul>
    </div>
    <!-- Dashboard Content Start Here -->
    <div class="row gutters-20">
        <div class="col-12 col-xl-12 col-12-xxxl">
            @component('components.forms.permissions.edit',['roles' => $roles, 'permissions' => $permissions ])
                Permissions table Component
            @endcomponent
        </div>
    </div>
@endsection
