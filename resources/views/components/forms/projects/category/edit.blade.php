
<div class="card height-auto" id="index-card">
  <div class="card-body">
    <form class="pt-2"  data-async data-target="#edit"  id="editprojectCategoryForm" 
      action="{{route('project_category.update',['id' => $project_category->id])}}"  
      method="POST" enctype="multipart/form-data" novalidate_lpchecked="1"
    >
      @csrf 
      <input name="_method" type="hidden" value="PUT" />
      <input type="text" name="project_category_id" value="{{ $project_category->id }}" hidden="hidden">
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
            <div class="category-image"><img src="{{ URL::asset('assets/images/projects/category/'. $project_category->avatar )}}"></div>
          {{-- </div> --}}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="title"  class="col-form-label s-12">
                 Title
              </label>
              <input id="title" name="title" autofocus placeholder="{{ $project_category->title}}"
                value="{{ $project_category->title}}" maxlength="191"  required type="text"
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
                <textarea style="height: 145px;" required class="textarea form-control 
                   @if($errors->first('description')) 
                    is-invalid  
                  @endif r-0" 
                  name="description" id="summary-ckeditor"cols="10" rows="9"
                >{{ $project_category->description }}</textarea>
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