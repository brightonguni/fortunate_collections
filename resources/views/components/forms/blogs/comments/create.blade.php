
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
            <div class="card">
              <div class="card-body">
                <p class="blog-title">{{ $blog->title }}</p>
              </div>
            </div>
              <form 
                class="pt-2"  
                id="createTeamForm" 
                action="{{route('comment.store')}}"  
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
                          Blog Id
                        </label>
                        <input 
                          id="blog_id" 
                          name="blog_id" 
                          autofocus 
                          placeholder="blog #"
                          value="{{ $blog->blog_id }}" 
                          required type="hidden"
                          class="form-control 
                          r-0 light s-12  
                          @if($errors->first('blog_id')) 
                            is-invalid  @endif"
                        >
                          @if($errors->any())
                            <div class="invalid-feedback">
                              {{$errors->first('blog_id')}}
                            </div>
                          @endif
                        </div>
                        
                    </div>
                    <input 
                          id="user_id" 
                          name="user_id" 
                          autofocus 
                          placeholder="user Name"
                          value="{{ auth()->user()->id }}" 
                          required type="hidden"
                          class="form-control 
                          r-0 light s-12  
                          @if($errors->first('user_id')) 
                            is-invalid  @endif"
                        >
                          @if($errors->any())
                            <div class="invalid-feedback">
                              {{$errors->first('user_id')}}
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
  
      