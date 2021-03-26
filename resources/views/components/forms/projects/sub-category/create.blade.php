
<div class="card height-auto" id="index-card">
  <div class="card-body">
    <form class="pt-2"  id="createProjectSubCategoryForm" action="{{route('project_sub_category.store')}}"  method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pt-4">
          {{-- <div class="col-md-12 service-avatar pl-0"> --}}
            <input  type="file" id="avatar" name="avatar">
            <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="service-avatar">
              <div style="" class="dz-preview dropzone-previews"></div>
              <div class="dz-default dz-message">
                <div>Upload Category Image</div>
                <div>Click to open file browser</div>
              </div>
            </div>
            <img hidden style="background-color: #eee" class="text-center" src="#" />
          {{-- </div> --}}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="title"  class="col-form-label s-12">
                 Title
              </label>
              <input id="title" name="title" autofocus placeholder="Title"
                value="{{ old('title') }}" maxlength="191"  required type="text"
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
              <label class="my-1 mr-2 pt-3" for="category_id">Category *</label>
              <select name="category_id" required class="select2 my-1  form-control r-0 light " id="category_id">
                @foreach($categories as $id => $name)
                  <option value="{{$id}}">{{ $name }}</option>
                @endforeach
              </select>
              @error('category_id')
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
                  name="description" id="summary-ckeditor"cols="10" rows="9"
                >{{ old('description') }}</textarea>
                @if($errors->any())
                    <div class="invalid-feedback">{{$errors->first('description')}}</div>
                @endif
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
        
          <div class="row">
            <div class="col-12">
              <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">
                Save
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>