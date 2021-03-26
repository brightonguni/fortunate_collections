@if(in_array('service_category_page_list', $canDo) || in_array('service_category_page_create', $canDo) )
  <li class="nav-item sidebar-nav-item">
    <a href="{{route('service_category_page.index')}}" class="nav-link">
      <i class="flaticon-multiple-users-silhouette"></i>
      <span>Service Category Page</span>
    </a>
    <ul class="nav sub-group-menu">
      @if(in_array('service_category_page_list', $canDo))
        <li class="nav-item">
          <a href="{{route('service_category_page.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Service Category Page
          </a>
        </li>
      @endif
      @if(in_array('service_category_page_create', $canDo))
        <li class="nav-item">
          <a href="{{route('service_category_page.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Add New Service Category Page
          </a>
        </li>
      @endif
    </ul>
  </li>
@endif