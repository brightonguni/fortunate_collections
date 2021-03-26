
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab1" role="tabpanel">
            <div class="card-body">
              <form 
                class="pt-2"  
                id="createBlogcategoryForm" enctype="multipart/form-data"
                action="{{route('booking_event.store')}}"  
                method="POST"
              >
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
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="row pt-4">
                      <div class="col-md-12 col-lg-12 store-up pl-0">
                        <input  type="file" id="avatar" name="avatar">
                        <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="blog-avatar-up">
                            <div style="" class="dz-preview dropzone-previews"></div>
                            <div class="dz-default dz-message">
                                <div>Upload Event Image</div>
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
                        <label for="title"  class="col-form-label s-12">
                          Title
                        </label>
                        <input id="title" 
                          name="title" 
                          autofocus 
                          placeholder="title"
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
                        <label 
                          for="start_date"  
                          class="col-form-label s-12"
                        >
                          Start Date
                        </label>
                        <input 
                          id="start_date" 
                          name="start_date" 
                          autofocus 
                          placeholder="starting Date"
                          value="{{ old('start_date') }}" 
                          required type="date"
                          class="form-control 
                          r-0 light s-12  
                          @if($errors->first('start_date')) 
                            is-invalid  @endif"
                          >
                          @if($errors->any())
                            <div class="invalid-feedback">
                              {{$errors->first('starting_date')}}
                            </div>
                          @endif
                        </div>
                      </div>

                      <div class="form-row">
                      <div class="form-group col-12 m-0 pt-3">
                        <label for="end_date"  
                          class="col-form-label s-12"
                        >
                          Ending Date
                        </label>
                        <input id="end_date" 
                          name="end_date" 
                          autofocus 
                          placeholder="ending Date"
                          value="{{ old('end_date') }}" 
                          required type="date"
                          class="form-control 
                          r-0 light s-12  
                          @if($errors->first('end_date')) 
                            is-invalid  @endif"
                          >
                          @if($errors->any())
                            <div class="invalid-feedback">
                              {{$errors->first('starting_date')}}
                            </div>
                          @endif
                        </div>
                      </div>
                     <div class="form-row mt-1">
                        <div class="form-group col-12 m-0">
                          <label class="my-1 mr-2 pt-3" for="venue_id">Select Venue</label>
                          <select name="venue_id" required class="select2 my-1  form-control r-0 light " id="venue_id">
                              @foreach($venues as $id => $name)
                                   <option value="{{$id}}">{{ $name }}</option>
                              @endforeach
                          </select>
                          @error('venue_id')
                              <div class="invalid-feedback">
                                  {{$message }}
                              </div>
                          @enderror
                        </div>
                      </div>  
                      <div class="form-row mt-1">
                        <div class="form-group col-12 m-0">
                          <label class="my-1 mr-2 pt-3" for="service_id">Select Service</label>
                          <select name="service_id" required class="select2 my-1  form-control r-0 light " id="service_id">
                              @foreach($services as $id => $name)
                                   <option value="{{$id}}">{{ $name }}</option>
                              @endforeach
                          </select>
                          @error('service_id')
                            <div class="invalid-feedback">
                                {{$message }}
                            </div>
                          @enderror
                        </div>
                    </div>   
                      <div class="form-row mt-1">
                        <div class="form-group col-12 m-0">
                          <label class="my-1 mr-2 pt-3" for="store_id">Select Store</label>
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
                          <label class="my-1 mr-2 pt-3" for="licensor_id">Select Licensor</label>
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
                        <button 
                          type="submit" 
                          class="float-right 
                          btn-fill-lg 
                          btn-gradient-yellow 
                          btn-hover-bluedark"
                        >
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
  
      