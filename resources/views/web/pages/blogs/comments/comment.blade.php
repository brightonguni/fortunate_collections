@extends('layouts.web.app')
@section('content')
    <!-- Breadcubs Area Start Here -->
   <div class="container pt-5 mt-5">
     <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area pb-5 mb-5">
            <h3>Comment</h3>
            <ul>
                <li>
                    <a href="{{route('web_blog.index')}}">Home</a>
                </li>
                <li>Comment</li>
            </ul>
        </div>
      </div>
     </div>
   </div>
    @component('web.components.modals.alert')
        Alert Component
    @endcomponent
    <div class="row gutters-20">
        <div class="col-md-12">
            <div class="card ui-tab-card">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                        <div class="card-body">
                            @component('web.components.forms.blog.comment',[ 
                              'blogs' =>$blogs,
                              'events' => $events,
                              'services' => $services, 
                              'blog' =>$blog,'service_categories'=>$service_categories,
                              'products'=> $products])
                              comment Create Form Component
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
