@extends('layouts.app')
@section('content')

    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>project</h3>
        <ul>
            <li>
                <a href="{{route('project.index')}}">Home</a>
            </li>
            <li>project Details</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- project Table Area Start Here -->
    <div class="row gutters-20">
        <div class="col-md-12">
        <div class="card ui-tab-card">
            <div class="card-body p-0">
                <div class="border-nav-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Profile</a>
                        </li>
                        @if ( in_array('store_list', $canDo) )
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#store" role="tab" aria-selected="false">Store</a>
                        </li>
                        @endif
                        @if ( in_array('transaction_list', $canDo) )
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">Teams</a>--}}
                        {{--</li>--}}
                        @endif
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" data-toggle="tab" href="#tab6" role="tab" aria-selected="false">Activity Log</a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
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
                            @component('components.tables.projects.project-details',['storeBelongs' => $storeBelongs, 'project' => $project, 'canDo' => $canDo ])
                                project Details table Component
                            @endcomponent
                        </div>
                    </div>
                    {{--  @if ( in_array('store_list', $canDo) )
                    <div class="tab-pane fade" id="store" role="tabpanel">
                        <div class="card-body">
                            @component('components.tables.stores-details',['store' => $project->store, 'storeBelongs' => $storeBelongs,  'canDo' => $canDo ])
                                Store Details table Component
                            @endcomponent
                        </div>
                    </div>
                    @endif  --}}
                    <div class="tab-pane fade" id="tab7" role="tabpanel">
                        <div class="card-body p-0 pt-2">
{{--                            @component('components.form.customers.edit',['customer' => $customer , 'roles' => $roles ])--}}
{{--                                Users edit form Component--}}
{{--                            @endcomponent--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- project Table Area End Here -->
    {{--  @component('components.modals.projects.edit',['project' => $project, 'stores' => $stores ])
        Store Details table Component
    @endcomponent  --}}

@endsection
