@include('web.components.templates.projects.partials.page.project-page')
@if($projects)
  <div class="container-fluid pt-5 mt-5">
    <div class="row">
      @foreach($projects->take(6) as $project)
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
                            <li class="btn  btn-outline-dark btn-sm p-1 m-1">{{ $category->title }}</li>
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
    <div class="card-link p-2 m-2 text-center">
      <a class="btn btn-lg btn-outline-light text-center"
        href="{{ route('web_project.index') }}"><strong>Find Out More</strong>
        <span class="fa fa-angle-double-right"></span>
      </a>
    </div>
  </div>
@endif