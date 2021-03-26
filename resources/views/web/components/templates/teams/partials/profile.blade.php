<div class="row p-2 m-2">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
      <div class="card-header">
         <h3 class="text-hover">About Me</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="row profile-avatar">
              <div class="col-12">
                @if($team->employee->user->avatar)
                  <div class="card-image-small" 
                    style="background-image: url('{{ asset('assets/images/users/'.$team->employee->user->avatar)}}');">
                  </div> 
                @endif 
              </div>
            </div>
            <div class="profile-user-name text-center text-hover">
              @if($team->employee->user->name)
              <h3 class="text-dark-medium font-medium p-0 m-0">
                <strong>{{ $team->employee->user->name }}</strong>
              </h3>
              @endif
              @if($team->employee->user->email)
                <a href="mailto:lloyd@manuxkitchens.co.za" class="text-dark-medium font-medium p-0 m-0">
                  {{ $team->employee->user->email }}
                </a>
              @endif
              @if($team->employee->user->phone)
                <h3 class="text-dark-medium font-medium p-0 m-0">{{ $team->employee->user->phone }}</h3>
              @endif
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if($team->employee->user->name)
                  <div class="profile-name">
                    <h2 class="text-hover">{{ $team->employee->user->name }}</h2>
                  </div>
                @endif
               @if($team->employee->description) 
                <div class="profile-description">
                  <p class="text-hover text-height">{{ $team->employee->description }}</p>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>