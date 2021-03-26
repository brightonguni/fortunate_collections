@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Blog Details</h3>
    <ul>
      <li>
        <a href="{{ route('blog.index') }}">Home</a>
      </li>
      <li>Blog Details</li>
    </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- Skills Table Area Start Here -->
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-0">
          <div class="border-nav-tab">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Comments</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#credit-card" role="tab" aria-selected="false">Categories</a>
              </li>
              @if( in_array('blog_update', $canDo) )
                <li class="nav-item">
                  <a class="nav-link" 
                    href="{{ route('blog.edit', ['id' => $blog->id ]) }}"  
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
                        <h3>About Article</h3>
                      </div>
                    </div>
                    <div class="single-info-details">
                      <div class="item-img">
                        <img style="padding-right: 15px;" 
                          src="{{asset('assets/images/blogs/'.$blog->avatar)}}" 
                          alt="no service image">
                      </div>
                      <div class="item-content">
                        <div class="header-inline item-header">
                          <h3 class="text-dark-medium font-medium">{{ $blog->title }}</h3>
                          <div class="header-elements">
                            <ul>
                              @if(isset($storeBelongs) && $storeBelongs && in_array('blog_update', $canDo))
                                <li><a href="{{ $blog->id }}/edit"><i class="far fa-edit"></i></a></li>
                              @endif
                              @if(isset($storeBelongs) && $storeBelongs && in_array('blog_update', $canDo))
                                <li><a href="{{ $blog->id }}/comment"><i class="far fa-comment"></i></a></li>
                              @endif
                              @if(isset($storeBelongs) && $storeBelongs && in_array('blog_delete', $canDo))
                                <li><a class="dropdown-item" data-target-id="{{$blog->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
                              @endif
                                
                            </ul>
                          </div>
                        </div>
                      <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                          <tbody>
                            <tr>
                              <td>ID No:</td>
                              <td class="font-medium text-dark-medium">{{ $blog->id }}</td>
                            </tr>
                            <tr>
                              <td>Title:</td>
                              <td class="font-medium text-dark-medium">{{ $blog->title }}</td>
                            </tr>
                            
                            <tr>
                              <td>categories</td>
                              <td>
                                @foreach($blog->categories  as $category)
                                <ul>
                                    <li>{{ $category->title }}</li>
                                </ul>
                                @endforeach
                              </td>
                            </tr>
                            <tr>
                              <td>Description:</td>
                              <td class="font-medium text-dark-medium">{{ $blog->description }}</td>
                            </tr>
                            <tr>
                              <td>Departments</td>
                              <td>
                                @foreach($blog->departments  as $department)
                                <ul>
                                    <li>{{ $department->name }}</li>
                                </ul>
                                @endforeach
                              </td>
                            </tr>
                            <tr>
                              <td>Date Created:</td>
                              <td class="font-medium text-dark-medium">{{ $blog->created_at->format('d F Y H:i') }}</td>
                            </tr>
                            <tr>
                              <td>Status:</td>
                              <td class="font-medium text-dark-medium">{{ ($blog->active)? 'Active' : 'Suspended'}}</td>
                            </tr>
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
