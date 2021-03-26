@extends('layouts.app')
@section('content')

  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Manage Blog Articles</h3>
    <ul>
      <li>
          <a href="{{ route('blog.index') }}">All Blog Articles</a>
      </li>
       <li>
          <a href="{{ route('blog.create') }}">Create Articles</a>
      </li>
      <li>Articles</li>
      <li>
          <a href="{{ route('blog_category.index') }}">Categories</a>
      </li>
      <li>
          <a href="{{ route('blog_category.create') }}">Create Category</a>
      </li>
    </ul>
  </div>
    <!-- Breadcubs Area End Here -->
    <!-- Dashboard summery Start Here -->
  <div class="row gutters-20">
    <div class="col-md-3">
      <div class="dashboard-summery-one mg-b-20">
        <div class="row align-items-center">
          <div class="col-6">
            <div class="item-icon bg-light-green ">
              <i class="fas fa-snowboarding fa-4x text-green"></i>
            </div>
          </div>
          <div class="col-6">
            <div class="item-content">
              <div class="item-title">Active</div>
                <div class="item-number">
                  <span 
                    class="counter" 
                    data-num="{{ $statistics->active }}"
                  >
                    {{ $statistics->active }}
                  </span>  
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-md-3">
      <div class="dashboard-summery-one mg-b-20">
        <div class="row align-items-center">
            <div class="col-6">
              <div class="item-icon bg-light-blue">
                <i class="fas text-blue fa-4x fa-spinner"></i>
              </div>
            </div>
            <div class="col-6">
              <div class="item-content">
                <div class="item-title">Pending</div>
                <div class="item-number"><span class="counter" data-num="{{ $statistics->unverified }}">{{ $statistics->unverified }}</span></div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="dashboard-summery-one mg-b-20">
        <div class="row align-items-center">
          <div class="col-6">
            <div class="item-icon bg-light-yellow">
              <i class="fas text-orange fa-4x fa-ban"></i>
            </div>
          </div>
          <div class="col-6">
            <div class="item-content">
              <div class="item-title">Suspended</div>
              <div class="item-number">
                <span 
                  class="counter" 
                  data-num="{{$statistics->blocked }}"
                >
                  {{ $statistics->blocked}}
                </span> 
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
      <div class="dashboard-summery-one mg-b-20">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="item-icon bg-light-red">
                    <i class="fas fa-asterisk fa-4x text-red"></i>
                </div>
            </div>
            <div class="col-6">
                <div class="item-content">
                    <div class="item-title">Total</div>
                 <div class="item-number"><span class="counter" data-num="{{ $statistics->total }}">{{ $statistics->total }}</span></div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  
  @if(session()->has('permission_error'))
    <div 
      class="alert alert-danger"
    >
      {{ session()->get('permission_error') }}
    </div>
  @endif
  <!-- Dashboard summery End Here -->
  <!-- Dashboard Content Start Here -->
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-0">
          <div class="border-nav-tab">
            <ul class="nav nav-tabs" role="tablist">
              @if( in_array('blog_list', $canDo) )
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#blog-list" role="tab" aria-selected="true">All Blog Articles</a>
                </li>
               @endif
               @if( in_array('blog_create', $canDo) )
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#create-blog" role="tab" aria-selected="true">Create Blog</a>
                </li>
               @endif
              @if( in_array('blog_category_list', $canDo) )
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#blog-category-list" role="tab" aria-selected="false">Blog Categories</a>
                </li>
              @endif
              @if( in_array('blog_category_create', $canDo) )
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#blog-category-create" role="tab" aria-selected="false">Create Blog Category</a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-content">
    <div class="tab-pane fade" id="blog-list" role="tabpanel">
      <div class="row gutters-20">
        <div class="col-12 col-xl-12 col-12-xxxl">
          @component('components.tables.blogs.blogs',['blogs' => $blogs, 'canDo'=> $canDo,'comments'=> $comments, 'categories' => $categories, 'statistics' => $statistics])
            blog-table Component
          @endcomponent
        </div>
      </div>
    </div>

    <div class="tab-pane fade" id="create-blog" role="tabpanel">
      <div class="row gutters-20">
        <div class="col-12 col-xl-12 col-12-xxxl">
          @component('components.forms.blogs.create',[ 'departments'=>$departments,'stores'=>$stores,'licensors'=>$licensors,'categories' => $categories, 'canDo' =>$canDo ])
            Blog Create Form Component
          @endcomponent
        </div>
      </div>
    </div>
    
    <div class="tab-pane fade" id="blog-category-create" role="tabpanel">
      <div class="row gutters-20">
        <div class="col-12 col-xl-12 col-12-xxxl">
          @component('components.forms.blogs.categories.create',[ 'licensors' => $licensors, 'stores' => $stores,'statistics' => $statistics])
              Blog-Category Create Form Component
          @endcomponent
        </div>
      </div>
    </div>

    <div class="tab-pane fade show active" id="blog-category-list" role="tabpanel">
      <div class="row gutters-20">
        <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
          @component('components.tables.blogs.categories.categories',[ 'canDo' => $canDo ,'statistics' => $statistics,'categories' => $categories])
            blog-categories-table Component
          @endcomponent
        </div>
      </div>
    </div>
  </div>
@endsection
