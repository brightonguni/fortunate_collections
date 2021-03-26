@if(in_array('project_category_page_list', $canDo)   || in_array('project_category_page_create', $canDo)  )
  <li class="nav-item sidebar-nav-item">
    <a href="{{route('project_category_page.index')}}" class="nav-link">
      <i class="flaticon-multiple-users-silhouette"></i>
      <span>Project Category Page</span>
    </a>
    <ul class="nav sub-group-menu">
      @if(in_array('project_category_page_list', $canDo))
        <li class="nav-item">
          <a href="{{route('project_category_page.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Project Category Page
          </a>
        </li>
      @endif
      @if(in_array('project_category_page_create', $canDo))
        <li class="nav-item">
          <a href="{{route('project_category_page.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Add New Project Category Page
          </a>
        </li>
      @endif
    </ul>
  </li>
@endif