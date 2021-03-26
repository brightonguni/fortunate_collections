@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Recipe Methods</h3>
    <ul>
      <li>
        <a href="{{ route('recipe_method.index') }}">Home</a>
      </li>
      <li>Methods</li>
    </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- User Table Area Start Here -->
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-0">
          <div class="border-nav-tab">
              @if( in_array('recipe_method_update', $canDo) )
                <li class="nav-item">
                  <a class="nav-link" 
                    href="{{ route('recipe_method.edit', ['id' => $recipe_method->id ]) }}"  
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
                        <h3>Recipe Methods</h3>
                      </div>
                    </div>
                    <div class="single-info-details">
                      <div class="item-img">
                        <img src="{{URL::asset('assets/images/recipes/methods/'.$recipe_method->avatar)}}" alt="no image">
                      </div>
                      <div class="item-content">
                        <div class="header-inline item-header">
                          <h3 class="text-dark-medium font-medium">{{ $recipe_method->title }}</h3>
                          <div class="header-elements">
                            <ul>
                              {{-- @if(isset($storeBelongs) && $storeBelongs && in_array('category_update', $canDo)) --}}
                                <li><a href="{{ $recipe_method->id }}/edit"><i class="far fa-edit"></i></a></li>
                              {{-- @endif --}}
                              {{-- @if(isset($storeBelongs) && $storeBelongs && in_array('category_delete', $canDo)) --}}
                                <li><a class="dropdown-item" data-target-id="{{$recipe_method->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
                              {{-- @endif --}}
                            </ul>
                          </div>
                        </div>
                      <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                          <tbody>
                            <tr>
                              <td>ID No:</td>
                              <td class="font-medium text-dark-medium">{{ $recipe_method->id }}</td>
                            </tr>
                            <tr>
                              <td>Title :</td>
                              <td class="font-medium text-dark-medium">{{ $recipe_method->title }}</td>
                            </tr>
                            <tr>
                              <td>Description:</td>
                              <td class="font-medium text-dark-medium">{{ $recipe_method->description }}</td>
                            </tr>
                            
                            <tr>
                              <td>Date Created:</td>
                              <td class="font-medium text-dark-medium">{{ $recipe_method->created_at->format('d F Y H:i') }}</td>
                            </tr>
                           
                            <tr>
                              <td>Status:</td>
                              <td class="font-medium text-dark-medium">{{ ($recipe_method->active)? 'Active' : 'Suspended'}}</td>
                            </tr>
                            {{-- @if($recipe_method->hasLicensor()) --}}
                              <tr>
                                  <td>Licensor:</td>
                                  <td class="font-medium text-dark-medium">{{ $recipe_method->licensor->name}}</td>
                              </tr>
                            {{-- @endif --}}
                            {{-- @if($recipe_method->hasStore()) --}}
                              <tr>
                                  <td>Store:</td>
                                  <td class="font-medium text-dark-medium">{{ $recipe_method->store->name}}</td>
                              </tr>
                            {{-- @endif --}}
                            {{--  --@if($team->hasProject())
                              <tr>
                                  <td>Project:</td>
                                  <td class="font-medium text-dark-medium">{{ $recipe_method->project->name}}</td>
                              </tr>
                            @endif --}}
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
