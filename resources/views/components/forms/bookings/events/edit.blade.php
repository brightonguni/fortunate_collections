<form class="pt-2" data-async data-target="#edit" id="EventDetailsForm" enctype="multipart/form-data"
    action="/booking/event{{$event->id}}" novalidate _lpchecked="1" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="event" value="{{ $event->id }}" hidden="hidden">
    <div class="row">
        <div class="col-md-9">
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="name" class="col-form-label s-12">title *</label>
                    <input id="title" name="title" autofocus placeholder="{{ $event->title }}" value="{{ $event->name }}"
                        maxlength="50" class="form-control r-0 light  @if($errors->first('name')) is-invalid  @endif "
                        required type="text">
                    @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('title')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="description" class="col-form-label s-12">Bio *</label>
                    <textarea style="height: 145px;" required class="textarea form-control  @if($errors->first('description')) is-invalid  @endif r-0" name="description" id="description" cols="10" rows="9"
                              placeholder="{{ $event->description }}">{{ $event->description }}
                    </textarea>
                    @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('description')}}
                    </div>
                    @endif
                </div>
            </div>
          <div class="form-row">
              @if( !isset($event->activate) )
              <div class="form-group col-12 m-0 pt-3 ">
                  <label class="my-1 mr-2" for="active">Publish</label>
                  <div class="material-switch">
                      <input id="active" {{($event->active)? 'checked': '' }} name="active" type="checkbox">
                      <label for="active">Yes</label>
                  </div>
            </div>
          @endif

            @if( isset($event->activate) )
                <div class="form-group col-12 m-0 pt-3 ">
                    <label class="my-1 mr-2" for="active">Activate</label>
                    <div class="material-switch">
                        <input id="active"
                               {{($event->activate)? 'checked': '' }}  name="active"
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
