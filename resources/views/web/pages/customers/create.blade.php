
@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
      <h3>User</h3>
      <ul class="gradient-dodger-blue">
          <li>
              <a href="{{route('users.index')}}">Home</a>
          </li>
          <li>Create User</li>
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
            <h5 class="card-title mt-1">Create User</h5>
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
                id="createUserProfileForm" 
                action="{{route('users.store')}}"  
                method="POST"
              >
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-row">
                      <div class="form-group col-12 m-0 pt-3">
                        <label 
                          for="email"  
                          class="col-form-label s-12"
                        >
                          Email
                        </label>
                        <input 
                          id="email" 
                          name="email" 
                          autofocus 
                          placeholder="Enter Email Address"
                          value="{{ old('email') }}" 
                          maxlength="191"  
                          required type="email"
                          class="form-control 
                          r-0 light s-12  
                          @if($errors->first('email')) 
                            is-invalid  @endif"
                          >
                          @if($errors->any())
                            <div class="invalid-feedback">
                              {{$errors->first('email')}}
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
                      <div class="form-row">
                        <div class="form-group col-6 m-0 pt-3">
                          <label 
                            for="first_name" 
                            class="col-form-label s-12"
                          >
                            First Name
                          </label>
                          <input 
                            id="first_name" 
                            name="first_name" 
                            placeholder="Enter First Name"
                            value="{{ old('first_name') }}" 
                            maxlength="50" required type="text"
                            class="form-control r-0 light s-12  
                            @if($errors->first('first_name')) 
                              is-invalid  
                            @endif"
                            >
                            @if($errors->any())
                                <div class="invalid-feedback">
                                    {{$errors->first('first_name')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-6 m-0 pt-3">
                          <label 
                            for="last_name" 
                            class="col-form-label s-12 "
                          >
                            Last Name
                          </label>
                          <input 
                            id="last_name" 
                            name="last_name" 
                            placeholder="Enter Last Name" 
                            value="{{ old('last_name')}}"
                            maxlength="50" 
                            required 
                            type="text"
                            class="form-control r-0 light s-12 
                            @if($errors->first('last_name')) '
                              is-invalid'  
                            @endif"
                          >
                          @if($errors->any())
                            <div class="invalid-feedback">
                                {{$errors->first('last_name')}}
                            </div>
                          @endif
                        </div>
                      </div>
                      <div class="form-row mt-1">
                        <div class="form-group col-6 m-0 pt-3">
                          <label 
                            for="phone" 
                            class="col-form-label s-12"
                          >
                            Phone Number
                          </label>
                          <input 
                            id="phone" 
                            placeholder=" Enter Phone Number"
                            value="{{ old('phone')}}"  
                            name="phone" 
                            maxlength="10"
                            class="form-control r-0 light s-12  
                            @if($errors->first('phone')) 
                              'is-invalid'  
                            @endif"
                            type="tel"
                          >
                          @if($errors->any())
                            <div class="invalid-feedback">
                                {{$errors->first('phone')}}
                            </div>
                          @endif
                        </div>
                        <div class="form-group col-6 m-0 pt-3">
                          <label 
                            class="my-1 mr-2" 
                            for="role_id"
                          >
                            Role 
                          </label>
                          <select 
                            required 
                            name="role_id" 
                            class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" 
                            id="role_id"
                          >
                            @foreach($roles as $role)
                              <option value="{{$role->id}}">{{ $role->name }}</option>
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
