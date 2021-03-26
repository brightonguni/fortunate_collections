
@if($projects)
  @foreach($projects->take(4) as $project)
    <a href="{{ route('web_project.show',['id' => $project->id]) }}">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
          <div class="card pb-2">
            <div class="card-body">
              <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-md-12 col-lg-12 text-center">
                      <img class ="project-image img-responsive img-thumbnail m-0 p-0 w-100"style="height: 100px; width: 100%;" 
                        src="{{ URL::asset('assets/images/projects/'.$project->avatar) }}"
                         alt="{{ $project->avatar }}"
                      >
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-1 m-1">
                      <div class="widget-sidebar-content p-1">
                        <h3 class="project-name m-0 p-0"><strong><small>{{ $project->name }}</small></strong></h3>
                        <p class="project-description pb-0">
                          <small>{{ str_limit($project->description,'100') }}</small>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  @endforeach
@endif
 