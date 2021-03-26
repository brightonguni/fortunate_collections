@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>package Summary</h3>
    <ul>
      <li>
        <a href="{{ route('package.index') }}">Home</a>
      </li>
      <li>Package Details</li>
    </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- packages Table Area Start Here -->
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
                  <a class="nav-link" data-toggle="tab" href="#credit-card" role="tab" aria-selected="false">packages</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">Projects</a>
              </li>
              @if( in_array('package_update', $canDo) )
                <li class="nav-item">
                  <a class="nav-link" 
                    href="{{ route('package.edit', ['id' => $package->id ]) }}"  
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
                        <h3>About package</h3>
                      </div>
                    </div>
                    <div class="single-info-details">
                      <div class="item-content">
                        <div class="header-inline item-header">
                          <h3 class="text-dark-medium font-medium">{{ $package->name }}</h3>
                          <div class="header-elements">
                            <ul>
                              @if(isset($storeBelongs) && $storeBelongs && in_array('package_update', $canDo))
                                <li><a href="{{ $package->id }}/edit"><i class="far fa-edit"></i></a></li>
                              @endif
                              @if(isset($storeBelongs) && $storeBelongs && in_array('package_delete', $canDo))
                                <li><a class="dropdown-item" data-target-id="{{$package->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
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
                              <td class="font-medium text-dark-medium">{{ $package->id }}</td>
                            </tr>
                            <tr>
                              <td>Package Name:</td>
                              <td class="font-medium text-dark-medium">{{ $package->name }}</td>
                            </tr>
                            <tr>
                              <td>Description:</td>
                              <td class="font-medium text-dark-medium">{{ $package->description }}</td>
                            </tr>
                            <tr>
                              <td>Date Created:</td>
                              <td class="font-medium text-dark-medium">{{ $package->created_at->format('d F Y H:i') }}</td>
                            </tr>
                            <tr>
                              <td>Status:</td>
                              <td class="font-medium text-dark-medium">{{ ($package->active)? 'Active' : 'Suspended'}}</td>
                            </tr>
                            <tr>
                              <td>Package Service:</td>
                              <td>
                              <ul>
                                @foreach($package->services as $service)
                                  <li class="font-medium text-dark-medium">{{ $service->title}}</li>
                                @endforeach
                              </ul>
                              </td>
                            </tr>
                            <tr>
                              <td>Package Categories:</td>
                              <td>
                              <ul>
                                @foreach($package->categories as $category)
                                  <li class="font-medium text-dark-medium">{{ $category->title}}</li>
                                @endforeach
                              </ul>
                              </td>
                            </tr>
                            <tr>
                              <td>Package Products:</td>
                              <td>
                              <ul>
                                @foreach($package->products as $product)
                                  <li class="font-medium text-dark-medium">{{ $product->title}}</li>
                                @endforeach
                              </ul>
                              </td>
                            </tr>
                            <tr>
                                <td>Licensor:</td>
                                <td class="font-medium text-dark-medium">{{ $package->licensor->name}}</td>
                            </tr>
                            <tr>
                                <td>Store:</td>
                                <td class="font-medium text-dark-medium">{{ $package->store->name}}</td>
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
