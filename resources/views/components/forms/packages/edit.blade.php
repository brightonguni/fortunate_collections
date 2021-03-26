

<div class="card">
  <div class="card-header">New Package</div>
    <div class="card-body">
      <form class="pt-2"  id="editPackegeForm" action="{{route('package_category.update',['id' => $package_category->id])}}"  method="POST" enctype="multipart/form-data">
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
        <input type="text" name="package_category_id" value="{{ $package_category_id->id }}" hidden="hidden">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-row">
              <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12  package-category-avatar pl-0">
                <input  type="file" id="service-avatar" name="avatar">
                <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="service-avatar">
                  <div style="" class="dz-preview dropzone-previews"></div>
                  <div class="dz-default dz-message">
                    <div>Upload Package category Image</div>
                    <div>Click to open file browser</div>
                  </div>
                </div>
                <img style="background-color: #eee" class="text-center" src="{{ URL::asset('assets/images/packages/category/'.$package_category->avatar) }}" />
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div class="row">
              <div class="col-md-12">
                <div class="form-row">
                  <div class="form-group col-12 m-0 pt-3">
                    <label for="title"  class="col-form-label s-12">
                      Package Title
                    </label>
                    <input id="title" name="title" autofocus placeholder="{{ $package_category->title }}"
                      value="{{ $package_category->title }}" maxlength="191"  
                      required type="text"class="form-control 
                      r-0 light s-12  
                      @if($errors->first('title')) 
                        is-invalid  @endif"
                      >
                      @if($errors->any())
                        <div class="invalid-feedback">
                          {{$errors->first('title')}}
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-12 m-0 pt-3">
                      <label for="package_categories" class="col-form-label s-12"><strong>Package Categories *</strong><span class="pl-3">a package can have many services. to select more than one, HOLD shift. if service is not available in the list, first create it</span></label>
                      <select id="package_categories" class="select2 form-control" name="package_categories[]" multiple="multiple">
                        @foreach($package_categories as $category)
                          @php
                              $select = false;
                              if ( old('package_categories') && in_array($category->id, old('package_categories')) ) {
                                  $select = true;
                              }
                          @endphp
                          <option {{($select) ? 'selected' : '' }} value="{{$category->id}}"> {{ $category->title }} </option>
                        @endforeach
                      </select>
                      @if($errors->any())
                          <div class="invalid-feedback">
                              {{$errors->first('package_categories')}}
                          </div>
                      @endif
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-12 m-0 pt-3">
                      <label for="services" class="col-form-label s-12"><strong>Services *</strong><span class="pl-3">a package can have many services. to select more than one, HOLD shift. if service is not available in the list, first create it</span></label>
                      <select id="services" class="select2 form-control" name="services[]" multiple="multiple">
                        @foreach($services as $service)
                          @php
                              $select = false;
                              if ( old('services') && in_array($service->id, old('services')) ) {
                                  $select = true;
                              }
                          @endphp
                          <option {{($select) ? 'selected' : '' }} value="{{$service->id}}"> {{ $service->title }} </option>
                        @endforeach
                      </select>
                      @if($errors->any())
                          <div class="invalid-feedback">
                              {{$errors->first('services')}}
                          </div>
                      @endif
                    </div>
                  </div>

                  <div class="form-row mt-1">
                    <div class="form-group col-12 m-0">
                      <label class="my-1 mr-2 pt-3" for="licensor_id">Licensor *</label>
                      <select name="licensor_id" required class="select2 my-1  form-control r-0 light " id="licensor_id">
                        @foreach($licensors as $id => $name)
                          <option value="{{$id}}">{{ $name }}</option>
                        @endforeach
                      </select>
                      @error('licensor_id')
                        <div class="invalid-feedback">
                            {{$message }}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-row mt-1">
                    <div class="form-group col-12 m-0">
                        <label class="my-1 mr-2 pt-3" for="licensor_id">Store *</label>
                        <select name="store_id" required class="select2 my-1  form-control r-0 light " id="store_id">
                          @foreach($stores as $id => $name)
                            <option value="{{$id}}">{{ $name }}</option>
                          @endforeach
                        </select>
                        @error('store_id')
                          <div class="invalid-feedback">
                              {{$message }}
                          </div>
                        @enderror
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-12 m-0 pt-3">
                        <label for="description" class="col-form-label s-12">Description *</label>
                        <textarea style="height: 145px;" required class="textarea form-control 
                           @if($errors->first('description')) 
                            is-invalid  
                          @endif r-0" 
                          name="description" id="summary-ckeditor"
                          cols="10" rows="9"
                        >{{ $package->description }}</textarea>
                        @if($errors->any())
                          <div class="invalid-feedback">
                              {{$errors->first('description')}}
                          </div>
                        @endif
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-12 m-0 pt-3 ">
                      <label class="my-1 mr-2" for="active">
                        Publish
                      </label>
                      <div class="material-switch">
                        <input id="active" name="active" type="checkbox">
                        <label for="active">Yes</label>
                      </div>
                    </div>
                  </div>
               
                  <div class="row">
                    <div class="col-12">
                      <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">
                        Save
                      </button>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>


  

      