
<div class="row gutters-20">
  <div class="col-md-12">
    <div class="card ui-tab-card">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
          <div class="card-body">
            <form class="pt-2" 
              data-async data-target="#edit" 
              id="BlogEditDetailsForm" enctype="multipart/form-data"
              action="/blog/edit/{{$blog->id}}" 
              novalidate _lpchecked="1"
              method="POST"
            >
              @csrf
              <input type="text" name="blog_id" value="{{ $blog->id }}" hidden="hidden">
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
                <div class="col-md-12">
                  <div class="row pt-4">
                      <div class="col-md-3 store-up pl-0">
                          <input  type="file" id="avatar" name="avatar">
                          <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="blog-avatar-up">
                              <div style="" class="dz-preview dropzone-previews"></div>
                              <div class="dz-default dz-message">
                                  <div>Upload blog Image</div>
                                  <div>Click to open file browser</div>
                              </div>
                          </div>
                          <img style="background-color: #eee" class="text-center" src="{{ URL::asset('assets/images/blogs/'.$blog->avatar) }}" />
                      </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-12 m-0 pt-3">
                      <label for="title"  class="col-form-label s-12">Blog Title</label>
                      <input id="title" name="title" autofocus placeholder="{{ $blog->title }}"
                        value="{{ $blog->title }}" maxlength="191"  required type="text" class="form-control 
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
                      
                    <div id="blog-categories">
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

                    <div id="blog-departments">
                      <div class="form-group" style="">
                        <span><i>Press Ctrl + Click to select more departments </i></span>
                        <select name="departments[]" class="form-control select2 select2-hidden-accessible" multiple="" 
                          data-placeholder="departments" style="width: 100%;" tabindex="-1" aria-hidden="true" name="departments">
                          <?php if (!empty($departments)) {?>
                            @foreach ($departments as $department)
                              @php $selected = false; @endphp
                              @for($i=0; $i < sizeOf($selected_departments); $i++)
                                  @if($selected_departments[$i]->id == $department->id)
                                    @php $selected = true; @endphp
                                  @endif
                              @endfor
                              @if($selected)
                                <option value="{{$department->id}}" selected="selected">{{$department->name}}</option>
                              @else
                              <option value="{{$department->id}}" >{{$department->name}}</option>
                              @endif
                            @endforeach
                            <?php }?>
                        </select>
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
  
      