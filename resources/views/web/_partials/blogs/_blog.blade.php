 @include('web.components.templates.blogs.partials.page.blog-page')
 @if(count($blogs) > 0)
  <div class="container-fluid">
    <div class="row p-2">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="latest-blogs text-left">
          <h2 class="latest-header text-center">
            {{ ('Latest Blogs') }}
          </h2>
        </div>
        <div class="row p-0 m-0">
          @foreach($blogs->take(3) as $blog)  
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 m-0 p-1">
              <a href="{{ route('web_blog.show',['id' => $blog->id])}}">
                <div class="card">
                  <div class="card-header bg-white">
                    <div class="blog-title pb-1 mb-1 guni-text-hover">
                      <h3 class="text-hover text-height">{{ str_limit($blog->title,'100') }}</h3>
                    </div>
                   <div class="blog-departments pt-2 pb-2">
                    <div class="font-medium text-dark-medium">
                      <ul class="list-inline">
                        @foreach($blog->departments as $department)
                            <li class="btn btn-sm btn-outline-dark btn-sm p-1 m-1">{{ $department->name }}</li>
                        @endforeach
                      </ul>
                    </div> 
                  </div>
                  </div>
                  <div class="card-body m-0 p-0">
                    <div class="blog-atavar img-hover-zoom">
                      <div class="card-image-blog-small" style="background-image: url('{{ asset('assets/images/blogs/'.$blog->avatar)}}');"></div>
                    </div>
                    <div class="blog-content p-2">
                      <div class="blog-departments pt-2 pb-2">
                        <div class="font-medium text-dark-medium">
                          <ul class="list-inline">
                            @foreach($blog->categories as $category)
                                <li class="btn btn-outline-dark btn-sm btn-sm p-1 m-1">{{ $category->title }}</li>
                            @endforeach
                          </ul>
                        </div> 
                      </div>
                      <div class="card-date p-1">
                        <h3 class="text-hover ">{{ $blog->created_at->diffForHumans()  }}</h3>
                      </div>
                      <div class="card-description p-1">
                        <p class="text-hover text-height">{{ str_limit($blog->description,'200') }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
        <div class="row">
          <div class="col-12 p-2 text-center">
            <div class="card-link">
              <a class="btn btn-lg  btn-outline-dark"
                href="{{ route('web_blog.index') }}"><strong>Read More Articles </strong>
                <span class="fa fa-angle-double-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif