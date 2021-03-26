@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>department Summary</h3>
    <ul>
      <li>
        <a href="{{ route('departments.index') }}">Home</a>
      </li>
      <li>department Details</li>
    </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- departments Table Area Start Here -->
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
                  <a class="nav-link" data-toggle="tab" href="#credit-card" role="tab" aria-selected="false">departments</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">Projects</a>
              </li>
              
              @if( in_array('department_update', $canDo) )
                <li class="nav-item">
                  <a class="nav-link" 
                    href="{{ route('departments.edit', ['id' => $department->id ]) }}"  
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
                        <h3>About department</h3>
                      </div>
                    </div>
                    <div class="single-info-details">
                      <div class="item-content">
                        <div class="header-inline item-header">
                          <h3 class="text-dark-medium font-medium">{{ $department->name }}</h3>
                          <div class="header-elements">
                            <ul>
                              @if(isset($storeBelongs) && $storeBelongs && in_array('department_update', $canDo))
                                <li><a href="{{ $department->id }}/edit"><i class="far fa-edit"></i></a></li>
                              @endif
                              @if(isset($storeBelongs) && $storeBelongs && in_array('department_delete', $canDo))
                                <li><a class="dropdown-item" data-target-id="{{$department->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
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
                              <td class="font-medium text-dark-medium">{{ $department->id }}</td>
                            </tr>
                            <tr>
                              <td>department Name:</td>
                              <td class="font-medium text-dark-medium">{{ $department->name }}</td>
                            </tr>
                            
                            <tr>
                              <td>Description:</td>
                              <td class="font-medium text-dark-medium">{{ $department->description }}</td>
                            </tr>
                            <tr>
                              <td>Date Created:</td>
                              <td class="font-medium text-dark-medium">{{ $department->created_at->format('d F Y H:i') }}</td>
                            </tr>
                            <tr>
                              <td>Status:</td>
                              <td class="font-medium text-dark-medium">{{ ($department->active)? 'Active' : 'Suspended'}}</td>
                            </tr>
                            
                              <tr>
                                  <td>Licensor:</td>
                                  <td class="font-medium text-dark-medium">{{ $department->licensor->name}}</td>
                              </tr>
                           
                              <tr>
                                  <td>Store:</td>
                                  <td class="font-medium text-dark-medium">{{ $department->store->name}}</td>
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
