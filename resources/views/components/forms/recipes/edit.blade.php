

    <div class="card">
      <div class="card-header">Update Recipe Details</div>
        <div class="card-body">
          <form class="pt-2"  id="editRecipeForm" action="{{route('recipe.update',['id' => $recipe->id])}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="recipe_id" hidden="hidden" value="{{ $recipe->id }}">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="form-row">
                  <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12  recipe-avatar pl-0">
                    <input  type="file" id="recipe-avatar" name="avatar" value="{{ $recipe->avatar }}">
                    <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="recipe-avatar">
                      <div style="" class="dz-preview dropzone-previews"></div>
                      <div class="dz-default dz-message">
                        <div>Upload recipe Image</div>
                        <div>Click to open file browser</div>
                      </div>
                    </div>
                     <img  style="background-color: #eee" class="text-center" src="{{ URL::asset('assets/images/recipes/'.$recipe->avatar) }}" />
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-row">
                      <div class="form-group col-12 m-0 pt-3">
                        <label for="title"  class="col-form-label s-12">
                          recipe Title
                        </label>
                        <input id="title" name="title" autofocus placeholder="{{ $recipe->title }}"
                          value="{{ $recipe->title }}" maxlength="191"  
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
                          <label for="categories" class="col-form-label s-12">Categories *</label>
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
                      <div class="form-row mt-1">
                        <div class="form-group col-12 m-0">
                          <label class="my-1 mr-2 pt-3" for="licensor_id">Licensor *</label>
                          <select name="licensor_id" required class="select2 my-1  form-control r-0 light " id="licensor_id">
                            <option value="{{ $recipe->store->name }}">{{ $recipe->store->name }}</option>
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
                              <option value="{{ $recipe->store->name }}">{{ $recipe->store->name }}</option>
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
  

  

      