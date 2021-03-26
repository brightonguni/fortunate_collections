@if($blog)
  <div class="blog-content pt-4 mt-4" id="blog">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card pt-2">
              <div class="card-body">
                <div class="blog-title">
                  <h2 class="text-hover">{{ $blog->title }}</h2>
                </div>
                <div class="blog-departments pt-5 pb-2">
                  <div class="font-medium text-dark-medium">
                    <ul class="list-inline">
                      @foreach($blog->departments as $department)
                          <li class="btn bg-gradient-twitter btn-sm p-1 m-1">{{ $department->name }}</li>
                      @endforeach
                    </ul>
                  </div> 
                </div>
                <div class="blog-atavar">
                  <div class="card-image-blog-large" style="background-image: url('{{ asset('assets/images/blogs/'.$blog->avatar)}}');"></div>
                </div>        
                <div class="blog-departments pt-5 pb-2">
                  <div class="font-medium text-dark-medium">
                    <ul class="list-inline">
                      @foreach($blog->categories as $category)
                          <li class="btn gradient-dodger-green btn-sm p-1 m-1">{{ $category->title }}</li>
                      @endforeach
                    </ul>
                  </div> 
                </div>
                <div class="card-date">
                  <h4 class="blog-date text-hover">{{ $blog->created_at->diffForHumans()  }}</h4>
                </div>
                <div class="card-description">
                  <p class="text-hover">{{ $blog->description }}</p>
                </div>
                <div class="card-link text-right">
                  <a class="card-link-text btn btn-lg gradient-pastel-green text-center" 
                    href="{{ route('web_blog_comment.comment',['id' => $blog->id])}}">
                    comment 
                    <span class="fa fa-comment"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              @include('web.components.templates.blogs.Comments.comments')
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('web.components.templates.blogs.partials.categories')
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('web.components.templates.blogs.partials.latest-articles')
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
@include('web._partials.blogs._blog')
