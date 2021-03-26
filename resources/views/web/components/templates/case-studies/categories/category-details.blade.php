@if($category)
  <section id="blog-categories bg-light" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="row">
      <div class="col-md-5 col-lg-5">
        <div class="card-image" style="width: 100%; height: 500%;">
          <img class="card-image-large img-responsive img-thumbnail" src="{{ asset('assets/images/image_6.jpg')}}" alt class="thumbnail">
        </div>
      </div>
      <div class="col-md-7 col-lg-7" style="padding-top: 40px; padding-bottom: 20px">
        <div class="card-title">
          <h2>{{  $category->title }}</h2>
        </div>
        <div class="card-description">
          <p>{{$category->description }}</p>
        </div>
      </div>
    </div>
  </section>
@endif
<section id="case-studies" class="case-studies-section">
  <div class="row">
    @include('web.components.templates.case-studies.partials.cases-by-category')
  </div>
  </section>
