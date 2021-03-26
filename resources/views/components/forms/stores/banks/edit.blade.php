<form class="pt-2" data-async data-target="#edit" id="bankDetailsForm" enctype="multipart/form-data"
    action="/store-bank/{{$bank->id}}" novalidate _lpchecked="1" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="bank_id" value="{{ $bank->id }}" hidden="hidden">
    <div class="row">
        <div class="col-md-9">
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="name" class="col-form-label s-12">Name *</label>
                    <input id="name" name="name" autofocus placeholder="{{ $bank->name }}" value="{{ $bank->name }}"
                        maxlength="50" class="form-control r-0 light  @if($errors->first('name')) is-invalid  @endif "
                        required type="text">
                    @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('name')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="branch_code" class="col-form-label s-12">Branch Code *</label>
                    <input id="branch_code" name="branch_code" autofocus placeholder="{{ $bank->branch_code }}" value="{{ $bank->branch_code }}"
                        maxlength="50" class="form-control r-0 light  @if($errors->first('branch_code')) is-invalid  @endif "
                        required type="text">
                    @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('branch_code')}}
                    </div>
                    @endif
                </div>
            </div>
          
           <div class="form-row">
              @if( !isset($bank->activate) )
                <div class="form-group col-12 m-0 pt-3 ">
                  <label class="my-1 mr-2" for="active">Publish</label>
                  <div class="material-switch">
                      <input id="active" {{($bank->active)? 'checked': '' }} name="active" type="checkbox">
                      <label for="active">Yes</label>
                  </div>
                </div>
              @endif

            @if( isset($bank->activate) )
                <div class="form-group col-12 m-0 pt-3 ">
                    <label class="my-1 mr-2" for="active">Activate</label>
                    <div class="material-switch">
                        <input id="active"
                               {{($bank->activate)? 'checked': '' }}  name="active"
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
