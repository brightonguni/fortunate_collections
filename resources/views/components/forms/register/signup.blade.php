


    <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
        
            <div class="form-group  {{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="form_labels_new">Name and Surname</label>
                <input id="name"  placeholder="Name and Surname" type="text" class="form-control" name="name" value="{{ old('name') }}" required="required" >

                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group  {{ $errors->has('email') ? ' has-error' : '' }}">      <label class="form_labels_new">Email Address
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>   {{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </label>
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required="required">
                </div>

            <div class="form-group pass_show   {{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="form_labels_new">Password
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </label>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required="required" >
            </div>
            {{-- <div class="col-xs-6 col-md-6 form-group">
                {!! Recaptcha::render() !!}
            </div> --}}
        
        <div class="startup-register-url text-center">
            <button class="btn btn-success btn-lg" type="submit">
                Create Account
            </button>
        </div>

    </form>
                    
                
                