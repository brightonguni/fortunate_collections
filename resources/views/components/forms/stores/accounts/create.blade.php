<form class="pt-2" data-async data-target="#edit" id="storeAccountForm" enctype="multipart/form-data" action="{{ route('store_account.store') }}" novalidate
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
                    <label for="account_name" class="col-form-label s-12">Account Name *</label>
                    <input id="account_name" name="account_name" autofocus value="{{ old('account_name') }}" maxlength="50"
                           class="form-control r-0 light  @if($errors->first('account_name')) is-invalid  @endif "
                           required type="text">
                    @if($errors->any())
                        <div class="invalid-feedback">
                            {{$errors->first('account_name')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="account_number" class="col-form-label s-12 ">Account Number *</label>
                    <input id="account_number" name="account_number"
                           value="{{ old('account_number') }}"
                           maxlength="50"
                           class="form-control r-0 light s-12  @if($errors->first('account_number')) is-invalid  @endif  "
                           required type="text">
                    @if($errors->any())
                        <div class="invalid-feedback">
                            {{$errors->first('account_number')}}
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-12 m-0">
                    <label class="my-1 mr-2 pt-3" for="account_type">Account Type</label>
                    <input id="account_type" name="account_type"
                           value="{{ old('account_type') }}"
                           maxlength="191"
                           class="form-control r-0 light s-12  @if($errors->first('type')) is-invalid  @endif  "
                           type="text">
                    @if($errors->any())
                        <div class="invalid-feedback">
                            {{$errors->first('account_type')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row mt-1">
              <div class="form-group col-12 m-0">
                  <label class="my-1 mr-2 pt-3" for="bank_id">Bank *</label>
                  <select name="bank_id" required class="select2 my-1  form-control r-0 light " id="bank_id">
                    @foreach($banks as $id => $name)
                      <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                  </select>
                  @error('bank_id')
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
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                </div>
            </div>
        </div>
  </form>
