
<div class="row gutters-20">
  <div class="col-md-12">
    <div class="card ui-tab-card">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
          <div class="card-body">
            <form class="pt-2"  id="createServicPageForm" action="{{route('service_page.store')}}"  method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-md-3 pt-4">
                <div class="col-md-12 service-avatar pl-0">
                  <input hidden="" type="file" id="service-avatar" name="service_avatar">
                  <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="service-avatar">
                    <div style="" class="dz-preview dropzone-previews"></div>
                    <div class="dz-default dz-message">
                      <div>Upload service Image</div>
                      <div>Click to open file browser</div>
                    </div>
                  </div>
                  <img hidden style="background-color: #eee" class="text-center" src="#" />
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-row">
                    <div class="form-group col-12 m-0 pt-3">
                      <label for="title"  class="col-form-label s-12">
                        Title
                      </label>
                      <input id="title" name="title" autofocus 
                        placeholder="Title"
                        value="{{ old('title') }}" 
                        maxlength="191"  
                        required type="text"
                        class="form-control 
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
                      >{{ old('description') }}</textarea>
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
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">
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

  
  
      