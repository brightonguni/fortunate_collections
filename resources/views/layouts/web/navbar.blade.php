<nav class="navbar-default navbar navbar-expand-md navbar-light fixed-top" id="mainNav">
  <div class="container-fluid">
    <a href="{{url('/home')}}" class="navbar-brand">
        <img src="{{URL::asset('assets/images/store/logo/logo.png')}}"   alt="">
    </a> 
    <button class="navbar-toggler navbar-toggler-right pulse-animation bg-olive" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars  fa fa-bars" style="color: #fff; padding: 20px; font-size: 30px;"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="active"><a href="{{ route('home.index') }}">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('web_service.index') }}">Services</a></li>
            <li role="separator" class="divider p-3"></li>
            <li><a href="{{ route('web_service_category.index') }}">Categories</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('web_product.index') }}">Products</a></li>
            <li role="separator" class="divider p-3"></li>
            <li><a href="{{ route('web_product_category.index') }}">Product Categories</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('web_project.index') }}">Projects</a></li>
            <li role="separator" class="divider p-3"></li>
            <li><a href="{{ route('web_project_category.index') }}">Project Categories</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
        <li><a href="{{ route('web_package.index') }}">Packages</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('web_blog.index') }}">Blog</a></li>
            <li role="separator" class="divider p-3"></li>
            <li><a href="{{ route('web_blog_category.index') }}">Blog categories</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
        <li><a href="{{ route('web_faq.index') }}">FAQs</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('web_about_us.index') }}">About</a></li>
            <li role="separator" class="divider p-3"></li>
            <li><a href="{{ route('web_employee.index') }}">Team</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
        <li><a href="{{ route('web_contact_us.index') }}">Contact</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sign In <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('login') }}">LogIn</a></li>
            <li role="separator" class="divider p-3"></li>
            <li><a href="{{ route('register') }}">Create Account</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse --> 
  </div><!-- /.container-fluid -->
</nav>


