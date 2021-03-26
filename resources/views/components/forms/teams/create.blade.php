
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab1" role="tabpanel">
            <div class="card-body">
              <form class="pt-2"  id="createTeamForm" action="{{route('team.store')}}"  method="POST">
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
                  <div class="col-md-12">
                    <div class="form-row">
                      <div class="form-group col-12 m-0 pt-3">
                        <label for="title"  class="col-form-label s-12">
                          Team Name
                        </label>
                        <input id="title" 
                          name="title" autofocus 
                          placeholder="Team name"
                          value="{{ old('title') }}" maxlength="191"  
                          required type="text" class="form-control 
                          r-0 light s-12  
                          @if($errors->first('title')) 
                            is-invalid  @endif"
                          >
                          @if($errors->any())
                            <div class="invalid-feedback">
                              {{$errors->first('name')}}
                            </div>
                          @endif
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-12 m-0 pt-3">
                          <label for="description" class="col-form-label s-12">Description*</label>
                          <textarea 
                            style="height: 145px;" required class="textarea form-control  
                            @if($errors->first('description')) 
                              is-invalid  
                            @endif r-0" 
                            name="description" id="summary-ckeditor"
                            cols="10" rows="9"
                          >{{ old('description') }}</textarea>
                          @if($errors->any())
                              <div class="invalid-feedback">
                                  {{$errors->first('description')}}
                              </div>
                          @endif
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-12 m-0 pt-3">
                          <label for="employees" class="col-form-label s-12">Team Members *</label>
                          <select id="employees" class="select2 form-control" name="employees[]" multiple="multiple">
                            @foreach($team_members as $team)
                              @php
                                  $select = false;
                                  if ( old('employees') && in_array($team->id, old('employees')) ) {
                                      $select = true;
                                  }
                              @endphp
                              <option {{($select) ? 'selected' : '' }} value="{{$team->id}}"> {{ $team->user->name }} </option>
                            @endforeach
                          </select>
                          @if($errors->any())
                            <div class="invalid-feedback">
                                {{$errors->first('employees')}}
                            </div>
                          @endif
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-12 m-0 pt-3">
                          <label for="projects" class="col-form-label s-12">Projects *</label>
                          <select id="projects" class="select2 form-control" name="projects[]" multiple="multiple">
                            @foreach($projects as $project)
                              @php
                                  $select = false;
                                  if ( old('projects') && in_array($project->id, old('projects')) ) {
                                      $select = true;
                                  }
                              @endphp
                              <option {{($select) ? 'selected' : '' }} value="{{$project->id}}"> {{ $project->name }} </option>
                            @endforeach
                          </select>
                          @if($errors->any())
                            <div class="invalid-feedback">
                                {{$errors->first('projects')}}
                            </div>
                          @endif
                        </div>
                      </div>
                 
                      <div class="form-row">
                        <div class="form-group col-12 m-0 pt-3">
                          <label for="skills" class="col-form-label s-12">Skills *</label>
                          <select id="skills" class="select2 form-control" name="skills[]" multiple="multiple">
                            @foreach($skills as $skill)
                              @php
                                  $select = false;
                                  if ( old('skills') && in_array($skill->id, old('skills')) ) {
                                      $select = true;
                                  }
                              @endphp
                              <option {{($select) ? 'selected' : '' }} value="{{$skill->id}}"> {{ $skill->name }} </option>
                            @endforeach
                          </select>
                          @if($errors->any())
                            <div class="invalid-feedback">
                                {{$errors->first('skills')}}
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
  
      