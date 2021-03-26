
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab1" role="tabpanel">
            <div class="card-body">
              <form class="pt-2"  id="createBlogForm" action="{{route('blog.store')}}"  enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <p>Please note that, to create a blog, you must first create a blog category. A blog can have many categories and departments</p>
                  </div>
                </div>
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
                <input type="text" name="user_id" value="{{ Auth::User()->id}}" hidden="hidden">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="row pt-4">
                        <div class="col-md-12 col-lg-12 store-up pl-0">
                            <input  type="file" id="avatar" name="avatar">
                            <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="blog-avatar-up">
                                <div style="" class="dz-preview dropzone-previews"></div>
                                <div class="dz-default dz-message">
                                    <div>Upload blog Image</div>
                                    <div>Click to open file browser</div>
                                </div>
                            </div>
                            <img hidden style="background-color: #eee" class="text-center" src="#" />
                        </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="form-row">
                      <div class="form-group col-12 m-0 pt-3">
                        <label for="name"  class="col-form-label s-12">
                          blog Title
                        </label>
                        <input 
                          id="title" 
                          name="title" 
                          autofocus 
                          placeholder="blog title"
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
                    <div class="form-row">
                      <div class="form-group col-12 m-0 pt-3">
                        <label for="departments" class="col-form-label s-12">Department *</label>
                        <select id="departments" class="select2 form-control" name="departments[]" multiple="multiple">
                          @foreach($departments as $department)
                            @php
                                $select = false;
                                if ( old('departments') && in_array($department->id, old('departments')) ) {
                                    $select = true;
                                }
                            @endphp
                            <option {{($select) ? 'selected' : '' }} value="{{$department->id}}"> {{ $department->name }} </option>
                          @endforeach
                        </select>
                        @if($errors->any())
                            <div class="invalid-feedback">
                                {{$errors->first('departments')}}
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
                            name="description" id="summary-ckeditor" cols="10" rows="9"
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
                      <div class="form-group col-12 m-0 pt-3 ">
                        <label 
                          class="my-1 mr-2" 
                          for="active"
                        >
                          Publish
                        </label>
                        <div class="material-switch">
                          <input 
                            id="active" 
                            name="active" 
                            type="checkbox"
                          >
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
        </div>
      </div>
    </div>
  </div>
  
      