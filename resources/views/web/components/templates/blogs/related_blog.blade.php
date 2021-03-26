
@if($relatedBlog)
<section id="blog" class="bg-light">
  <div class="container">
    <div class="row">
      @foreach($relatedBlog as $related)  
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 m-0 p-1">
              <a href="{{ route('web_blog.show',['id' => $blog->id])}}">
                <div class="card">
                  <div class="card-header bg-white">
                    <div class="blog-title pb-1 mb-1 guni-text-hover">
                      <h3 class="text-hover text-height">{{ str_limit($blog->title,'100') }}</h3>
                    </div>
                   <div class="blog-departments pt-2 pb-2">
                    <div class="font-medium text-dark-medium">
                      <ul class="list-inline">
                        <li>Departments:</li>
                        @foreach($blog->departments as $department)
                            <li class="btn bg-gradient-twitter btn-sm p-1 m-1">{{ $department->name }}</li>
                        @endforeach
                      </ul>
                    </div> 
                  </div>
                  </div>
                  <div class="card-body m-0 p-0">
                    <div class="blog-atavar img-hover-zoom">
                      <div class="card-image-small" style="background-image: url('{{ asset('assets/images/blogs/'.$blog->avatar)}}');"></div>
                    </div>
                    <div class="blog-content p-2">
                     <div class="blog-departments pt-2 pb-2">
                        <div class="font-medium text-dark-medium">
                          <ul class="list-inline">
                            <li>Categories</li>
                            @foreach($blog->categories as $category)
                                <li class="btn gradient-dodger-green btn-sm p-1 m-1">{{ $category->title }}</li>
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
  </div>
  </section>
@endif