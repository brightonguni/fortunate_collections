@extends('layouts.app')
@section('content')

    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Store</h3>
        <ul>
            <li>
                <a href="{{route('store.index')}}">Home</a>
            </li>
            <li>
                <a href="{{route('store_contact.show', ['id' => $contact->id ])}}">Details</a>
            </li>
            <li>Edit Store</li>
        </ul>
    </div>

    @component('components.modals.alert')
        Alert Component
    @endcomponent
    <!-- Breadcubs Area End Here -->
    <!-- project Table Area Start Here -->
    <div class="row gutters-20">
        <div class="col-md-12">
            <div class="card ui-tab-card">
                <div class="card-body p-4">
                    <a href="javascript:history.back()" class="mt-2 float-right"><i class="fas fa-chevron-circle-left" style="font-size: 25px;"></i></a>
                    <h5 class="card-title mt-1">Update Store Details</h5>
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
                            @component('components.forms.stores.contacts.edit',[ 'contact' => $contact, 'users'=>$users,'canDo' =>$canDo,'stores'=>$stores,'licensors'=>$licensors,])
                                Store Contact Edit Form Component
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
