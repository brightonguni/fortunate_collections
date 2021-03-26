@section('sidebar')
  @parent
    <div 
      class="
        sidebar-main 
        sidebar-menu-one 
        sidebar-expand-md 
        sidebar-color"
      >
        <div 
          class="mobile-sidebar-header d-md-none"
        >
          <div class="header-logo">
              <a href="index.html"><img src="{{asset('img/logo.svg')}}" alt="logo"></a>
          </div>
        </div>
        <div class="sidebar-menu-content">
          <ul class="nav nav-sidebar-menu sidebar-toggle-view">
            <li class="nav-item sidebar-nav-item">
              <a href="/" class="nav-link">
                <i class="flaticon-dashboard"></i>
                <span>Dashboard</span>
              </a>
            </li>
          @if(in_array('customer_list', $canDo)   || in_array('customer_create', $canDo) )
            <li class="nav-item sidebar-nav-item">
              <a href="#" class="nav-link">
                <i class="flaticon-classmates"></i>
                <span>Users</span>
              </a>
              <ul class="nav sub-group-menu">
                @if(in_array('customer_list', $canDo))
                  <li class="nav-item">
                    <a href="{{route('users.index')}}" 
                      class="nav-link">
                      <i class="fas fa-angle-right"></i>
                      All Users
                    </a>
                  </li>
                @endif
                @if(in_array('customer_create', $canDo))
                  <li class="nav-item">
                    <a href="/users/create" 
                      class="nav-link">
                      <i class="fas fa-angle-right"></i>
                      Add New user
                    </a>
                  </li>
                @endif
              </ul>
            </li>
          @endif

          <!-- services -->

          @if(in_array('service_list', $canDo)   || in_array('service_create', $canDo)  )
            <li class="nav-item sidebar-nav-item">
              <a href="{{route('service.index')}}" class="nav-link">
                <i class="flaticon-multiple-users-silhouette"></i>
                  <span>Services</span>
              </a>
              <ul class="nav sub-group-menu">
                @if(in_array('service_list', $canDo))
                  <li class="nav-item">
                    <a href="{{route('service.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                      Services
                    </a>
                  </li>
                @endif
                @if(in_array('service_create', $canDo))
                  <li class="nav-item">
                      <a href="{{route('service.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add New Service
                      </a>
                  </li>
                @endif
              </ul>
            </li>
          @endif

          @if(in_array('service_type_list', $canDo)   || in_array('service_type_create', $canDo)  )
            <li class="nav-item sidebar-nav-item">
              <a href="{{route('service_type.index')}}" class="nav-link">
                <i class="flaticon-multiple-users-silhouette"></i>
                  <span>Service Types</span>
              </a>
              <ul class="nav sub-group-menu">
                @if(in_array('service_type_list', $canDo))
                  <li class="nav-item">
                    <a href="{{route('service_type.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
                      Service Types
                    </a>
                  </li>
                @endif
                @if(in_array('service_type_create', $canDo))
                  <li class="nav-item">
                      <a href="{{route('service_type.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add New Service Type
                      </a>
                  </li>
                @endif
              </ul>
            </li>
          @endif

          @if(in_array('blog_list', $canDo)   || in_array('blog_create', $canDo)  )
            <li class="nav-item sidebar-nav-item">
              <a href="{{route('blog.index')}}" class="nav-link">
                <i class="flaticon-multiple-users-silhouette"></i>
                  <span>Blog News</span>
              </a>
              <ul class="nav sub-group-menu">
                @if(in_array('blog_list', $canDo))
                  <li class="nav-item">
                    <a href="{{route('blog.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                      Blogs
                    </a>
                  </li>
                @endif
                @if(in_array('blog_create', $canDo))
                  <li class="nav-item">
                      <a href="{{route('blog.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add New Blog
                      </a>
                  </li>
                @endif
              </ul>
            </li>
          @endif

          @if(in_array('blog_comment_list', $canDo)   || in_array('blog_comment_create', $canDo)  )
            <li class="nav-item sidebar-nav-item">
              <a href="{{route('blog_comment.index')}}" class="nav-link">
                <i class="flaticon-multiple-users-silhouette"></i>
                  <span>Blog Comments</span>
              </a>
              <ul class="nav sub-group-menu">
                @if(in_array('blog_comment_list', $canDo))
                  <li class="nav-item">
                    <a href="{{route('blog_comment.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                      Comments
                    </a>
                  </li>
                @endif
                @if(in_array('blog_comment_create', $canDo))
                  <li class="nav-item">
                      <a href="{{route('blog.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add New Blog
                      </a>
                  </li>
                @endif
              </ul>
            </li>
          @endif

          @if(in_array('blog_category_list', $canDo)   || in_array('blog_category_create', $canDo)  )
            <li class="nav-item sidebar-nav-item">
              <a href="{{route('blog_category.index')}}" class="nav-link">
                <i class="flaticon-multiple-users-silhouette"></i>
                  <span>Blog Categories</span>
              </a>
              <ul class="nav sub-group-menu">
                @if(in_array('blog_category_list', $canDo))
                  <li class="nav-item">
                    <a href="{{route('blog_category.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                      Blog Categories
                    </a>
                  </li>
                @endif
                @if(in_array('team_create', $canDo))
                  <li class="nav-item">
                      <a href="{{route('blog_category.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add New Blog Category
                      </a>
                  </li>
                @endif
              </ul>
            </li>
          @endif

          @if(in_array('booking_list', $canDo)   || in_array('booking_create', $canDo)  )
            <li class="nav-item sidebar-nav-item">
              <a href="{{route('booking.index')}}" class="nav-link">
                <i class="flaticon-multiple-users-silhouette"></i>
                  <span>Bookings</span>
              </a>
              <ul class="nav sub-group-menu">
                @if(in_array('booking_list', $canDo))
                  <li class="nav-item">
                    <a href="{{route('booking.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                      Bookings
                    </a>
                  </li>
                @endif
                @if(in_array('booking_create', $canDo))
                  <li class="nav-item">
                      <a href="{{route('booking.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add New Booking
                      </a>
                  </li>
                @endif
              </ul>
            </li>
          @endif


          @if(in_array('event_list', $canDo)   || in_array('event_create', $canDo)  )
            <li class="nav-item sidebar-nav-item">
              <a href="{{route('event.index')}}" class="nav-link">
                <i class="flaticon-multiple-users-silhouette"></i>
                  <span>Events</span>
              </a>
              <ul class="nav sub-group-menu">
                @if(in_array('event_list', $canDo))
                  <li class="nav-item">
                    <a href="{{route('event.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                      Events
                    </a>
                  </li>
                @endif
                @if(in_array('event_create', $canDo))
                  <li class="nav-item">
                      <a href="{{route('event.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add New Event
                      </a>
                  </li>
                @endif
              </ul>
            </li>
          @endif

           @if(in_array('venue_list', $canDo)   || in_array('venue_create', $canDo)  )
            <li class="nav-item sidebar-nav-item">
              <a href="{{route('venue.index')}}" class="nav-link">
                <i class="flaticon-multiple-users-silhouette"></i>
                  <span>Venues</span>
              </a>
              <ul class="nav sub-group-menu">
                @if(in_array('event_list', $canDo))
                  <li class="nav-item">
                    <a href="{{route('venue.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                      Venues
                    </a>
                  </li>
                @endif
                @if(in_array('venue_create', $canDo))
                  <li class="nav-item">
                      <a href="{{route('venue.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add New Event
                      </a>
                  </li>
                @endif
              </ul>
            </li>
          @endif

          <!-- Create Business / Stores -->

          @if(in_array('store_list', $canDo)   || in_array('store_create', $canDo)  )
            <li class="nav-item sidebar-nav-item">
              <a href="#" class="nav-link"><i
                class="flaticon-multiple-users-silhouette"></i><span>Stores(Busineses)</span></a>
              <ul class="nav sub-group-menu">
                @if(in_array('store_list', $canDo))
                <li class="nav-item">
                    <a href="{{route('store.index')}}" class="nav-link">
                      <i class="fas fa-angle-right"></i>
                      All Stores / Businesses)
                    </a>
                </li>
                @endif
                @if(in_array('store_create', $canDo))
                <li class="nav-item">
                    <a href="/stores/create" class="nav-link"><i class="fas fa-angle-right"></i>Add New
                        Store</a>
                </li>
                @endif
              </ul>
            </li>
          @endif

          <!-- Projects -->

          @if(in_array('project_list', $canDo)   || in_array('project_create', $canDo)  )
            <li class="nav-item sidebar-nav-item">
              <a href="#" class="nav-link">
                <i class="flaticon-multiple-users-silhouette"></i>
                  <span>Projects</span>
              </a>
              <ul class="nav sub-group-menu">
                @if(in_array('project_list', $canDo))
                  <li class="nav-item">
                    <a href="{{route('projects.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                      Projects
                    </a>
                  </li>
                @endif
                @if(in_array('project_create', $canDo))
                <li class="nav-item">
                  <a href="{{route('projects.create')}}" class="nav-link"><i class="fas fa-angle-right"></i>
                    Add New Project
                  </a>
                </li>
                @endif
              </ul>
            </li>
          @endif

            <!-- departments -->

          @if(in_array('department_list', $canDo)   || in_array('department_create', $canDo)  )
            <li class="nav-item sidebar-nav-item">
              <a href="#" class="nav-link">
                <i class="flaticon-multiple-users-silhouette"></i>
                <span>Departments</span>
              </a>
              <ul class="nav sub-group-menu">
                @if(in_array('department_list', $canDo))
                  <li class="nav-item">
                    <a href="{{route('departments.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
                      All Departments
                    </a>
                  </li>
                @endif
                @if(in_array('department_create', $canDo))
                  <li class="nav-item">
                    <a href="/departments/create" class="nav-link"><i class="fas fa-angle-right">
                      </i> New department</i>
                    </a>
                  </li>
                @endif
              </ul>
            </li>
          @endif

          <!-- employee -->

          @if(in_array('employee_list', $canDo)   || in_array('employee_create', $canDo)  )
            <li class="nav-item sidebar-nav-item">
              <a href="#" class="nav-link">
                <i class="flaticon-multiple-users-silhouette"></i>
                <span>Employees</span>
              </a>
              <ul class="nav sub-group-menu">
                @if(in_array('employee_list', $canDo))
                  <li class="nav-item">
                    <a href="{{route('employees.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>
                      All Employees
                    </a>
                  </li>
                @endif
                @if(in_array('employee_create', $canDo))
                  <li class="nav-item">
                    <a href="/employees/create" class="nav-link"><i class="fas fa-angle-right">
                      </i> New employee</i>
                    </a>
                  </li>
                @endif
              </ul>
            </li>
          @endif

          <!-- Roles and Permissions -->
          @if(in_array('parmission_list', $canDo)   || in_array('permission_create', $canDo)  )
            <li class="nav-item sidebar-nav-item">
              <a href="#" class="nav-link"><i
                class="flaticon-multiple-users-silhouette"></i><span>Permissions</span></a>
                <ul class="nav sub-group-menu">
                  @if(in_array('permission_list', $canDo))
                    <li class="nav-item">
                      <a href="{{route('permissions.index')}}" 
                        class="nav-link">
                        <i class="fas fa-angle-right"></i>
                        All Permissions
                      </a>
                    </li>
                  @endif
                  @if(in_array('permission_create', $canDo))
                  <li class="nav-item">
                    <a href="/permissions/create" class="nav-link">
                      <i class="fas fa-angle-right"></i>
                      Create Permission
                    </a>
                  </li>
                  @endif
                </ul>
              </li>
            @endif

            <!-- notifications -->
            @if(in_array('notification_list', $canDo)   || in_array('notification_create', $canDo)  )
              <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i
                  class="flaticon-multiple-users-silhouette"></i>
                  <span>Notifications</span>
                </a>
                <ul class="nav sub-group-menu">
                  @if(in_array('notification_list', $canDo))
                    <li class="nav-item">
                      <a href="" class="nav-link"><i class="fas fa-angle-right"></i>All
                        Notifications
                      </a>
                    </li>
                  @endif
                </ul>
              </li>
            @endif

             <!-- pages -->
          
            <li class="nav-item sidebar-nav-item">
              <a href="#" class="nav-link"><i
                class="flaticon-multiple-users-silhouette"></i><span>Pages</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                      <a href="{{route('home.index')}}" 
                        class="nav-link">
                        <i class="fas fa-angle-right"></i>
                        Home
                      </a>
                    </li>
                  
                  <li class="nav-item">
                    <a href="{{route('service.index')}}" class="nav-link">
                      <i class="fas fa-angle-right"></i>
                      Services
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-angle-right"></i>
                      About US
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-angle-right"></i>
                      Contact Us
                    </a>
                  </li>
                </ul>
              </li>
          </ul>   
        </div>
    </div>
  @show

