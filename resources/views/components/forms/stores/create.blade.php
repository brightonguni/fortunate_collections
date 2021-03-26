<form class="pt-2" data-async data-target="#edit" id="storeForm" enctype="multipart/form-data" action="{{ route('store.store') }}" novalidate
      _lpchecked="1" method="POST">
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
    <div class="row">
        <div class="col-md-9">
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="name" class="col-form-label s-12">Name *</label>
                    <input id="name" name="name" autofocus value="{{ old('name') }}" maxlength="50"
                           class="form-control r-0 light  @if($errors->first('name')) is-invalid  @endif "
                           required type="text">
                    @if($errors->any())
                        <div class="invalid-feedback">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="email" class="col-form-label s-12 ">Email Address *</label>
                    <input id="email" name="email"
                           value="{{ old('email') }}"
                           maxlength="50"
                           class="form-control r-0 light s-12  @if($errors->first('email')) is-invalid  @endif  "
                           required type="email">
                    @if($errors->any())
                        <div class="invalid-feedback">
                            {{$errors->first('email')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="phone" class="col-form-label s-12 ">Phone Number *</label>
                    <input id="phone" name="phone"
                           value="{{ old('phone') }}"
                           maxlength="10"
                           class="form-control r-0 light s-12  @if($errors->first('phone')) is-invalid  @endif"
                           required type="tel">
                    @if($errors->any())
                        <div class="invalid-feedback">
                            {{$errors->first('phone')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 m-0">
                    <label class="my-1 mr-2 pt-3" for="website">Website</label>
                    <input id="website" name="website"
                           value="{{ old('website') }}"
                           maxlength="191"
                           class="form-control r-0 light s-12  @if($errors->first('website')) is-invalid  @endif  "
                           type="text">
                    @if($errors->any())
                        <div class="invalid-feedback">
                            {{$errors->first('website')}}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="categories" class="col-form-label s-12">Category *</label>
                    <select id="categories" class="select2 form-control" name="categories[]" multiple="multiple">
                        @foreach($categories as $category)

                            @php
                                $select = false;
                                if ( old('categories') && in_array($category->id, old('categories')) ) {
                                    $select = true;
                                }
                            @endphp


                            <option {{($select) ? 'selected' : '' }} value="{{$category->id}}"> {{ $category->title }} </option>
                        @endforeach
                    </select>
                    @if($errors->any())
                        <div class="invalid-feedback">
                            {{$errors->first('categories')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-8 m-0 pt-3">
                    <label for="hours" class="col-form-label s-12">Trading Hours *</label>
                    <select id="hours" class="select2  form-control @if($errors->first('hours')) is-invalid  @endif" name="hours[]" multiple="multiple" >
                        @foreach($hours as $hour)
                            @php
                                $select = false;
                                if ( old('hour') && in_array($hour->id, old('hour')) ) {
                                    $select = true;
                                }
                            @endphp

                            <option {{($select) ? 'selected' : '' }} value="{{$hour->id}}"> {{ $hour->name }} </option>
                        @endforeach
                    </select>
                    @if($errors->any())
                        <div class="invalid-feedback">
                            {{$errors->first('hour')}}
                        </div>
                    @endif
                </div>
            </div>
            {{-- <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="addresses" class="col-form-label s-12">Address *</label>
                    <select id="addresses" class="select2 form-control" name="addresses[]" multiple="multiple">
                        @foreach($addresses as $address)
                            @php
                                $select = false;
                                if ( old('addresses') && in_array($address->id, old('addresses')) ) {
                                    $select = true;
                                }
                            @endphp
                            <option {{($select) ? 'selected' : '' }} value="{{$address->id}}"> {{ $address->street }} </option>
                        @endforeach
                    </select>
                    @if($errors->any())
                        <div class="invalid-feedback">
                            {{$errors->first('addresses')}}
                        </div>
                    @endif
                </div>
            </div> --}}
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="description" class="col-form-label s-12">About Store *</label>
                    <textarea 
                      style="height: 145px;" 
                      required class="textarea form-control  
                      @if($errors->first('description')) 
                        is-invalid  
                      @endif r-0" 
                      name="description" 
                      id="summary-ckeditor" 
                      cols="10" 
                      rows="9"
                    >
                      {{ old('description') }}
                    </textarea>
                    @if($errors->any())
                        <div class="invalid-feedback">
                            {{$errors->first('description')}}
                        </div>
                    @endif
                </div>
            </div>
           
        </div>
        <div class="col-md-3 pt-4">
          <div class="form-row">
            <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12  service-avatar pl-0">
              <input  type="file" id="store-logo" name="logo">
              <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="store-logo">
                <div style="" class="dz-preview dropzone-previews"></div>
                <div class="dz-default dz-message">
                  <div>Upload logo Image</div>
                  <div>Click to open file browser</div>
                </div>
              </div>
              <img hidden style="background-color: #eee" class="text-center" src="#" />
            </div>
          </div>
          <div class="form-row">
            <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12  service-avatar pl-0">
              <input  type="file" id="store-avatar" name="avatar">
              <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="service-avatar">
                <div style="" class="dz-preview dropzone-previews"></div>
                <div class="dz-default dz-message">
                  <div>Upload store Image</div>
                  <div>Click to open file browser</div>
                </div>
              </div>
              <img hidden style="background-color: #eee" class="text-center" src="#" />
            </div>
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 m-0 pt-3 ">
                <label class="my-1 mr-2" for="active">{{ ( $isAdmin ) ? 'Publish' : 'Activate' }} </label>
                <div class="material-switch">
                    <input id="active" name="active"
                           type="checkbox">
                    <label for="active" >Yes</label>
                </div>
            </div>
        </div>
      </div>
      <div class="row">
          <div class="col-12">
              <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
          </div>
      </div>
  </form>
<?php
    function pin_generate($chars)
    {
    $data = '1234567890';
    return substr(str_shuffle($data), 0, $chars);
    }

?>
