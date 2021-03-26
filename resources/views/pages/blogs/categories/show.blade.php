@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Blog Category Summary</h3>
    <ul>
      <li>
        <a href="{{ route('blog_category.index') }}">Home</a>
      </li>
      <li>category Details</li>
    </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- categorys Table Area Start Here -->
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-0">
          <div class="border-nav-tab">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Profile</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#credit-card" role="tab" aria-selected="false">categorys</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">Projects</a>
              </li>
              
              @if( in_array('blog_category_update', $canDo) )
                <li class="nav-item">
                  <a class="nav-link" 
                    href="{{ route('blog_category.edit', ['id' => $category->id ]) }}"  
                    aria-selected="false"
                  > 
                    Edit
                  </a>
                </li>
              @endif
              </ul>
                </div>
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
                    <div class="heading-layout1">
                      <div class="item-title">
                        <h3>About category</h3>
                      </div>
                    </div>
                    <div class="single-info-details">
                      <div class="item-img">
                        <img style="padding-right: 15px;" 
                          src="{{asset('assets/images/blogs/category/'.$category->avatar)}}" 
                          alt="no service image">
                      </div>
                      <div class="item-content">
                        <div class="header-inline item-header">
                          <h3 class="text-dark-medium font-medium">{{ $category->title }}</h3>
                          <div class="header-elements">
                            <ul>
                              @if(isset($storeBelongs) && $storeBelongs && in_array('blog_category_update', $canDo))
                                <li><a href="{{ $category->id }}/edit"><i class="far fa-edit"></i></a></li>
                              @endif
                              @if(isset($storeBelongs) && $storeBelongs && in_array('blog_category_delete', $canDo))
                                <li><a class="dropdown-item" data-target-id="{{$category->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
                              @endif
                                {{--<li><a href="#"><i class="far fa-edit"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="fas fa-print"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="fas fa-download"></i></a></li>--}}
                            </ul>
                          </div>
                        </div>
                      <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                          <tbody>
                            <tr>
                              <td>ID No:</td>
                              <td class="font-medium text-dark-medium">{{ $category->id }}</td>
                            </tr>
                            <tr>
                              <td>Category Name:</td>
                              <td class="font-medium text-dark-medium">{{ $category->title }}</td>
                            </tr>
                            <tr>
                              <td>Description:</td>
                              <td class="font-medium text-dark-medium">{{ $category->description }}</td>
                            </tr>
                            <tr>
                              <td>Date Created:</td>
                              <td class="font-medium text-dark-medium">{{ $category->created_at->format('d F Y H:i') }}</td>
                            </tr>
                            <tr>
                              <td>Status:</td>
                              <td class="font-medium text-dark-medium">{{ ($category->active)? 'Active' : 'Suspended'}}</td>
                            </tr>
                            @if($team->hasLicensor())
                              <tr>
                                  <td>Licensor:</td>
                                  <td class="font-medium text-dark-medium">{{ $category->licensor->name}}</td>
                              </tr>
                            @endif
                            @if($category->hasStore())
                              <tr>
                                  <td>Store:</td>
                                  <td class="font-medium text-dark-medium">{{ $category->store->name}}</td>
                              </tr>
                            @endif
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="credit-card" role="tabpanel">
                </div>
              </div>
            </div>
          </div>
        </div>
      <script>
@endsection
