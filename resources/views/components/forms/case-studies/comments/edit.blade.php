<form class="pt-2" data-async data-target="#edit" id="Case_studyCommentDetailsForm" enctype="multipart/form-data"
    action="/case_study/comment/{{$comment->id}}" novalidate _lpchecked="1" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="comment_id" value="{{ $comment->id }}" hidden="hidden">
    <div class="row">
        <div class="col-md-9">
            
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="description" class="col-form-label s-12">Bio *</label>
                    <textarea style="height: 145px;" required class="textarea form-control  @if($errors->first('description')) is-invalid  @endif r-0" name="description" id="description" cols="10" rows="9"
                              placeholder="{{ $comment->description }}">{{ $comment->description }}
                    </textarea>
                    @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('description')}}
                    </div>
                    @endif
                </div>
            </div>
          <div class="form-row">
              @if( !isset($comment->activate) )
              <div class="form-group col-12 m-0 pt-3 ">
                  <label class="my-1 mr-2" for="active">Publish</label>
                  <div class="material-switch">
                      <input id="active" {{($comment->active)? 'checked': '' }} name="active" type="checkbox">
                      <label for="active">Yes</label>
                  </div>
            </div>
          @endif

            @if( isset($comment->activate) )
                <div class="form-group col-12 m-0 pt-3 ">
                    <label class="my-1 mr-2" for="active">Activate</label>
                    <div class="material-switch">
                        <input id="active"
                               {{($comment->activate)? 'checked': '' }}  name="active"
                               type="checkbox">
                        <label for="active" >Yes</label>
                    </div>
                </div>
            @endif
        </div>
   
        <div class="row">
            <div class="col-12">
                <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
            </div>
        </div>
    </div>
</form>
