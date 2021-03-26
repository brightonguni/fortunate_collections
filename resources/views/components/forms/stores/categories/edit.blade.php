<form class="pt-2" data-async data-target="#edit" id="storeDetailsForm" enctype="multipart/form-data"
    action="/stores/{{$store->id}}" novalidate _lpchecked="1" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="store_id" value="{{ $store->id }}" hidden="hidden">
    <div class="row">
        <div class="col-md-9">
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="name" class="col-form-label s-12">Name *</label>
                    <input id="name" name="name" autofocus placeholder="{{ $store->name }}" value="{{ $store->name }}"
                        maxlength="50" class="form-control r-0 light  @if($errors->first('name')) is-invalid  @endif "
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
                    <label for="description" class="col-form-label s-12">Bio *</label>
                    <textarea style="height: 145px;" required class="textarea form-control  @if($errors->first('description')) is-invalid  @endif r-0" name="description" id="description" cols="10" rows="9"
                              placeholder="{{ $store->description }}">{{ $store->description }}
                    </textarea>
                    @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('description')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6 m-0 pt-3">
                    <label for="email" class="col-form-label s-12 ">Email Address *</label>
                    <input id="email" name="email" placeholder="{{ $store->email }}" value="{{ $store->email }}"
                        maxlength="50"
                        class="form-control r-0 light s-12  @if($errors->first('email')) is-invalid  @endif  " required
                        type="email">
                    @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('email')}}
                    </div>
                    @endif
                </div>
                <div class="form-group col-6 m-0 pt-3">
                    <label for="phone" class="col-form-label s-12 ">Phone Number *</label>
                    <input id="phone" name="phone" placeholder="{{$store->phone}}" value="{{$store->phone}}"
                        maxlength="10"
                        class="form-control r-0 light s-12  @if($errors->first('phone')) is-invalid  @endif" required
                        type="tel">
                    @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('phone')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4 m-0">
                    <label class="my-1 mr-2 pt-3" for="website">Website</label>
                    <input id="website" name="website"
                           placeholder="{{ $store->website }}"
                           value="{{ $store->website }}"
                           maxlength="191"
                           class="form-control r-0 light s-12  @if($errors->first('website')) is-invalid  @endif  "
                           type="text">
                    @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('website')}}
                    </div>
                    @endif
                </div>
                <div class="form-group col-8 m-0">
                    <label class="my-1 mr-2 pt-3" for="address">Address *</label>
                    <input id="address" name="address" placeholder="{{ $store->address }}" value="{{ $store->address }}"
                        maxlength="191"
                        class="form-control r-0 light s-12  @if($errors->first('address')) is-invalid  @endif  "
                        required type="text">
                    @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('address')}}
                    </div>
                    @endif
                </div>
            </div>
            <?php //print_r($store->categories);
                //print_r($store->hours);
              ?>
              <?php $selected_categories = $store->categories;
            ?>
        <div id="All">
          <div class="form-group" style="">
               <span><i>Press Ctrl + Click to select more categories </i></span>

              <select name="categories[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="User roles" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories">
                <?php if (!empty($categories)) {?>
                  @foreach ($categories as $category)
                    @php $selected = false; @endphp

                    @for($i=0; $i < sizeOf($selected_categories); $i++)
                        @if($selected_categories[$i]->id == $category->id)
                          @php $selected = true; @endphp
                        @endif
                    @endfor

                     @if($selected)

                    <option value="{{$category->id}}" selected="selected">{{$category->name}}</option>
                    @else
                    <option value="{{$category->id}}" >{{$category->name}}</option>
                    @endif
                  @endforeach
                  <?php }?>
              </select>
            </div>
          </div>
         <div class="form-row">
          <div class="form-group col-12 m-0 pt-3">
              <label for="hour" class="col-form-label s-12">Trading Hours *</label>
                <?php $selected_hours = $store->hours; ?>
                  <select name="hour[]" class="form-control select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Working Hours"  tabindex="-1" aria-hidden="true" name="hour[]">
                    <?php if (!empty($hours)) {?>
                      @foreach ($hours as $hour)
                        @php $selected = false; @endphp
                        @for($i=0; $i < sizeOf($selected_hours); $i++)
                            @if($selected_hours[$i]->id == $hour->id)
                              @php $selected = true; @endphp
                            @endif
                        @endfor
                      @if($selected)
                      <option value="{{$hour->id}}" selected="selected">{{$hour->name}}</option>
                      @else
                      <option value="{{$hour->id}}">{{$hour->name}}</option>
                      @endif
                      @endforeach
                      <?php }?>
                  </select>
                  @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('hour')}}
                    </div>
                  @endif
                </div>
              </div>

             
            <div class="form-row">
                <div class="form-group col-6 m-0">
                    <label class="my-1 mr-2 pt-3" for="contactPerson">Contact Person *</label>
                    <input id="contactPerson" name="contactPerson" placeholder="{{ $store->contacts->name }}"
                        value="{{ $store->contacts->name }}" maxlength="50"
                        class="form-control r-0 light s-12 @if($errors->first('contactPerson')) is-invalid  @endif "
                        required type="text">
                    @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('contactPerson')}}
                    </div>
                    @endif
                </div>
                <div class="form-group col-6 m-0">
                    <label class="my-1 mr-2 pt-3" for="contactPhone">Contact Telephone *</label>
                    <input id="contactPhone" name="contactPhone" placeholder="{{ $store->contacts->phone }}"
                        value="{{ $store->contacts->phone }}" maxlength="10"
                        class="form-control r-0 light s-12 @if($errors->first('contactPhone')) is-invalid  @endif"
                        required type="tel">
                    @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('contactPhone')}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3 pt-4">
            @error('logo')
            <div class="invalid-feedback">
                {{$message }}
            </div>
            @enderror
            <div class="col-md-12 store-up pl-0">
                <input hidden="" type="file" id="logo" name="logo">
                <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="store-logo-up">
                    <div style="" class="dz-preview dropzone-previews"></div>
                    <div class="dz-default dz-message">
                        <div>Upload Logo Image</div>
                        <div>Click to open file browser</div>
                    </div>
                </div>
                <img style="background-color: #eee" class="text-center"
                    src="{{url('/')}}/images/store/logo/{{$store->logo}}" alt="{{$store->logo}}">

            </div>
            @if($errors->any())
                <div class="invalid-feedback">
                    {{$errors->first('logo')}}
                </div>
            @endif
          </div>
      
          <div class="form-row">
              @if( !isset($store->activate) )
              <div class="form-group col-12 m-0 pt-3 ">
                  <label class="my-1 mr-2" for="active">Publish</label>
                  <div class="material-switch">
                      <input id="active" {{($store->active)? 'checked': '' }} name="active" type="checkbox">
                      <label for="active">Yes</label>
                  </div>
            </div>
          @endif

            @if( isset($store->activate) )
                <div class="form-group col-12 m-0 pt-3 ">
                    <label class="my-1 mr-2" for="active">Activate</label>
                    <div class="material-switch">
                        <input id="active"
                               {{($store->activate)? 'checked': '' }}  name="active"
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
</form>
