
<div class="row gutters-20 pt-5">
  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="card ui-tab-card">
      <div class="card-header">
        <h3>New Booking</h3>
      </div>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <form 
                  class="pt-2"  
                  id="createTeamForm" 
                  action="{{route('web_booking.store')}}"  
                  method="POST"
                >
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-row">
                        <div class="form-group col-12 m-0 pt-3 text-left">
                          <h3>
                            {{ $event->title }}
                          </h3>
                          <div class="event-description">
                            <p>{{ $event->description }}</p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-row">
                            <div class="form-group col-12 m-0 pt-3">
                              <h3 >
                                Event Reference #
                                <span class="event-reference"><strong>{{ $event->event_id }}</strong></span> 
                              </h3>
                              <input 
                                id="event_id" 
                                name="event_id" 
                                type="hidden"
                                value="{{ $event->id}}" 
                                @if($errors->first('event_id')) 
                                  is-invalid 
                                @endif
                                >
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
                                  required 
                                  type="date"
                                  class="form-control 
                                  r-0 light s-12"  
                                  @if($errors->first('start_date')) 
                                    is-invalid  
                                  @endif
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
                                  <label 
                                    for="end_date"  
                                    class="col-form-label s-12"
                                  >
                                    Ending Date
                                  </label>
                                  <input 
                                    id="end_date" 
                                    name="end_date" 
                                    autofocus 
                                    placeholder="ending Date"
                                    value="{{ old('end_date') }}" 
                                    required type="date"
                                    class="form-control 
                                    r-0 light s-12 form-group"  
                                    @if($errors->first('end_date')) 
                                      is-invalid  @endif
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
                            <div class="form-group col-12 m-0 pt-3">
                              <label 
                                class="my-1 mr-2" 
                                for="active"
                              >
                                Publish
                              </label>
                              <div class="material_switch">
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
                            class="float-right btn-fill-lg gradient-dodger-blue btn-hover-bluedark"
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
      </div>
    
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="row">
          <div class="col-12">
            <div class="event-image">
              <img class="img-responsive img-thumbnail card-image-small"
                src="{{ URL::asset('assets/images/events/'.$event->avatar) }}" 
                alt="{{ $event->ttile }}"
              >
            </div>
          </div>
        </div>
      </div>
    </div>

 
 