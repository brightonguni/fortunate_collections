<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
      <div class="card-header">
         <h3 class="text-hover">My Skills</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="row profile-avatar">
              <div class="col-12">
                <div class="card-image-small" style="background-image: url('{{ asset('assets/images/users/'.$team->employee->user->avatar)}}');"></div> 
              </div>
            </div>
            <div class="profile-user-name text-center text-hover">
              <h3 class="text-dark-medium font-medium p-0 m-0"><strong>{{ $team->employee->user->name }}</strong></h3>
              <a href="mailto:lloyd@manuxkitchens.co.za" class="text-dark-medium font-medium p-0 m-0">{{ $team->employee->user->email }}</a>
              <h3 class="text-dark-medium font-medium p-0 m-0">{{ $team->employee->user->phone }}</h3>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="profile-name">
                  <h2 class="text-hover">{{ $team->employee->user->name }}</h2>
                </div>
                <div class="profile-skills table-responsive">
                  <table class="table" style="border: no; table-borderless; table-hover" width="100%">
                    <tr>
                      <td>Skill</td>
                      <td>Summary</td>
                      <td>Experience</td>
                    </tr>
                    @foreach($skills as $skill)
                    <tbody>
                      <tr>
                        <td><strong>{{ $skill->type->title }}</strong></td>
                        <td class="accordion">
                          	<div class="card p-1">
                          		<div class="card-header faq-question"  id="infraOne"> 
                                <a href="#{{ $skill->id }}" 
                                  data-toggle="collapse" 
                                  data-target="#{{ $skill->id }}" 
                                  {{-- title="click to find out more" --}}
                                  aria-expanded="false" 
                                  aria-controls="{{ $skill->id }}">
                          				<p class="faq-question mb-0">{{ str_limit($skill->type->description ,'200')}}</p>
                          			</a>
                          		</div>
                              <div 
                                id="{{ $skill->id }}" 
                                class="collapse" 
                                aria-labelledby="infraOne" 
                                data-parent="#accordion"
                              >
                          			<div class="card-body">
                                  <div class="faq-answer">
                                    <p>{{ $skill->type->description }}</p>
                                  </div>
                          			</div>
                          		</div>
                          	</div>
                        	</td>
                        <td>{{ $skill->experience }} - yrs</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>