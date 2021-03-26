
 <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-5">
      @if($sub_categories)
        <div class="row ml-2">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row category-content-wrapper pt-2">
              @foreach($sub_categories as $category)  
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 p-1">
                  <a href="{{ route('web_product_sub_category.show',['id' => $category->id]) }}">
                    <div class="card m-1 p-1">
                      <div class="card-body m-0 p-0">
                        <div class="category-content-wrap p-1">
                          <div class="category-title">
                            <h3 class="category-title text-capitalize pt-3 pl-md-3"><strong>{{ str_limit($category->title,'80') }}</strong></h3>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                              <div class="category-description pt-0 text-left ml-3" style= "height: 150px;">
                                <p class="text-hover text-height">{{ str_limit($category->description ,'150') }}</p>
                              </div>
                              <div class="category-title">
                                <h3 class="category-title text-capitalize pt-3 pl-md-3"><strong>{{ str_limit($category->category->title,'80') }}</strong></h3>
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                              <div class="blog-image card-img-top text-center">
                                <img class=" category-image img-fluid img-responsive img-circle" 
                                  style="width: 50px; height: 50px; border-radius: 25px;" 
                                  src="{{URL::asset('assets/images/products/sub-category/'.$category->avatar)}}" alt=""
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
@include('web._partials.blogs._blog')
