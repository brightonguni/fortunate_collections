<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="card-image-small" style="background-image: url('{{ asset('assets/images/blogs/category/'.$category->avatar)}}');"></div>
      </div>
      <div class="col-xs-8 col-sm-12 -bottom-left-col-md-8 col-lg-8 pt-5">
        <div class="blog-title">
          <h3 class="p-0 m-0 text-hover text-left">{{  $category->title }}</h3>
        </div>
        <div class="card-description text-left pt-0 mt-0">
          <p class="text-hover text-height">{{$category->description }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
 <div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        @if(count($blogByCategories) > 0)
          @include('web.components.templates.blogs.categories.partials.blogs-by-category-ids')
        @else
          <div class="alert-message p-5 m-5">
            <div class="card">
              <div class="card-body">
                <p class="no-records-message  text-hover">
                  {{ ('no records at the moment..') }}
                </p>
              </div>
            </div>
          </div>
        @endif
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="row">
          <div class="col-12">
            @include('web.components.templates.blogs.partials.categories')
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            @include('web.components.templates.blogs.partials.latest-articles')
          </div>
        </div>
      </div>
    </div>
  </div>
 </div>
 @include('web._partials.blogs._blog')