@include('web.components.templates.projects.partials.page.project-page')
<div class="row">
  <div class="col-12">
    @if(count($projects) > 0)
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
          <div class="card">
            <div class="card-body m-0 p-0">
              <div class="row">
                @foreach($projects as $project)  
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 p-1">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                    	<div class="flipper">
                    		<div class="front">
                          <div class="card">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-12 p-1">
                                  <!-- front content -->
                                  <div class="project-categories text-left p-0 m-0">
                                    <ul>
                                      @foreach($project->categories as $category)
                                      <li class="btn btn-outlink-dark btn-sm p-1 m-1">{{ $category->title }}</li>
                                      @endforeach
                                    </ul>
                                  </div>
                                  <div class="card-image-small" style="background-image: url('{{ asset('assets/images/projects/'.$project->avatar)}}');"></div>
                                  <div class="project-title text-center ">
                                    <h3 class="text-hover">
                                      <strong>{{ str_limit($project->name,'25') }}</strong>
                                    </h3>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    		</div>
                    		<div class="back">
                          <a href="{{ route('web_project.show',['id' => $project->id]) }}">
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-1">
                                    <!-- back content -->
                                    <div class="project-title text-center mt-5">
                                      <h3 class="text-hover">
                                        <strong>{{ str_limit($project->name,'60') }}</strong>
                                      </h3>
                                    </div>
                                    <div class="project-description">
                                      <p class="text-hover text-height">{{ str_limit($project->description ,'200')}}</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </a>
                    		</div>
                    	</div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="card-header">
                <h3>Latest Projects</h3>
              </div>
              @include('web.components.templates.projects.partials._project')
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <p>No projects to showcase yet .....</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
</div>
@if(count($blogs) > 0)
  @include('web._partials.blogs._blog')
@endif