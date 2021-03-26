
<div class="card height-auto" id="index-card">
  <div class="card-body">
    <form class="pt-2"  id="editRecipeIngredientForm" action="{{route('recipe_ingredient.update',['id' =>$recipe_ingredient->id])}}"  
      method="POST" enctype="multipart/form-data" novalidate _lpchecked="1">
      @csrf
      <input type="text" name="recipe_ingredient_id" value="{{ $recipe_ingredient->id }}" hidden="hidden">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pt-4">
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
          <div class="form-row mt-1">
            <div class="form-group col-12 m-0">
              <label class="my-1 mr-2 pt-3" for="recipe_id">Recipes * <span class="ml-3"> {{ $recipe_ingredient->recipe->name }}</span></label>
              <select name="recipe_id" required class="select2 my-1  form-control r-0 light " id="recipe_id">
                <option value="{{ $recipe_ingredient->recipe->name }}">{{ $recipe_ingredient->recipe->name }}</option>
                @foreach($recipes as $id => $name)
                  <option value="{{$id}}">{{ $name }}</option>
                @endforeach
              </select>
              @error('recipe_id')
                <div class="invalid-feedback">
                    {{$message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="form-row mt-1">
            <div class="form-group col-12 m-0">
              <label class="my-1 mr-2 pt-3" for="licensor_id">Licensor * <span class="ml-3"> {{ $recipe_ingredient->licensor->name }}</span></label>
              <select name="licensor_id" required class="select2 my-1  form-control r-0 light " id="licensor_id">
                <option value="{{ $recipe_ingredient->licensor->name }}">{{ $recipe_ingredient->licensor->name }}</option>
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

          <div class="form-row mt-1">
            <div class="form-group col-12 m-0">
                <label class="my-1 mr-2 pt-3" for="licensor_id">Store * <span class="ml-3"> {{ $recipe_ingredient->store->name }}</span></label>
                <select name="store_id" required class="select2 my-1  form-control r-0 light " id="store_id">
                   <option value="{{ $recipe_ingredient->store->name }}">{{ $recipe_ingredient->store->name }}</option> 
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

          <div class="form-row">
            <div class="form-group col-12 m-0 pt-3">
                <label for="description" class="col-form-label s-12">Description *</label>
                <textarea style="height: 145px;" required class="textarea form-control 
                   @if($errors->first('description')) 
                    is-invalid  
                  @endif r-0" 
                  name="description" id="summary-ckeditor"cols="10" rows="9"
                >{{ $recipe_ingredient->description }}</textarea>
                @if($errors->any())
                    <div class="invalid-feedback">{{$errors->first('description')}}</div>
                @endif
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
        
          <div class="row">
            <div class="col-12">
              <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">
                Save
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>


     





    