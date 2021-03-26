@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>recipe</h3>
    <ul>
      <li>
        <a href="{{ route('recipe.index') }}">Home</a>
      </li>
      <li>recipe Details</li>
    </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- User Table Area Start Here -->
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-0">
          <div class="border-nav-tab">
              @if( in_array('recipe_update', $canDo) )
                <li class="nav-item">
                  <a class="nav-link" 
                    href="{{ route('recipe.edit', ['id' => $recipe->id ]) }}"  
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
                        <h3>About recipe</h3>
                      </div>
                    </div>
                    <div class="single-info-details">
                      <div class="item-img">
                        <div class="card-image-small" style="background-image: url('{{ asset('assets/images/recipes/'.$recipe->avatar)}}');"></div> 
                        <img style="" 
                            src="{{asset('assets/images/recipes/'.$recipe->avatar)}}" 
                            alt="no recipe image" 
                      </div>
                      <div class="item-content">
                        <div class="header-inline item-header">
                          <h3 class="text-dark-medium font-medium">{{ $recipe->title }}</h3>
                          <div class="header-elements">
                            <ul>
                              {{-- @if(isset($storeBelongs) && $storeBelongs && in_array('recipe_update', $canDo)) --}}
                                <li><a href="{{ $recipe->id }}/edit"><i class="far fa-edit"></i></a></li>
                              {{-- @endif --}}
                              {{-- @if(isset($storeBelongs) && $storeBelongs && in_array('recipe_delete', $canDo)) --}}
                                <li><a class="dropdown-item" data-target-id="{{$recipe->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
                              {{-- @endif --}}
                            </ul>
                          </div>
                        </div>
                      <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                          <tbody>
                            <tr>
                              <td>ID No:</td>
                              <td class="font-medium text-dark-medium">{{ $recipe->id }}</td>
                            </tr>
                            <tr>
                              <td>recipe Title :</td>
                              <td class="font-medium text-dark-medium">{{ $recipe->title }}</td>
                            </tr>
                            <tr>
                              <td>Category</td>
                              <td class="btn btn-sm btn-outline-dark btn-sm p-1 m-1">{{  $recipe->category->title}}</td>
                            </tr>
                             <tr>
                              <td>Ingredients</td>
                              <td>
                                @foreach($recipe->ingredients as $ingredient)
                                  <ul class="list-unstyled">
                                    <li class="fa fa-gear"><span class="ml-2">{{ str_limit($ingredient->description,'50') }}</span></li>
                                  </ul>
                                @endforeach
                              </td>
                            </tr>
                            <tr>
                              <td>Methods</td>
                              <td>
                                @foreach($recipe->methods as $method)
                                  <ul class="list-unstyled">
                                    <li class="fa fa-folder-o"><span class="ml-2">{{ str_limit($method->description,'50') }}</span></li>
                                  </ul>
                                @endforeach
                              </td>
                            </tr>
                            <tr>
                              <td>Date Created:</td>
                              <td class="font-medium text-dark-medium">{{ $recipe->created_at->format('d F Y H:i') }}</td>
                            </tr>
                            <tr>
                              <td>Status:</td>
                              <td class="font-medium text-dark-medium">{{ ($recipe->active)? 'Active' : 'Suspended'}}</td>
                            </tr>
                            {{-- @if($recipe->hasLicensor())
                              <tr>
                                  <td>Licensor:</td>
                                  <td class="font-medium text-dark-medium">{{ $recipe->licensor->name}}</td>
                              </tr>
                            @endif
                            @if($recipe->hasStore())
                              <tr>
                                  <td>Store:</td>
                                  <td class="font-medium text-dark-medium">{{ $recipe->store->name}}</td>
                              </tr>
                            @endif
                            @if($team->hasProject())
                              <tr>
                                  <td>Project:</td>
                                  <td class="font-medium text-dark-medium">{{ $trecipe->project->name}}</td>
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
