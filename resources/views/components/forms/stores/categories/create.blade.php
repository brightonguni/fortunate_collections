
<div class="row gutters-20">
  <div class="col-md-12">
    <div class="card ui-tab-card">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
          <div class="card-body">
            <form class="pt-2"  id="createStorecategoryForm" action="{{route('stores.categories.store')}}" enctype="multipart/form-data" method="POST">
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
                  <div class="form-row">
                    <div class="form-group col-12">
                      <label for="avatar">browse Store category image
                        <input name="avatar" type="file" id="avatar">
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 md-9 col-lg-9">
                  <div class="form-row">
                    <div class="form-group col-12 m-0 pt-3">
                      <label for="title"  class="col-form-label s-12">
                        Title
                      </label>
                      <input id="title" name="title" autofocus placeholder="category title"
                        value="{{ old('title') }}" maxlength="191"  required type="text" class="form-control 
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
                      <label for="description" class="col-form-label s-12">Description *</label>
                      <textarea style="height: 145px;" required class="textarea form-control  
                        @if($errors->first('description')) 
                            is-invalid  
                          @endif r-0" 
                          name="description" id="summary-ckeditor"
                          cols="10" rows="9"
                        >
                        {{ old('description') }}</textarea>
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
  
      