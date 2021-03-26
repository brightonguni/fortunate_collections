@include('web.components.templates.FAQ.partials.page.faq-page')
<section id="blog-categories" style="padding-top: 20px;">
  <div class="card">
    <div class="card-body">
      <div class="row">
        @foreach($faq_categories as $category)
          <div class="col-md-4 col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2 col-lg-2">
                    <div class="card-image">
                      <img class="card-image-small" src="asset('assets/images/faqs/category/'.{{$category->logo}}" alt class="thumbnail">
                    </div>
                  </div>
                  <div class="col-md-10 col-lg-10">
                    <div class="card-title-small">
                     <h2>{{ str_limit($category->title,'15')}}</h2>
                    </div>
                  </div>
                </div>
                <div class="card-description">
                  <p>
                    {{ str_limit($category->description,'200') }}
                  </p>
                </div>
                <div class="card-link text-center">
                  <a class="card-text btn btn-oultine-light"
                      href="{{ route('web_faq_category.show',['id' => $category->id]) }}">
                      Find Out More <span class="fa fa-angle-double-right"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="card-link text-center">
         <a class="card-text btn  btn-outline-light btn-lg" href="{{ route('web_faq_category.show',['id' => $category->id]) }}">Find Out More <span class="fa fa-angle-double-right"></span></a>
      </div>
    </div>
    </div>
</section>
</div>