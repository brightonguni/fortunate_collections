@if(in_array('blog_category_page_list', $canDo)   || in_array('blog_category_page_create', $canDo)  )
  <li class="nav-item sidebar-nav-item">
    <a href="{{route('blog_category_page.index')}}" class="nav-link">
      <i class="flaticon-multiple-users-silhouette"></i>
      <span>Blog Category Page</span>
    </a>
    <ul class="nav sub-group-menu">
      @if(in_array('blog_category_page_list', $canDo))
        <li class="nav-item">
          <a href="{{route('blog_category_page.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Blog Category Page
          </a>
        </li>
      @endif
      @if(in_array('blog_category_page_create', $canDo))
        <li class="nav-item">
          <a href="{{route('blog_category_page.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Add New Blog Category Page
          </a>
        </li>
      @endif
    </ul>
  </li>
@endif