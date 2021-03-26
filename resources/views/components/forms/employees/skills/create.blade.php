
  <div 
    class="row gutters-20"
  >
    <div 
      class="col-md-12"
    >
      <div 
        class="card ui-tab-card"
      >
        <div 
          class="tab-content"
        >
          <div 
            class="tab-pane fade show active" 
            id="tab1" 
            role="tabpanel"
          >
            <div 
              class="card-body"
            >
              <form 
                class="pt-2"  
                id="createTeamForm" 
                action="{{route('skills.store')}}"  
                method="POST"
              >
                @csrf
                <div class="row">
                  <div class="col-md-12">

                    <div class="form-row">
                      <div class="form-group col-12 m-0 pt-3">
                        <label 
                          for="name"  
                          class="col-form-label s-12"
                        >
                          Skill Name
                        </label>
                        <input 
                          id="name" 
                          name="name" 
                          autofocus 
                          placeholder="skill name"
                          value="{{ old('name') }}" 
                          maxlength="191"  
                          required type="text"
                          class="form-control 
                          r-0 light s-12  
                          @if($errors->first('name')) 
                            is-invalid  @endif"
                          >
                          @if($errors->any())
                            <div class="invalid-feedback">
                              {{$errors->first('name')}}
                            </div>
                          @endif
                        </div>
                        
                        <div class="form-row mt-1">
                          <div class="form-group col-12 m-0">
                              <label class="my-1 mr-2 pt-3" for="licensor_id">Skill Type *<span>skill type, can be (soft or hard skill) </span></label>
                              <select name="skill_type_id" required class="select2 my-1  form-control r-0 light " id="skill_type_id">
                                  @foreach($skill_types as $id => $name)
                                       <option value="{{$id}}">{{ $name }}</option>
                                  @endforeach
                              </select>
                              @error('skill_type_id')
                                  <div class="invalid-feedback">
                                      {{$message }}
                                  </div>
                              @enderror
                          </div>
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
  
      