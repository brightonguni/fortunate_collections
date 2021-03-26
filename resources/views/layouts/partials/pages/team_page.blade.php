@if(in_array('team_page_list', $canDo)   || in_array('team_page_create', $canDo)  )
  <li class="nav-item sidebar-nav-item">
    <a href="{{route('team_page.index')}}" class="nav-link">
      <i class="flaticon-multiple-users-silhouette"></i>
      <span>Team Page</span>
    </a>
    <ul class="nav sub-group-menu">
      @if(in_array('team_page_list', $canDo))
        <li class="nav-item">
          <a href="{{route('team_page.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Team Page
          </a>
        </li>
      @endif
      @if(in_array('team_page_create', $canDo))
        <li class="nav-item">
          <a href="{{route('team_page.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>
            Add New Team Page
          </a>
        </li>
      @endif
    </ul>
  </li>
@endif