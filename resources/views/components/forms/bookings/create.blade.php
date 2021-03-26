
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab1" role="tabpanel">
            <div class="card-body">
              <form class="pt-2"  id="createTeamForm" action="{{route('booking.store')}}"  method="POST">
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
                <input type="text" name="user_id" value="{{ Auth::User()->id}}" hidden="hidden">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-row mt-1">
                      <div class="form-group col-12 m-0">
                        <label class="my-1 mr-2 pt-3" for="event_id">Select Event </label>
                        <select name="event_id" required class="select2 my-1  form-control r-0 light " id="event_id">
                            @foreach($events as $id => $name)
                                 <option value="{{$id}}">{{ $name }}</option>
                            @endforeach
                        </select>
                        @error('event_id')
                            <div class="invalid-feedback">
                                {{$message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                      <div class="form-row mt-1">
                        <div class="form-group col-12 m-0">
                            <label class="my-1 mr-2 pt-3" for="event_id">Select Venue </label>
                            <select name="venue_id" required class="select2 my-1  form-control r-0 light " id="venue_id">
                                @foreach($venues as $id => $name)
                                     <option value="{{$id}}">{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('event_id')
                                <div class="invalid-feedback">
                                    {{$message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                        
                        <div class="form-row mt-1">
                          <div class="form-group col-12 m-0">
                              <label class="my-1 mr-2 pt-3" for="category_id">Select Booking Category</label>
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
                              <label class="my-1 mr-2 pt-3" for="service_id">Select Service</label>
                              <select name="service_id" required class="select2 my-1  form-control r-0 light " id="service_id">
                                  @foreach($services as $id => $name)
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
                              <label class="my-1 mr-2 pt-3" for="service_id">Select Licensor</label>
                              <select name="licensor_id" required class="select2 my-1  form-control r-0 light " id="licensor_id">
                                  @foreach($licensors as $id => $name)
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
                              <label class="my-1 mr-2 pt-3" for="service_id">Select Store</label>
                              <select name="store_id" required class="select2 my-1  form-control r-0 light " id="store_id">
                                  @foreach($stores as $id => $name)
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
                            cols="10" rows="9"
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
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
      