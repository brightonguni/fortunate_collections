@include('web.components.templates.blogs.partials.page.blog-page')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      @if(count($blogs) > 0)
        <div class="row p-3 m-3">
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="row">
              @foreach($blogs as $blog)
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 m-0 p-1">
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
                                    <li class="btn btn-outline-dark btn-sm p-1 m-1">{{ $department->name }}</li>
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
                                      <li class="btn btn-outline-dark btn-sm p-1 m-1">{{ $category->title }}</li>
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
              <div class="paginations text-right">
                <div class="row">
                  <div class="col-12 text-right">
                     <p style="padding: 10px;"> {{ $blogs->links() }}</p>
                  </div>
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
        @else
        <div class="card bg-dark-gray">
          <div class="card-body">
            <p> No Blog Posts Yet ....</p>
          </div>
        </div>
    @endif
    </div>
  </div>
</div>
    
   @if(count($faqs) > 0)
    @include('web._partials.FAQ._faq')  
  @endif