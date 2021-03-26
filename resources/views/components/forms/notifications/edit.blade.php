<form class="pt-2" data-async data-target="#edit" id="userProfileForm" action="{{ route('notifications.update', ['id' => $notification->id]) }}" novalidate
      _lpchecked="1" method="POST">
    @csrf

    <input name="_method" type="hidden" value="PUT" />

    <div class="row">
        <div class="col-md-12">
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="message" class="col-form-label s-12">Message *</label>
                    <input id="message" name="message" placeholder="{{ $notification->message }}"
                           value="{{ $notification->message }}"
                           maxlength="255"
                           class="form-control r-0 light s-12  @error('message') is-invalid @enderror "
                           required type="text">
                    @error('message')
                        <div class="invalid-feedback">
                            {{$message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3 ">
                    <label class="my-1 mr-2" for="active">Status</label>
                    <div class="material-switch">
                        <input id="active"
                               {{($notification->active)? 'checked': '' }} name="active"
                               type="checkbox">
                        <label for="status"> Active</label>
                        @error('active')
                            <div class="invalid-feedback">
                                {{$message }}
                            </div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
        </div>
    </div>
</form>
