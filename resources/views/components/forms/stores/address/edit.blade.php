
<form class="pt-2" data-async data-target="#edit" id="StoreAddressDetailsForm" enctype="multipart/form-data"
    action="/store-address/{{$address->id}}" novalidate _lpchecked="1" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <input type="text" name="address_id" value="{{ $address->id }}" hidden="hidden">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="name" class="col-form-label s-12">street *</label>
                    <input id="street" name="street" autofocus placeholder="{{ $address->street }}" value="{{ $address->street }}"
                        maxlength="50" class="form-control r-0 light  @if($errors->first('street')) is-invalid  @endif "
                        required type="text">
                    @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('street')}}
                    </div>
                    @endif
                </div>
              </div>
           <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="suburb"  class="col-form-label s-12">
                Suburb
              </label>
              <input id="suburb" name="suburb" autofocus 
                placeholder="{{ $address->suburb }}"
                value="{{ $address->suburb }}" 
                maxlength="191"  
                required type="text"
                class="form-control 
                r-0 light s-12  
                @if($errors->first('suburb')) 
                  is-invalid  @endif"
                >
                @if($errors->any())
                  <div class="invalid-feedback">
                    {{$errors->first('suburb')}}
                  </div>
                @endif
              </div>
          </div>

           <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="postal_code"  class="col-form-label s-12">
                Postal Code
              </label>
              <input id="postal_code" name="postal_code" 
                autofocus 
                placeholder="{{ $address->postal_code }}"
                value="{{ $address->postal_code }}" 
                maxlength="191"  
                required type="text"
                class="form-control 
                r-0 light s-12  
                @if($errors->first('postal_code')) 
                  is-invalid  @endif"
                >
                @if($errors->any())
                  <div class="invalid-feedback">
                    {{$errors->first('postal_code')}}
                  </div>
                @endif
              </div>
          </div>

           <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="city"  class="col-form-label s-12">
                city
              </label>
              <input id="city" name="city" autofocus 
                placeholder="{{ $address->city }}"
                value="{{ $address->city }}" 
                maxlength="191"  
                required type="text"
                class="form-control 
                r-0 light s-12  
                @if($errors->first('city')) 
                  is-invalid  @endif"
                >
                @if($errors->any())
                  <div class="invalid-feedback">
                    {{$errors->first('city')}}
                  </div>
                @endif
              </div>
            </div>

           <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="state_province"  class="col-form-label s-12">
                State / Provicence
              </label>
              <input id="state_province" 
                name="state_province" 
                autofocus 
                placeholder="{{ $address->state_province }}"
                value="{{  $address->state_province }}" 
                maxlength="191"  
                required type="text"
                class="form-control 
                r-0 light s-12  
                @if($errors->first('state_province')) 
                  is-invalid  @endif"
                >
                @if($errors->any())
                  <div class="invalid-feedback">
                    {{$errors->first('state_province')}}
                  </div>
                @endif
              </div>
            </div>

           <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="country"  class="col-form-label s-12">
                country
              </label>
              <input id="country" name="country" autofocus 
                placeholder="{{ $address->country }}"
                value="{{ $address->country }}" 
                maxlength="191"  
                required type="text"
                class="form-control 
                r-0 light s-12  
                @if($errors->first('country')) 
                  is-invalid  @endif"
                >
                @if($errors->any())
                  <div class="invalid-feedback">
                    {{$errors->first('country')}}
                  </div>
                @endif
              </div>
            </div>
          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
                <label for="description" class="col-form-label s-12">Description *</label>
                <textarea style="height: 145px;" required class="textarea form-control  @if($errors->first('description')) is-invalid  @endif r-0" name="description" id="description" cols="10" rows="9"
                          placeholder="{{ $address->description }}">{{ $address->description }}
                </textarea>
                @if($errors->any())
                <div class="invalid-feedback">
                    {{$errors->first('description')}}
                </div>
                @endif
            </div>
          </div>

           <div class="form-row">
              @if( !isset($address->activate) )
              <div class="form-group col-12 m-0 pt-3 ">
                  <label class="my-1 mr-2" for="active">Publish</label>
                  <div class="material-switch">
                      <input id="active" {{($address->active)? 'checked': '' }} name="active" type="checkbox">
                      <label for="active">Yes</label>
                  </div>
            </div>
          @endif

            @if( isset($address->activate) )
                <div class="form-group col-12 m-0 pt-3 ">
                    <label class="my-1 mr-2" for="active">Activate</label>
                    <div class="material-switch">
                        <input id="active"
                               {{($address->activate)? 'checked': '' }}  name="active"
                               type="checkbox">
                        <label for="active" >Yes</label>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
          <div class="col-12">
              <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
          </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
      <div class="address text-right">
        <h3 class="p-0 m-0">{{ $address->store->name }}</h3>
        <p class="p-0 m-0">{{ $address->street }}</p>
        <p class="p-0 m-0">{{ $address->suburb }}</p>
        <p class="p-0 m-0">{{ $address->city }}</p>
        <p class="p-0 m-0">{{ $address->postal_code }}</p>
        <p class="p-0 m-0">{{ $address->state_province }}</p>
        <p class="p-0 m-0">{{ $address->country }}</p>
        <p class="p-0 m-0">{{ $address->active }}</p>
      </div>
      <div class="address-description text-left">
        <h3>Summary</h3>
        <p class="p-0 m-0">{{ $address->description }}</p>
      </div>

    </div>
</form>
