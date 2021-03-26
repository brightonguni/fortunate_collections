<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
  <div class="item-img">
   <img style="padding-right: 15px;" 
        src="{{URL::asset('assets/images/recipes/'.$recipe->avatar)}}" 
        alt="no recipe image"
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $recipe->name }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('recipe_update', $canDo))
              <li><a href="/recipe/{{ $recipe->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('recipe_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$recipe->id}}" 
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
            <td class="font-medium text-dark-medium">{{ $recipe->id }}</td>
          </tr>
          <tr>
            <td>recipe Title:</td>
            <td class="font-medium text-dark-medium">{{ $recipe->title }}</td>
          </tr>
          <tr>
            <td class="btn btn-sm btn-outline-dark btn-sm p-1 m-1">$recipe->category->title</td>
          </tr>
          {{-- <tr>
            <td>Categories</td>
            <td>
              <ul>
                @foreach($recipe->categories as $category)
                <li class="btn bg-gradient-twitter btn-sm p-1 m-1">{{ $category->title }}</li>
                @endforeach
              </ul>
            </td>
          </tr> --}}
          <tr>
            <td>Description:</td>
            <td class="font-medium text-dark-medium">{{ $recipe->description }}</td>
          </tr>
          
          <tr>
            <td>Created Date:</td>
            <td class="font-medium text-dark-medium">{{ $recipe->created_at->format('d F Y H:i') }}</td>
          </tr>
          
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $recipe->active }}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Skill Single Info Details Table Area End Here   -->
