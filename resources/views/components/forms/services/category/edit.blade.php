
<div class="card height-auto" id="index-card">
  <div class="card-body">
    <form class="pt-2"  id="editServiceCategoryForm" action="{{route('service_category.update',['id' =>$service_category->id])}}"  
      method="POST" enctype="multipart/form-data" novalidate _lpchecked="1">
      @csrf
      <input type="text" name="service_category_id" value="{{ $service_category->id }}" hidden="hidden">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pt-4">
          {{-- <div class="col-md-12 service-avatar pl-0"> --}}
            <input  type="file" id="avatar" name="avatar" value="{{ $service_category->avatar }}">
            <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="service-avatar">
              <div style="" class="dz-preview dropzone-previews"></div>
              <div class="dz-default dz-message">
                <div>Upload service Image</div>
                <div>Click to open file browser</div>
              </div>
            </div>
            <img  style="background-color: #eee" class="text-center" src="{{ URL::asset('assets/images/services/category/'.$service_category->avatar) }}" />
          {{-- </div> --}}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="title"  class="col-form-label s-12">
                 Title :
              </label>
              <input id="title" name="title" autofocus placeholder=" value="{{ $service_category->title }}""
                 value="{{ $service_category->title }}"  maxlength="191"  required type="text"
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
              <label class="my-1 mr-2 pt-3" for="licensor_id">Licensor * <span class="ml-3"> {{ $service_category->licensor->name }}</span></label>
              <select name="licensor_id" required class="select2 my-1  form-control r-0 light " id="licensor_id">
                <option value="{{ $service_category->licensor->name }}">{{ $service_category->licensor->name }}</option>
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
                <label class="my-1 mr-2 pt-3" for="licensor_id">Store * <span class="ml-3"> {{ $service_category->store->name }}</span></label>
                <select name="store_id" required class="select2 my-1  form-control r-0 light " id="store_id">
                   <option value="{{ $service_category->store->name }}">{{ $service_category->store->name }}</option> 
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
                >{{ $service_category->description }}</textarea>
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


     





    