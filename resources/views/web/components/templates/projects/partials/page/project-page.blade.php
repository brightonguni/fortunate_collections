@if($project_page)
  @foreach($project_page as $page)
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="row pt-5 mt-5">
          <div class="col-12">
            <div class="article-title text-center p-2 m-2">
              <div class="page-title"><h2 class="text-hover">{{ $page->title }}</h2></div>
              <div class="page-description"><p class="text-height text-hover">{{ $page->description }}</p></div>
              <div class="page-url"><a class="btn btn-lg btn-outline-light" href="{{ route('web_project.index') }}">Find Out More</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="row">
          <div class="col-md-12">
           @include('web.components.templates.projects.partials.slides.project-slide')
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endif