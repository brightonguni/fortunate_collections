@if(in_array('service_page_list', $canDo)   || in_array('service_page_create', $canDo)  )
  <li class="nav-item sidebar-nav-item">
    <a href="{{route('service_page.index')}}" class="nav-link">
      <i class="flaticon-multiple-users-silhouette"></i>
      <span>Service Page</span>
    </a>
    <ul class="nav sub-group-menu">
      @if(in_array('service_page_list', $canDo))
        <li class="nav-item">
          <a href="{{route('service_page.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Service Page
          </a>
        </li>
      @endif
      @if(in_array('service_page_create', $canDo))
        <li class="nav-item">
          <a href="{{route('service_page.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Add New service Page
          </a>
        </li>
      @endif
    </ul>
  </li>
@endif