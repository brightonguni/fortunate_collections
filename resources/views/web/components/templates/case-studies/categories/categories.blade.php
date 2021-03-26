<section id="blog-categories">
  <div class="card-body" style="padding-top: 20px;">
      <div class="row">
        @foreach($categories as $category)
          <div class="col-md-4">
            <div class="card-title">
              <div class="row">
                <div class="col-md-3">
                  <img class="card-img-top" src="asset('assets/images/blogs'.{{$category->logo}}" alt class="thumbnail">
                </div>
                <div class="col-md-9">
                   <h2 class="sub-title">{{ str_limit($category->title,'50')}}</h2>
                </div>
              </div>
            </div>
            <div class="card-description" style="height: 200px;">
              <p>{{ str_limit($category->description,'200') }}</p>
            </div>
            <div class="card-link text-center">
              <a class="card-text btn 
                  flaticon-more-button-interface-symbol-of-three-horizontal-aligned-dots 
                  btn-outline-primary"
                  href="{{ route('web_blog_category.show',['id' => $category->id]) }}">
                  Find Out More <span class="fa fa-angle-double-right"></span>
              </a>
            </div>
          </div>
        @endforeach
      </h2>
      <div class="card-link text-center">
           <a class="card-text btn flaticon-more-button-interface-symbol-of-three-horizontal-aligned-dots btn-outline-danger" href="{{ route('web_blog_category.show',['id' => $category->id]) }}">Find Out More <span class="fa fa-angle-double-right"></span></a>
      </div>
    </div>
</section>