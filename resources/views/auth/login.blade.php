
@extends('layouts.web.login_navbar')
@section('content')
  <div class="row">
    <div class="col-12">
        <div class="row pt-5 mt-5 gutters-20">
          <div class="col-xs-12 col-sm-12 col-lg-5 col-md-5">
            <div class="row  m-2 p-2 pt-5 mt-5">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h2 class="p-0 m-0" style="color: #ffffff !important; font-weight: 700 !important">LogIn</h2>
                    </div>
                      <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                          @csrf
                          <div class="form-group row">
                            <div class="col-md-12">
                              <label 
                                for="email" 
                                class="col-form-label text-md-right"
                              >
                                {{ __('E-Mail Address') }}
                              </label>
                              <input 
                                id="email" 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required autocomplete="email" 
                                autofocus>
                                @error('email')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-12">
                                <label 
                                  for="password" 
                                  class="col-form-label text-md-right"
                                >
                                  {{ __('Password') }}
                                </label>
                                <input 
                                  id="password" 
                                  type="password" 
                                  class="form-control @error('password') is-invalid @enderror" 
                                  name="password" 
                                  required 
                                  autocomplete="current-password"
                                >
                                @error('password')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-12">
                                <div class="form-check">
                                  <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    name="remember" 
                                    id="remember" {{ old('remember') ? 'checked' : '' }}
                                  >
                                  <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                  </label>
                                </div>
                              </div>
                            </div>
                              <div class="form-group row mb-0">
                                <div class="col-md-12">
                                  <button type="submit" class="btn btn-md btn-block btn-gradient-yellow">
                                      {{ __('Login') }}
                                  </button>
                                  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                  @endif
                                </div>
                              </div>
                              <div class="form-group row mb-0">
                                <div class="col-md-12 text-align-center">
                                    <a class="btn btn-md fw-btn-fill btn-block" href="{{ route('register') }}">
                                      Create an Account
                                    </a>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <div class="row pt-5 mt-5">
                      <div class="col-xs-12 pt-5 mt-5 text-left">
                        {{-- <h2 class="pl-5 pb-0 pt-5 mb-0 text-capitalize" style="color: #ffffff !important; font-weight: 900 !important; font-size: 30px;">Nomi Cleaning Services</h2>
                        <p class="pl-5 pr-5" style="color: #fff; font-weight: 400; font-size: 18px;">{{ 'One stop cleaning Solutions for both domestic and commercial' 
                            }}
                        </p> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        @endsection
