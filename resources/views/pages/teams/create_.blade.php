
@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
      <h3>Teams</h3>
      <ul>
          <li>
              <a href="{{route('teams.index')}}">Home</a>
          </li>
          <li>Create Team</li>
      </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- Product Table Area Start Here -->
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-4">
            <a href="javascript:history.back()" 
              class="mt-2 float-right">
              <i class="fas fa-chevron-circle-left" 
                style="font-size: 25px;"
              >
              </i>
            </a>
            <h5 class="card-title mt-1">Create Team</h5>
        </div>
      </div>
    </div>
  </div>
  @component('components.modals.alert')
      Alert Component
  @endcomponent
  <div 
    class="row gutters-20"
  >
    <div 
      class="col-md-12"
    >
      <div 
        class="card ui-tab-card"
      >
        <div 
          class="tab-content"
        >
          <div 
            class="tab-pane fade show active" 
            id="tab1" 
            role="tabpanel"
          >
            <div 
              class="card-body"
            >
              <form 
                class="pt-2"  
                id="createTeamForm" 
                action="{{route('teams.store')}}"  
                method="POST"
              >
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-row">
                      <div class="form-group col-12 m-0 pt-3">
                        <label 
                          for="name"  
                          class="col-form-label s-12"
                        >
                          Team Name
                        </label>
                        <input 
                          id="name" 
                          name="name" 
                          autofocus 
                          placeholder="Enter Team name"
                          value="{{ old('name') }}" 
                          maxlength="191"  
                          required type="text"
                          class="form-control 
                          r-0 light s-12  
                          @if($errors->first('name')) 
                            is-invalid  @endif"
                          >
                          @if($errors->any())
                            <div class="invalid-feedback">
                              {{$errors->first('name')}}
                            </div>
                          @endif
                        </div>
                      </div>
                      <div 
                        class="form-row"
                      >
                        <div 
                          class="form-group col-12 m-0 pt-3"
                        >
                          <label 
                            for="password" 
                            class="col-form-label s-12"
                          >
                            Password
                          </label>
                          <input 
                            id="password" 
                            name="password" 
                            placeholder="Please enter your password"
                            value="{{ old('password') }}" 
                            minlength="6" 
                            required type="password"
                            class="form-control r-0 light s-12  
                            @if($errors->first('password')) 
                            is-invalid  
                            @endif"
                          >
                          @if($errors->any())
                              <div class="invalid-feedback">
                                  {{$errors->first('password')}}
                              </div>
                          @endif
                        </div>
                      </div>
                    
                    <div class="form-row mt-1">
                      <div class="form-group col-12 m-0 pt-3">
                        <label 
                          for="store_id" 
                          class="col-form-label s-12"
                        >
                          Store/Business
                        </label>
                        <select 
                          name="store_id" 
                          required 
                          class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" 
                          id="store_id"
                        >
                          @foreach($stores as $store)
                            <option value="{{$store->id}}">{{ $store->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-row mt-1">
                      <div class="form-group col-12 m-0 pt-3">
                        <label 
                          for="licensor_id" 
                          class="col-form-label s-12"
                        >
                          Project
                        </label>
                        <select 
                          name="project_id" 
                          required 
                          class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" 
                          id="project_id"
                        >
                          @foreach($projects as $project)
                            <option value="{{$project->id}}">{{ $project->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-row mt-1">
                      <div class="form-group col-12 m-0 pt-3">
                        <label 
                          for="licensor_id" 
                          class="col-form-label s-12"
                        >
                          Licensor
                        </label>
                        <select 
                          name="licensor_id" 
                          required 
                          class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" 
                          id="licensor_id"
                        >
                          @foreach($licensors as $licensor)
                            <option value="{{$licensor->id}}">{{ $licensor->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-12 m-0 pt-3 ">
                        <label 
                          class="my-1 mr-2" 
                          for="active"
                        >
                          Publish
                        </label>
                        <div class="material-switch">
                          <input 
                            id="active" 
                            name="active" 
                            type="checkbox"
                          >
                          <label for="active">Yes</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                    <div class="row">
                      <div class="col-12">
                        <button 
                          type="submit" 
                          class="float-right 
                          btn-fill-lg 
                          btn-gradient-yellow 
                          btn-hover-bluedark"
                        >
                          Save
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endsection
