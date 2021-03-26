<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    @if($category)
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-5 col-lg-5 m-0 p-0">
              <div class="card-image-large" style="background-image: url('{{ asset('assets/images/products/category/'.$category->avatar)}}')"></div>
            </div>
            <div class="col-md-7 col-lg-7 p-2 m-2">
              <div class="card-title">
                <h3><strong>{{  $category->title }}</strong></h3>
              </div>
              <div class="card-description">
                <p>{{$category->description }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
</div>
<div class="row pt-5 pb-5">
  <div class="col-col-xs-12 col-sm-12 col-md-12 col-lg-12">
      @include('web.components.templates.products.partials.product_by_category')  
  </div>
</div>
<div class="row">
  <div class="col-12">
    @include('web._partials.blogs._blog')
  </div>
</div>

