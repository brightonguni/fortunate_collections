<form class="pt-2" data-async data-target="#edit" id="storeContactForm" enctype="multipart/form-data" action="{{ route('store_contact.store') }}" novalidate
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
            <div class="form-row mt-1">
              <div class="form-group col-12 m-0">
                  <label class="my-1 mr-2 pt-3" for="user_id">Name *</label>
                  <select name="user_id" required class="select2 my-1  form-control r-0 light " id="user_id">
                    @foreach($users as $id => $name)
                      <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                  </select>
                  @error('user_id')
                    <div class="invalid-feedback">
                      {{$message }}
                    </div>
                  @enderror
              </div>
            </div>
            
            <div class="form-row mt-1">
              <div class="form-group col-12 m-0">
                  <label class="my-1 mr-2 pt-3" for="store_id">Store *</label>
                  <select name="store_id" required class="select2 my-1  form-control r-0 light " id="store_id">
                    @foreach($stores as $id => $name)
                      <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                  </select>
                  @error('store_id')
                    <div class="invalid-feedback">
                      {{$message }}
                    </div>
                  @enderror
              </div>
            </div>

            <div class="form-row mt-1">
              <div class="form-group col-12 m-0">
                  <label class="my-1 mr-2 pt-3" for="licensor_id">Licensor *</label>
                  <select name="licensor_id" required class="select2 my-1  form-control r-0 light " id="licensor_id">
                    @foreach($licensors as $id => $name)
                      <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                  </select>
                  @error('licensor_id')
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
