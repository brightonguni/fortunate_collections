
          <form id="createContactForm"  method="POST" action="{{ route('web_contact_us.store') }}">
            @csrf
            <input type="hidden" name="{{ $store->id }}">
            <div class="form-row">
              <div class="form-group col-12 m-0 pt-3">
                <label 
                  for="name"  
                  class="col-form-label s-12"
                >
                  First Name
                </label>
                <input 
                  id="first_name" 
                  name="first_name" 
                  autofocus 
                  placeholder="First name"
                  value="{{ old('first_name') }}" 
                  maxlength="191"  
                  required type="text"
                  class="form-control 
                  r-0 light s-12  
                  @if($errors->first('first_name')) 
                    is-invalid  @endif"
                  >
                  @if($errors->any())
                    <div class="invalid-feedback">
                      {{$errors->first('first_name')}}
                    </div>
                  @endif
                </div>
            </div>

            <div class="form-row">
              <div class="form-group col-12 m-0 pt-3">
                <label 
                  for="last_name"  
                  class="col-form-label s-12"
                >
                  Surname
                </label>
                <input 
                  id="last_name" 
                  name="last_name" 
                  autofocus 
                  placeholder="last name"
                  value="{{ old('last_name') }}" 
                  maxlength="191"  
                  required type="text"
                  class="form-control r-0 light s-12  
                  @if($errors->first('last_name')) 
                    is-invalid  
                  @endif"
                >
                @if($errors->any())
                  <div class="invalid-feedback">
                    {{$errors->first('last_name')}}
                  </div>
                @endif
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-12 m-0 pt-3">
                <label 
                  for="name"  
                  class="col-form-label s-12"
                >
                  Email Address
                </label>
                <input 
                  id="email_address" 
                  name="email_address" 
                  autofocus 
                  placeholder="Your Email Address eg example@example.com"
                  value="{{ old('email_address') }}" 
                  maxlength="191"  
                  required type="email"
                  class="form-control 
                  r-0 light s-12  
                  @if($errors->first('email_address')) 
                    is-invalid  @endif"
                  >
                  @if($errors->any())
                    <div class="invalid-feedback">
                      {{$errors->first('email_address')}}
                    </div>
                  @endif
                </div>
            </div>

            <div class="form-row">
              <div class="form-group col-12 m-0 pt-3">
                <label 
                  for="name"  
                  class="col-form-label s-12"
                >
                  Contact telephone #
                </label>
                <input 
                  id="telephone" 
                  name="telephone" 
                  autofocus 
                  placeholder="telephone #"
                  value="{{ old('telephone') }}" 
                  maxlength="191"  
                  required type="tel"
                  class="form-control 
                  r-0 light s-12  
                  @if($errors->first('telephone')) 
                    is-invalid  @endif"
                  >
                  @if($errors->any())
                    <div class="invalid-feedback">
                      {{$errors->first('telephone')}}
                    </div>
                  @endif
                </div>
            </div>

            <div class="form-row">
              <div class="form-group col-12 m-0 pt-3">
                <label 
                  for="name"  
                  class="col-form-label s-12"
                >
                  Contact For WhatsApp (cellphone)#
                </label>
                <input 
                  id="cellphone" 
                  name="cellphone" 
                  autofocus 
                  placeholder="your WhatsApp Cell Number #"
                  value="{{ old('cellphone') }}" 
                  maxlength="191"  
                  required type="tel"
                  class="form-control 
                  r-0 light s-12  
                  @if($errors->first('cellphone')) 
                    is-invalid  @endif"
                  >
                  @if($errors->any())
                    <div class="invalid-feedback">
                      {{$errors->first('cellphone')}}
                    </div>
                  @endif
                </div>
            </div>

            <div class="form-row mt-1">
              <div class="form-group col-12 m-0">
                <label class="my-1 mr-2 pt-3" for="service_id">Select Service</label>
                <select name="service_id" required class="select2 my-1  form-control r-0 light " id="service_id">
                  @foreach($services as $id => $title)
                       <option value="{{$id}}">{{ $title }}</option>
                  @endforeach
                </select>
                @error('category_id')
                  <div class="invalid-feedback">
                      {{$message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-12 m-0 pt-3">
                <label for="description" class="col-form-label s-12">Message *</label>
                <textarea 
                  style="height: 145px;" 
                  required class="textarea form-control  
                  @if($errors->first('description')) 
                    is-invalid  
                  @endif r-0" 
                  name="description" 
                  id="summary-ckeditor" 
                  cols="10" rows="9"
                >
                  {{ old('description') }}
                </textarea>
                @if($errors->any())
                    <div class="invalid-feedback">
                        {{$errors->first('description')}}
                    </div>
                @endif
              </div>
            </div>

             <div class="row" style="padding-top: 10px;">
                <div class="col-12">
                  <button 
                    type="submit" 
                    class="float-right btn btn-outline-dark btn-lg">
                    Send message
                  </button>
                </div>
              </div>
          </form>
        
