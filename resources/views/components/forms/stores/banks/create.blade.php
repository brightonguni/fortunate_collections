<form class="pt-2" data-async data-target="#edit" id="storeBankForm" enctype="multipart/form-data" action="{{ route('store_bank.store') }}" novalidate
      _lpchecked="1" method="POST">
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
        <div class="col-md-8">
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="name" class="col-form-label s-12">Bank Name *</label>
                    <input id="name" name="name" autofocus value="{{ old('name') }}" maxlength="50"
                           class="form-control r-0 light  @if($errors->first('name')) is-invalid  @endif "
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
                    <label for="branch_code" class="col-form-label s-12 ">Branch Code *</label>
                    <input id="branch_code" name="branch_code"
                           value="{{ old('branch_code') }}"
                           maxlength="50"
                           class="form-control r-0 light s-12  @if($errors->first('branch_code')) is-invalid  @endif  "
                           required type="text">
                    @if($errors->any())
                        <div class="invalid-feedback">
                            {{$errors->first('branch_code')}}
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
                    <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                </div>
            </div>
        </div>
  </form>
