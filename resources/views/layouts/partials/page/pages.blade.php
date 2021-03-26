@if(in_array('page_page_list', $canDo)   || in_array('page_page_create', $canDo)  )
  <li class="nav-item sidebar-nav-item">
    <a href="{{route('blog_page.index')}}" class="nav-link">
      <i class="flaticon-multiple-users-silhouette"></i>
      <span>Pages</span>
    </a>
    <ul class="nav sub-group-menu">
      @if(in_array('page_page_list', $canDo))
        <li class="nav-item">
          <a href="{{route('page_page.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Page
          </a>
        </li>
      @endif
      @if(in_array('page_page_create', $canDo))
        <li class="nav-item">
          <a href="{{route('page_page.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Add Page
          </a>
        </li>
      @endif
    </ul>
  </li>
@endif