@if(in_array('product_page_list', $canDo)   || in_array('product_page_create', $canDo)  )
  <li class="nav-item sidebar-nav-item">
    <a href="{{route('product_page.index')}}" class="nav-link">
      <i class="flaticon-multiple-users-silhouette"></i>
      <span>Product Page</span>
    </a>
    <ul class="nav sub-group-menu">
      @if(in_array('product_page_list', $canDo))
        <li class="nav-item">
          <a href="{{route('product_page.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Product Page
          </a>
        </li>
      @endif
      @if(in_array('product_page_create', $canDo))
        <li class="nav-item">
          <a href="{{route('product_page.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Add New Product Page
          </a>
        </li>
      @endif
    </ul>
  </li>
@endif