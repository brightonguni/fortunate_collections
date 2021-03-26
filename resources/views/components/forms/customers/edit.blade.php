
<form 
  class="pt-2 " 
  data-async 
  data-target="#edit" 
  id="userProfileForm" 
  enctype="multipart/form-data" 
  action="{{ route('users.update', ['id' => $customer->id]) }}" 
  novalidate
  _lpchecked="1" 
  method="POST"
>
  @csrf
  <input 
    type="hidden" 
    name="csrf-token" 
    value="_token"
  >
  <input 
    type="hidden" 
    name="csrf-token" 
    value="nc98P987bcpncYhoadjoiydc9ajDlcn"
  >
  <input 
    name="_method" 
    type="hidden" 
    value="PUT" 
  />
  <div class="row">
    <div class="col-md-12">
      <div class="form-row">
        <div class="form-group col-12 m-0 pt-3">
          <label 
            for="email" 
            class="col-form-label s-12"
          >
            Email
          </label>
          <input 
            id="email" 
            name="email" 
            placeholder="{{ $customer->email }}"
            value="{{ $customer->email }}"
            maxlength="191"
            class="form-control r-0 light s-12  
            @if($errors->first('email')) 
              is-invalid  
            @endif"
            required type="email"
          >
          @if($errors->any())
            <div class="invalid-feedback">
              {{$errors->first('email')}}
            </div>
          @endif
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-12 m-0 pt-3">
          <label 
            for="password" 
            class="col-form-label s-12"
          >
            Password
          </label>
          <input 
            id="password" 
            name="password" 
            placeholder="Please enter your password"
            minlength="6" 
            type="password"
            class="form-control r-0 light s-12  
            @if($errors->first('password')) 
              is-invalid  
            @endif"
          >
          @if($errors->any())
            <div class="invalid-feedback">
              {{$errors->first('password')}}
            </div>
          @endif
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-6 m-0 pt-3">
          <label 
            for="first_name" 
            class="col-form-label s-12"
          >
            First Name
          </label>
          <input 
            id="first_name" 
            name="first_name" 
            autofocus
            placeholder="{{ $customer->first_name }}"
            value="{{ $customer->first_name }}"
            maxlength="50"
            class="form-control r-0 light s-12  
            @if($errors->first('first_name')) 
              is-invalid  
            @endif"
            required type="text"
          >
          @if($errors->any())
            <div class="invalid-feedback">
              {{$errors->first('first_name')}}
            </div>
          @endif
        </div>
        <div class="form-group col-6 m-0 pt-3">
          <label 
            for="last_name" 
            class="col-form-label s-12 "
          >
            Last Name
          </label>
          <input 
            id="last_name" 
            name="last_name"
            placeholder="{{ $customer->last_name }}"
            value="{{ $customer->last_name }}"
            maxlength="50"
            class="form-control r-0 light s-12 {{(isset($error['last_name'][0]))? 'is-invalid' : '' }}"
            required type="text"
          >
          @if($errors->any())
            <div class="invalid-feedback">
              {{$errors->first('last_name')}}
            </div>
          @endif
        </div>
      </div>
      <div class="form-row mt-1">
        <div class="form-group col-6 m-0 pt-3">
          <label 
            for="phone" 
            class="col-form-label s-12"
          >
            Phone Number
          </label>
          <input 
            id="phone" 
            placeholder="{{ $customer->phone }}"
            value="{{ $customer->phone }}" 
            required 
            name="phone"
            maxlength="10"
            class="form-control r-0 light s-12 {{(isset($error['phone'][0]))? 'is-invalid' : '' }}"
            type="tel"
          >
          @if($errors->any())
            <div class="invalid-feedback">
              {{$errors->first('phone')}}
            </div>
          @endif
        </div>
        <div class="form-group col-6 m-0 pt-3">
          <label class="my-1 mr-2" for="role">Role </label>
            <select 
              required 
              name="role_id"
              class="custom-select my-1 mr-sm-2 form-control r-0 light s-12"
              id="role" 
              data-roles="{{ json_encode($roles) }}"
            >
              @foreach($roles as $role)
                <option
                  {{($role->name == $customer->role()->name)? 'selected' : ''}} 
                  value="{{$role->id }}"
                >
                  {{ $role->name }}
                </option>
              @endforeach
            </select>
          </div>
          @if($errors->any())
            <div class="invalid-feedback">
              {{$errors->first('role_id')}}
            </div>
          @endif
        </div>
        @if($customer->role()->name != 'Administrator')
          <div class="form-row mt-1">
             <div class="form-group col-6 m-0 pt-3">
              <label 
                class="my-1 mr-2" 
                for="role"
              >
                Licensor 
              </label>
              <select 
                required 
                name="licensor_id"
                class="custom-select my-1 mr-sm-2 form-control r-0 light s-12"
                id="licensor_id" 
                data-licensors="{{ json_encode($licensors)}}"
              >
                @foreach($licensors as $licensor)
                  <option
                    {{($licensor->name == $customer->licensor->name)? 'selected' : ''}}
                     value="{{$licensor->id }}"
                  >
                    {{ $licensor->name }}
                  </option>
                @endforeach
              </select>
            </div>
            @php
              $error ='hidden-error';
              if($errors->has('store') || $customer->store){
                  $error = '';
              }
            @endphp
            <div class="form-group col-6 m-0 pt-3 {{ $error }}" id="stores_area">
              <label 
                class="my-1 mr-2" 
                for="role"
              >
                Stores 
              </label>
              <select 
                required 
                name="store"
                class="custom-select my-1 mr-sm-2 form-control r-0 light s-12"
                id="store_id" 
                data-stores="{{ json_encode($stores) }}"
              >
                <option 
                  value=""
                >
                  Select Store
                </option>
                @foreach($stores as $store)
                  @if($customer->store)
                    @if($customer->store->store_id == $store->id)
                        <option selected="selected" value="{{$store->id }}">{{ $store->name }}</option>
                    @endif
                  @endif
                  <option value="{{$store->id }}">{{ $store->name }}</option>
                @endforeach
              </select>
              @if($errors->any())
                <div class="invalid-feedback">
                  {{$errors->first('store')}}
                </div>
              @endif
            </div>
            <div class="form-group col-12 m-0 pt-3">
              <label 
                for="licensor_id" 
                class="col-form-label s-12"
              >
                Licensor
              </label>
              <select 
                name="licensor_id" 
                required 
                class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" 
                id="licensor_id"
              >
                @foreach($licensors as $licensor)
                  @if($customer->licensor)
                    <option 
                      value="{{$licensor->id}}"
                    >
                      {{ $licensor->name }}
                    </option>
                    @else
                    <option {{($licensor->name == $customer->licensor->name)? 'selected' : ''}}  
                      value="{{$licensor->id}}"
                    >
                      {{ $licensor->name }}
                    </option>
                  @endif
                @endforeach
              </select>
            </div> 
          </div>
          <hr>
        @endif
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
                {{($customer->active)? 'checked': '' }}  name="active"
                type="checkbox"
              >
              <label 
                for="active" 
              >
                Yes
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <button 
          type="submit" 
          class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark"
        >
          Save
        </button>
        <input 
          type="hidden" 
          name="csrf-token" 
          value="_token"
        >
      </div>
    </div>
  </form>
  <script type="text/javascript">
    $(document).ready(function(){
        var roleval = null
        var activebusiness = <?php echo json_encode($customer->store) ?>;
        if(activebusiness !=null){
            activebusiness = activebusiness.store_id
        }else{
            activebusiness = <?php echo old('store')? old('store'): 0 ?>;
        }
        // console.log('store', activebusiness)
        var role = <?php echo $customer->role()->id ?>;
        set_stores(role, activebusiness) 
        $('#role').on('change', function(){
            var val = $(this).val();
            console.log('val', val);

            set_stores(val) 
        })
        function set_stores(val=null, selected=null){
           var storeshtml = $('#store_id')
           storeshtml.html('') 
           licensor = $('#licensor_id')
           licensors = licensor.attr('data-licensors');
           var roles =  <?php echo json_encode($roles) ?>;
            for (var key in roles) {
                // console.log('roles', roles[key])
                if(roles[key].id == val){
                    roleval = roles[key]
                }
            }
            if(roleval == null){
                $('#stores_area').addClass('hidden-error')
                return
            }
           
           var stores = storeshtml.attr('data-stores')
           stores = JSON.parse(stores)
           licensors = JSON.parse(licensors)
           console.log('stores', licensor.val(), roleval )

           storeshtml.append("<option value=''> Select store</option>");
           if(roleval.name == 'Business'){
                for (var i = 0; i < stores.length; i++) {
                   var store = stores[i]
                   if(store.licensor.id == licensor.val()){
                        // console.log('store', store)
                        var set_selected = ""
                        if(selected != null){
                            if(selected == store.id){
                                set_selected = "selected='selected'"
                            }
                        }
                        
                         var option = "<option value='"+store.id+"' "+set_selected+"> "+store.name+"</option>"
                        storeshtml.append(option);
                   }
                   
               }
               $('#stores_area').removeClass('hidden-error')
           }else{
            if(activebusiness == null){
                $('#stores_area').addClass('hidden-error')
            }
            
           }
           
           

        }

        $('#licensor_id').on('change', function(){
            // var val = $(this).val();
            // console.log('val', val);

            set_stores() 
        })
    })
</script>
