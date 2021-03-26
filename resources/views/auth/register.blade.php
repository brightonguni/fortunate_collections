
@extends('layouts.login_navbar')
@section('content')

    <!-- Breadcubs Area End Here -->
    <!-- Product Table Area Start Here -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-4">
                <h3 class="text-center mb-4">Sign Up</h3>
                <div class="card">
                    <div class="card-body">
                        {{-- @components('components.forms.register.signup')
                            register-user Form Component
                        @endcomponent --}}
                        @include('components.forms.register.signup')
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
