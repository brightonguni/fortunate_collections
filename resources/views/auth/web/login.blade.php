@extends('layouts.web.login_navbar')
@section('content')
  @foreach($services->take(1)  as $service)
      <div class="row justify-content-center gutters-20">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
          <div class="card">
            <div class="card-heading">
              <h2 class="card-title">LogIn</h2>
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
                        <button type="submit" class="btn btn-md btn-block btn-primary">
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
                          <a class="btn btn-md btn-default btn-block" href="{{ route('register') }}">Create an Account</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
              @foreach($stores->take(1) as $store)
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3 class="welcome-title">{{ $store->store->name }}</h3>
                    <p class="brief-introduction-from-about-us">{{ str_limit($store->store->bio,'300') }}</p>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
  @endforeach
@endsection
