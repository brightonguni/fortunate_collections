@if($package_categories)
  <div class="card-header">
    <h3 class="text-hover">Package Categories</h3>
  </div>
  @foreach($package_categories->take(4) as $category)
    <a href="{{ route('web_blog_category.show',['id' => $category->id]) }}">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
          <div class="card pb-2">
            <div class="card-body">
              <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-md-12 col-lg-12 text-center">
                      <img class ="category-image img-responsive img-thumbnail m-0 p-0 w-100"style="height: 100px; width: 100%;" 
                        src="{{ URL::asset('assets/images/packages/category/'.$category->avatar) }}"
                         alt="{{ $category->avatar }}"
                      >
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-1 m-1">
                      <div class="widget-sidebar-content p-1">
                        <h3 class="category-name m-0 p-0 text-hover text-height"><strong><small>{{ $category->title }}</small></strong></h3>
                        <p class="side-description pb-0 text-hover text-height">
                          <small>{{ str_limit($category->description,'100') }}</small>
                        </p>
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
  <div class="row pt-1 pb-2">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <a class="btn btn-md btn-outline-dark btn-block" href="{{ route('web_package_category.index') }}">Find Out More</a>
    </div>
  </div>
@endif