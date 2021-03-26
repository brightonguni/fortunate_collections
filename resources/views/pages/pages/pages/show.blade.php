@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Page</h3>
    <ul>
      <li>
        <a href="{{ route('page.index') }}">Home</a>
      </li>
      <li>Page Details</li>
    </ul>
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
                  <h3>About Page</h3>
                </div>
              </div>
              <div class="single-info-details">
                <div class="item-img">
                  <img src="{{asset('img/figure/teacher.jpg')}}" alt="teacher">
                </div>
                <div class="item-content">
                  <div class="header-inline item-header">
                    <h3 class="text-dark-medium font-medium">{{ $page->title }}</h3>
                    <div class="header-elements">
                      <ul>
                        @if(isset($storeBelongs) && $storeBelongs && in_array('page_update', $canDo))
                          <li><a href="{{ $page->id }}/edit"><i class="far fa-edit"></i></a></li>
                        @endif 
                        @if(isset($storeBelongs) && $storeBelongs && in_array('page_delete', $canDo)) 
                          <li>
                            <a class="dropdown-item" data-target-id="{{$page->id}}" 
                              data-toggle="modal" data-target="#delete"
                            >
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </li>
                        @endif 
                      </ul>
                    </div>
                  </div>
                  <div class="info-table table-responsive">
                    <table class="table text-nowrap">
                      <tbody>
                        <tr>
                          <td>ID No:</td>
                          <td class="font-medium text-dark-medium">{{ $page->id }}</td>
                        </tr>
                        <tr>
                          <td> Title :</td>
                          <td class="font-medium text-dark-medium">{{ $page->title }}</td>
                        </tr>
                        <tr>
                          <td>Description:</td>
                          <td class="font-medium text-dark-medium">{{ $page->description }}</td>
                        </tr>
                        <tr>
                          <td>Date Created:</td>
                          <td class="font-medium text-dark-medium">{{ $page->created_at->format('d F Y H:i') }}</td>
                        </tr>
                        <tr>
                          <td>Status:</td>
                          <td class="font-medium text-dark-medium">{{ ($page->active)? 'Active' : 'Suspended'}}</td>
                        </tr>
                        @if($page->hasLicensor())
                          <tr>
                              <td>Licensor:</td>
                              <td class="font-medium text-dark-medium">{{ $page->licensor->name}}</td>
                          </tr>
                        @endif
                        @if($page->hasStore())
                          <tr>
                              <td>Store:</td>
                              <td class="font-medium text-dark-medium">{{ $page->store->name}}</td>
                          </tr>
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="credit-card" role="tabpanel"></div>
        </div>
      </div>
    </div>
  </div>
@endsection
