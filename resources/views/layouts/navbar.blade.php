@section('top-navbar')
    @parent
    <div class="navbar navbar-expand-md header-menu-one pb-4 mb-4  navbar-fixed-top">
        <div class="nav-bar-header-one">
          <div class="header-logo">
            <a href="{{url('/home')}}">
                <img src="{{asset('img/logo.svg')}}" alt="logo">
            </a>
          </div>
            <div class="toggle-button sidebar-toggle">
                <button 
                  type="button" 
                  class="item-link"
                >
                  <span class="btn-icon-wrap"></span>
                </button>
            </div>
        </div>
        <div 
          class="d-md-none 
          mobile-nav-bar"
        >
            <button 
              class="navbar-toggler pulse-animation" 
              type="button" 
              data-toggle="collapse" 
              data-target="#mobile-navbar" 
              aria-expanded="false"
            >
              <i 
                class="far fa-arrow-alt-circle-down"
              >
              </i>
            </button>
            <button 
              type="button" 
              class="navbar-toggler sidebar-toggle-mobile"
            >
              <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
        <ul class="navbar-nav"></ul>
            <ul 
              class="navbar-nav navbar-right"
            >
              <li 
                class="navbar-item dropdown header-admin"
              >
                <a 
                  class="navbar-nav-link dropdown-toggle" 
                  href="#" 
                  role="button" 
                  data-toggle="dropdown"
                  aria-expanded="false"
                >
                  <div class="admin-title">
                      <h5 
                        class="item-title"
                      >
                        {{ Auth::User()->name}}
                      </h5>
                      <span>{{ Auth::User()->role->name }}</span>
                  </div>
                  <div class="admin-img">
                      <img src="{{asset('img/figure/admin.jpg')}}" alt="Admin">
                  </div>
                </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="item-header">
                           <h6 class="item-title">{{ Auth::User()->name}}</h6>
                        </div>
                        <div class="item-content">
                            <ul class="settings-list">
                                <li>
                                  <a href="/users/{{Auth::User()->id}}">
                                    <i class="flaticon-user"></i>
                                      My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="flaticon-turn-off"></i> Logout
                                    </a>
                                    <form 
                                      id="logout-form" 
                                      action="{{ route('logout') }}" 
                                      method="POST" 
                                      style="display: none;"
                                    >
                                      {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
          
        </div>
    </div>
  
  @show

