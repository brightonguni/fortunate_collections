<form class="pt-2" data-async data-target="#create" id="ProjectForm" enctype="multipart/form-data" action="{{ route('project.store') }}" novalidate
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
            <label for="name" class="col-form-label s-12">Project Name *</label>
            <input id="name" name="name" autofocus value="{{ old('name') }}" maxlength="50"
               class="form-control r-0 light  @if($errors->first('name')) is-invalid  @endif "
               required type="text"
            >
            @if($errors->any())
              <div class="invalid-feedback">
                {{$errors->first('name')}}
              </div>
            @endif
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-12 m-0 pt-3">
            <label for="categories" class="col-form-label s-12"><strong>Categories * </strong><span class="pl-3">a project can have many categories. to select more than one, HOLD shift. if category is not available in the list, first create it</span></label>
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
            <div class="form-group col-12 m-0 pt-3">
              <label for="sub_categories" class="col-form-label s-12"><strong>Sub Categories *</strong><span class="pl-3">a project can have many sub categories. to select more than one, HOLD shift. if sub category is not available in the list, first create it</span></label>
              <select id="sub_categories" class="select2 form-control" name="sub_categories[]" multiple="multiple">
                @foreach($sub_categories as $sub_category)
                  @php
                      $select = false;
                      if ( old('sub_categories') && in_array($sub_category->id, old('sub_categories')) ) {
                          $select = true;
                      }
                  @endphp
                  <option {{($select) ? 'selected' : '' }} value="{{$sub_category->id}}"> {{ $sub_category->title }} </option>
                @endforeach
              </select>
              @if($errors->any())
                <div class="invalid-feedback">
                    {{$errors->first('sub_categories')}}
                </div>
              @endif
            </div>
          </div>

        <div class="form-row">
          <div class="form-group col-12 m-0 pt-3">
            <label for="services" class="col-form-label s-12"><strong>Services *</strong><span class="pl-3">a project can have many services. to select more than one, HOLD shift. if the service is not available in the list, first create it</span></label>
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
            <div class="form-row">
              <div class="form-group col-12 m-0 pt-3">
                <label for="description" class="col-form-label s-12">Description*</label>
                <textarea 
                  style="height: 145px;" name="description" 
                  required class="textarea form-control  
                  @if($errors->first('description')) 
                    is-invalid  
                  @endif r-0" 
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
            <div class="form-row">
                <div class="form-group col-6 m-0 pt-3">
                    <label for="start_date" class="col-form-label s-12 ">Start Date *</label>
                    <input id="start_date" name="start_date" value="{{ old('start_date') }}"
                     class="form-control r-0 light s-12  @if($errors->first('start_date')) is-invalid  @endif"
                     required type="date"
                    >
                    @if($errors->any())
                      <div class="invalid-feedback">
                        {{$errors->first('start_date')}}
                      </div>
                    @endif
                </div>
                <div class="form-group col-6 m-0 pt-3">
                    <label for="end_date" class="col-form-label s-12 ">End Date *</label>
                    <input id="end_date" name="end_date"
                       value="{{ old('end_date') }}"
                       class="form-control r-0 light s-12  @if($errors->first('end_date')) is-invalid  @endif"
                       required type="date"
                    >
                    @if($errors->any())
                        <div class="invalid-feedback">
                            {{$errors->first('end_date')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row mt-1">
              <div class="form-group col-12 m-0">
                <label class="my-1 mr-2 pt-3" for="store_id">Store *</label>
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
            <div class="form-row">
              <div class="form-group col-12 m-0 pt-3 ">
                <label class="my-1 mr-2" for="active">Publish</label>
                <div class="material-switch">
                  <input id="active" name="active" type="checkbox">
                  <label for="active">Yes</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 pt-4">
            <div class="col-md-12 store-up pl-0">
                <input  type="file" id="avatar" name="avatar">
                <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="store-logo-up">
                    <div style="" class="dz-preview dropzone-previews"></div>
                    <div class="dz-default dz-message">
                        <div>Upload Logo Image</div>
                        <div>Click to open file browser</div>
                    </div>
                </div>
                <img hidden style="background-color: #eee" class="text-center" src="#" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
          </div>
        </div>
</form>
