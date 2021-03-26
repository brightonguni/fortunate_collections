
<div class="card height-auto" id="index-card">
  <div class="card-body">
    <form class="pt-2" data-async data-target="#create" id="productForm" enctype="multipart/form-data" action="{{ route('product.store') }}" novalidate_lpchecked="1" method="POST">
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
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="name" class="col-form-label s-12">product Name *</label>
              <input id="name" name="name" autofocus value="{{ old('name') }}" maxlength="50"
                 class="form-control r-0 light  @if($errors->first('name')) is-invalid  @endif "
                 required type="text"
              >
              @if($errors->any())
                <div class="invalid-feedback">
                  {{$errors->first('name')}}
                </div>
              @endif
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="sku" class="col-form-label s-12">product sku *</label>
              <input id="sku" name="sku" autofocus value="{{ old('sku') }}" maxlength="50"
                 class="form-control r-0 light  @if($errors->first('sku')) is-invalid  @endif "
                 required type="text"
              >
              @if($errors->any())
                <div class="invalid-feedback">
                  {{$errors->first('sku')}}
                </div>
              @endif
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="categories" class="col-form-label s-12"><strong>Categories *</strong><span class="pl-3">a project can have many categories. to select more than one, HOLD shift. if category is not available in the list, first create it</span></label>
              <select id="categories" class="select2 form-control" name="categories[]" multiple="multiple">
                @foreach($categories as $category)
                  @php
                      $select = false;
                      if ( old('categories') && in_array($category->id, old('categories')) ) {
                          $select = true;
                      }
                  @endphp
                  <option {{($select) ? 'selected' : '' }} value="{{$category->id}}"> {{ $category->title }} </option>
                @endforeach
              </select>
              @if($errors->any())
                  <div class="invalid-feedback">
                      {{$errors->first('categories')}}
                  </div>
              @endif
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="sub_categories" class="col-form-label s-12"><strong>Sub Categories *</strong><span class="pl-3">a project can have many categories. to select more than one, HOLD shift. if the sub category is not available in the list, first create it</span></label>
              <select id="sub_categories" class="select2 form-control" name="sub_categories[]" multiple="multiple">
                @foreach($sub_categories as $sub_category)
                  @php
                      $select = false;
                      if ( old('sub_categories') && in_array($sub_category->id, old('sub_categories')) ) {
                          $select = true;
                      }
                  @endphp
                  <option {{($select) ? 'selected' : '' }} value="{{$sub_category->id}}"> {{ $sub_category->title }} </option>
                @endforeach
              </select>
              @if($errors->any())
                <div class="invalid-feedback">
                    {{$errors->first('sub_categories')}}
                </div>
              @endif
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="unit_price" class="col-form-label s-12">Unit Price *</label>
              <input id="unit_price" name="unit_price" autofocus value="{{ old('unit_price') }}" maxlength="50"
                class="form-control r-0 light  @if($errors->first('unit_price')) is-invalid  @endif "
                required type="text"
              >
              @if($errors->any())
                <div class="invalid-feedback">
                  {{$errors->first('unit_price')}}
                </div>
              @endif
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="size" class="col-form-label s-12">Size *</label>
              <input id="size" name="size" autofocus value="{{ old('size') }}" maxlength="50"
                class="form-control r-0 light  @if($errors->first('size')) is-invalid  @endif "
                required type="number"
              >
              @if($errors->any())
                <div class="invalid-feedback">
                  {{$errors->first('size')}}
                </div>
              @endif
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="credit_price" class="col-form-label s-12">Credit Price *</label>
              <input id="credit_price" name="credit_price" autofocus value="{{ old('credit_price') }}" maxlength="50"
                class="form-control r-0 light  @if($errors->first('credit_price')) is-invalid  @endif "
                required type="text"
              >
              @if($errors->any())
                <div class="invalid-feedback">
                  {{$errors->first('credit_price')}}
                </div>
              @endif
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="quantity" class="col-form-label s-12">Quantity *</label>
              <input id="quantity" name="quantity" autofocus value="{{ old('quantity') }}" maxlength="50"
                class="form-control r-0 light  @if($errors->first('quantity')) is-invalid  @endif "
                required type="number"
              >
              @if($errors->any())
                <div class="invalid-feedback">
                  {{$errors->first('quantity')}}
                </div>
              @endif
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="stock" class="col-form-label s-12">Stock *</label>
              <input id="stock" name="stock" autofocus value="{{ old('stock') }}" maxlength="50"
                class="form-control r-0 light  @if($errors->first('stock')) is-invalid  @endif "
                required type="number"
              >
              @if($errors->any())
                <div class="invalid-feedback">
                  {{$errors->first('stock')}}
                </div>
              @endif
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
              <label for="description" class="col-form-label s-12">Description*</label>
              <textarea style="height: 145px;" name="description" 
                required class="textarea form-control  
                @if($errors->first('description')) 
                  is-invalid  
                @endif r-0" 
                id="summary-ckeditor"
                cols="10" 
                rows="9"
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

          <div class="form-row mt-1">
            <div class="form-group col-12 m-0">
              <label class="my-1 mr-2 pt-3" for="brand_id">Brand *</label>
              <select name="brand_id" required class="select2 my-1  form-control r-0 light " id="brand_id">
                  @foreach($brands as $id => $name)
                       <option value="{{$id}}">{{ $name }}</option>
                  @endforeach
              </select>
              @error('brand_id')
                <div class="invalid-feedback">
                    {{$message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="form-row mt-1">
            <div class="form-group col-12 m-0">
              <label class="my-1 mr-2 pt-3" for="color_id">Colors *</label>
              <select name="color_id" required class="select2 my-1  form-control r-0 light " id="color_id">
                  @foreach($colors as $id => $name)
                       <option value="{{$id}}">{{ $name }}</option>
                  @endforeach
              </select>
              @error('color_id')
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
              <label class="my-1 mr-2" for="active">Publish</label>
              <div class="material-switch">
                <input id="active" name="active" type="checkbox">
                <label for="active">Yes</label>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pt-4">
          <div class="row product-images">
            @error('product_avatar')
              <div class="invalid-feedback">
                  {{$message }}
              </div>
            @enderror
            <div class="col-md-12 product-avatar-up pl-0">
              <input  type="file" id="product_avatar" name="product_avatar"  onchange="setImage(this)";>
              <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="product-avatar-up">
                <div style="" class="dz-preview dropzone-previews"></div>
                <div class="dz-default dz-message">
                    <div>Upload Logo Image</div>
                    <div>Click to open file browser</div>
                </div>
              </div>
                @if(old('product_avatar'))
                    <img hidden style="background-color: #eee" class="text-center img-responsive" src="#" required class="form-control r-0 light s-12  @error('licensor_logo') is-invalid @enderror" />
                @endif
            @error('product_avatar')
            <div class="invalid-feedback">
                {{$message }}
            </div>
            @enderror
            <div class="col-md-12 col-lg-12 avatar-up pl-0">
              <input  type="file" id="avatar" name="avatar" onchange="setImage(this)";>
              <img src="" height="200" alt="Image preview...">
              <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="product-avatar-up">
                <div style="" class="dz-preview dropzone-previews"></div>
                <div class="dz-default dz-message">
                    <div>Upload Logo Image</div>
                    <div>Click to open file browser</div>
                </div>
              </div>
              @if(old('avatar'))
                  <img style="background-color: #eee" class="text-center img-responsive" src="#" required class="form-control r-0 light s-12  @error('avatar') is-invalid @enderror" />
              @endif
            </div>
            <div class="col-md-12 col-lg-12 avatar-up pl-0">
              <input  type="file" id="main_avatar" name="main_avatar" onchange="setImage(this)";>
              <img id="prevImage" style="display:none;" />
              <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="main-product-avatar-up">
                <div style="" class="dz-preview dropzone-previews"></div>
                <div class="dz-default dz-message">
                    <div>Upload Main Image</div>
                    <div>Click to open file browser</div>
                </div>
              </div>
              @if(old('main_avatar'))
                  <img  style="background-color: #eee" class="text-center img-responsive" src="#" required class="form-control r-0 light s-12  @error('licensor_logo') is-invalid @enderror" />
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="row pt-4">
        <div class="col-12">
          <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
 <script type="text/javascript">
  function previewFile() {
  var preview = document.querySelector('img');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}
</script>

<style type="text/css">
    #prevImage {
        border: 8px solid #ccc;
        width: 300px;
        height: 200px;
    }
</style>


