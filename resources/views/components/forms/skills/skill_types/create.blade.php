
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
                action="{{route('skills.types.store')}}"  
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
                          Skill Type Name
                        </label>
                        <input 
                          id="name" 
                          name="name" 
                          autofocus 
                          placeholder="skill type name"
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
  
      