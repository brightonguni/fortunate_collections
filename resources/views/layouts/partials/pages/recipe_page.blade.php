@if(in_array('recipe_page_list', $canDo)   || in_array('recipe_page_create', $canDo)  )
  <li class="nav-item sidebar-nav-item">
    <a href="{{route('recipe_page.index')}}" class="nav-link">
      <i class="flaticon-multiple-users-silhouette"></i>
      <span>Recipe Page</span>
    </a>
    <ul class="nav sub-group-menu">
      @if(in_array('recipe_page_list', $canDo))
        <li class="nav-item">
          <a href="{{route('recipe_page.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Recipe Page
          </a>
        </li>
      @endif
      @if(in_array('recipe_page_create', $canDo))
        <li class="nav-item">
          <a href="{{route('recipe_page.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Add New Racipe Page
          </a>
        </li>
      @endif
    </ul>
  </li>
@endif