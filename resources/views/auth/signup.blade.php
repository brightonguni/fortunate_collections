
@extends('layouts.login_navbar')
@section('content')

<div class="container">    
    <div class="row gutters-20">
        <div class="col-md-8 col-md-offset-4">
            <div class="card ui-tab-card">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                        <div class="card-body">
                             @components('web.components.forms.register.signup',[''])
                                register-user Form Component
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
