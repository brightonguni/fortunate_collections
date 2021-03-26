<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    @include('web.components.templates.projects.partials.page.project-page')
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card-image-large" style="background-image: url('{{ asset('assets/images/projects/'.$project->avatar)}}');"></div>
                <div class="project-title">
                  <h3 class="text-height text-hover"><strong>{{ $project->name }} Details</strong></h3>
                </div>
                <div class="card-description">
                  <p class="text-height text-hover">{{ $project->description }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sidebar-widget-url">
            @include('web.components.templates.projects.partials._project')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@if(count($blogs) > 0)
  @include('web._partials.blogs._blog')
@endif