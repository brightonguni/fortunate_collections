@if(in_array('package_page_list', $canDo)   || in_array('package_page_create', $canDo)  )
  <li class="nav-item sidebar-nav-item">
    <a href="{{route('package_page.index')}}" class="nav-link">
      <i class="flaticon-multiple-users-silhouette"></i>
      <span>Package Page</span>
    </a>
    <ul class="nav sub-group-menu">
      @if(in_array('package_page_list', $canDo))
        <li class="nav-item">
          <a href="{{route('package_page.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Package Page
          </a>
        </li>
      @endif
      @if(in_array('package_page_create', $canDo))
        <li class="nav-item">
          <a href="{{route('package_page.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Add New Package Page
          </a>
        </li>
      @endif
    </ul>
  </li>
@endif