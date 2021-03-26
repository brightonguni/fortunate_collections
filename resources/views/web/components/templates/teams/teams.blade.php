<div class="row">
  <div class="col-12">
    <div class="p-5 m-5">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-5">
          @if($teams)
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row team-content-wrapper pt-2">
                  @foreach($teams as $team)  
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 p-1">
                        <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                        	<div class="flipper">
                        		<div class="front">
                              <div class="card">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-12 p-1">
                                      <!-- front content -->
                                      <div class="team-categories text-left p-0 m-0">
                                        <h3 class="btn gradient-dodger-blue">
                                          {{ $team->employee->category->title }}
                                        </h3>
                                      </div>
                                       <div class="card-image-small" style="background-image: url('{{ asset('assets/images/users/'.$team->employee->user->avatar)}}');"></div> 
                                      <div class="team-title text-center ">
                                        <h3 class="text-hover p-0 m-0">
                                          <strong>{{ str_limit($team->employee->user->name,'60') }}</strong>
                                        </h3>
                                        <p class="text-hover p-0 m-0">
                                          <strong>{{ str_limit($team->employee->user->email,'60') }}</strong>
                                        </p>
                                        <h3 class="text-hover p-0 m-0">
                                          <strong>{{ str_limit($team->employee->department->name,'60') }}</strong>
                                        </h3>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        		</div>
                        		<div class="back">
                              <a href="{{ route('web_employee.show',['id' => $team->id]) }}">
                                <div class="card">
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-1">
                                        <!-- back content -->
                                        <div class="team-title text-center mt-5">
                                          <h3 class="text-hover">
                                          <strong>{{ str_limit($team->employee->user->name,'60') }}</strong>
                                          </h3>
                                          <h3 class="text-hover">
                                          <strong>{{ str_limit($team->employee->category->title,'60') }}</strong>
                                          </h3>
                                        </div>
                                        <div class="team-description">
                                          <p class="text-hover text-height">{{ $team->employee->description }}</p>
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
            @endif
          </div>
         </div>
        </div>
      </div>
    </div>

@include('web._partials.blogs._blog')
