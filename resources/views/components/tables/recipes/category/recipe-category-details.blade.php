<div class="single-info-details pt-5">
  <div class="item-img">
    <img style="padding-right: 15px;" 
        src="{{asset('assets/images/recipes/category/'.$recipe_category->avatar)}}" 
        alt="no recipe image"
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $recipe_category->title }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('recipe_category_update', $canDo))
              <li><a href="/recipe-category/{{ $recipe_category->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('recipe_category_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$recipe_category->id}}" 
                  data-toggle="modal" 
                  data-target="#delete"
                >
                  <i class="fas fa-trash-alt"></i>
                </a>
              </li>
            @endif
          </ul>
        </ul>
      </div>
    </div>
    <div class="info-table table-responsive">
      <table class="table text-nowrap">
        <tbody>
          <tr>
            <td>ID No:</td>
            <td class="font-medium text-dark-medium">{{ $recipe_category->id }}</td>
          </tr>
          <tr>
            <td>recipe Title:</td>
            <td class="font-medium text-dark-medium">{{ $recipe_category->title }}</td>
          </tr>
          <tr>
            <td>Skill Description:</td>
            <td class="font-medium text-dark-medium">{{ $recipe_category->description }}</td>
          </tr>
          
          <tr>
            <td>Created Date:</td>
            <td class="font-medium text-dark-medium">{{ $recipe_category->created_at->format('d F Y H:i') }}</td>
          </tr>
          
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $recipe_category->active }}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
