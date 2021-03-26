

<div  class="container-fluid p-2 m-2">
  <div class="row">
    @foreach($categories as $category)
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 p-1">
        <a href="{{ route('web_blog_category.show',['id' => $category->id]) }}">
          <div class="card m-1 p-1">
            <div class="card-body m-0 p-0">
              <div class="service-content-wrap p-1">
                <div class="service-title">
                  <h3 class="service-title text-capitalize pt-3 pl-md-3"><strong>{{ str_limit($category->title,'80') }}</strong></h3>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="service-description pt-0 text-left ml-3" style= "height: 150px;">
                      <p class="text-hover text-height">{{ str_limit($category->description ,'150') }}</p>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="blog-image card-img-top text-center">
                      <img class=" service-image img-fluid img-responsive img-circle" 
                        style="width: 50px; height: 50px; border-radius: 25px;" 
                        src="{{URL::asset('assets/images/blogs/category/'.$category->avatar)}}" alt=""
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
  {{-- <div class="card-link text-center pb-5 mb-5">
    <a class="btn  gradient-pastel-green btn-lg" 
      href="{{ route('web_blog_category.show',['id' => $category->id]) }}">
      Find Out More 
      <span class="fa fa-angle-double-right"></span>
    </a>
  </div> --}}
</div>

@include('web._partials.blogs._blog')