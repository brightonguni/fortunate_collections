@include('web.components.templates.FAQ.partials.page.faq-page')
<div class="row p-2">
  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">  
    <div class="card">
      <div class="card-header">
         <h3 class="faq-question">{{ $faq->question }}</h3>
      </div>
      <div class="card-body">
        <div class="faq-answer">
          <p>{{ $faq->answer }}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('web.components.templates.FAQ.partials.categories')
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            @include('web.components.templates.services.partials._service')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="blog-partials" style="margin-top: 40px;">
  @include('web._partials.blogs._blog')
</div>