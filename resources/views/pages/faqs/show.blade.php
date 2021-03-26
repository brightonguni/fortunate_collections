@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>faq</h3>
    <ul>
      <li>
        <a href="{{ route('faq.index') }}">Home</a>
      </li>
      <li>faq Details</li>
    </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- User Table Area Start Here -->
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-0">
          <div class="border-nav-tab">
              @if( in_array('faq_update', $canDo) )
                <li class="nav-item">
                  <a class="nav-link" 
                    href="{{ route('faq.edit', ['id' => $faq->id ]) }}"  
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
                        <h3>About faq</h3>
                      </div>
                    </div>
                    <div class="single-info-details">
                      <div class="item-img">
                        <div class="card-image-small" style="background-image: url('{{ asset('assets/images/faqs/'.$faq->avatar)}}');"></div> 
                        <img style="" 
                            src="{{URL::asset('assets/images/faqs/'.$faq->avatar)}}" 
                            alt="no faq image" 
                      </div>
                      <div class="item-content">
                        <div class="header-inline item-header">
                          <h3 class="text-dark-medium font-medium">{{ $faq->title }}</h3>
                          <div class="header-elements">
                            <ul>
                              {{-- @if(isset($storeBelongs) && $storeBelongs && in_array('faq_update', $canDo)) --}}
                                <li><a href="{{ $faq->id }}/edit"><i class="far fa-edit"></i></a></li>
                              {{-- @endif --}}
                              {{-- @if(isset($storeBelongs) && $storeBelongs && in_array('faq_delete', $canDo)) --}}
                                <li><a class="dropdown-item" data-target-id="{{$faq->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
                              {{-- @endif --}}
                            </ul>
                          </div>
                        </div>
                      <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                          <tbody>
                            <tr>
                              <td>ID No:</td>
                              <td class="font-medium text-dark-medium">{{ $faq->id }}</td>
                            </tr>
                            <tr>
                              <td>Question :</td>
                              <td class="font-medium text-dark-medium">{{ $faq->question }}</td>
                            </tr>
                            <tr>
                              <td>Answer:</td>
                              <td class="font-medium text-dark-medium">{{ $faq->answer }}</td>
                            </tr>
                            
                            <tr>
                              <td>Date Created:</td>
                              <td class="font-medium text-dark-medium">{{ $faq->created_at->format('d F Y H:i') }}</td>
                            </tr>
                           
                            <tr>
                              <td>Status:</td>
                              <td class="font-medium text-dark-medium">{{ ($faq->active)? 'Active' : 'Suspended'}}</td>
                            </tr>
                              <tr>
                                  <td>Licensor:</td>
                                  <td class="font-medium text-dark-medium">{{ $faq->licensor->name}}</td>
                              </tr>
                              <tr>
                                  <td>Store:</td>
                                  <td class="font-medium text-dark-medium">{{ $faq->store->name}}</td>
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
@endsection
