@if($blogs)
  <div class="card-header">
    <h3 class="text-hover text-hover">Latest Blogs</h3>
  </div>
  @foreach($blogs->take(6) as $blog)
    <a href="{{ route('web_blog.show',['id' => $blog->id]) }}">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
          <div class="card pb-2">
            <div class="card-body">
              <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-md-12 col-lg-12 text-center">
                      <img class ="blog-image img-responsive img-thumbnail m-0 p-0 w-100"style="height: 100px; width: 100%;" 
                        src="{{ URL::asset('assets/images/blogs/'.$blog->avatar) }}"
                         alt="{{ $blog->avatar }}"
                      >
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-1 m-1">
                      <div class="widget-sidebar-content p-1">
                        <h3 class="blog-name m-0 p-0 text-hover text-height"><strong><small>{{ str_limit($blog->title,'60')}}</small></strong></h3>
                        <p class="side-description pb-0 text-hover text-height">
                          <small>{{ str_limit($blog->description,'100') }}</small>
                        </p>
                        <h3 class="text-hover p-0 m-0">{{ $blog->created_at->diffForHumans()}}</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  @endforeach
@endif