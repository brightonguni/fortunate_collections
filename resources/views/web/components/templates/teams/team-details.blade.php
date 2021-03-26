<div class="row gutters-20">
  <div class="col-md-12">
    <div class="card ui-tab-card">
      <div class="card-body p-0">
        <div class="border-nav-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#skills" role="tab" aria-selected="false">Skills</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#department" role="tab" aria-selected="false">Department</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  @component('web.components.modals.alert')
    Alert Component
  @endcomponent
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab1" role="tabpanel">
            @include('web.components.templates.teams.partials.profile')
          </div>
          <div class="tab-pane fade" id="skills" role="tabpanel">
            @include('web.components.templates.teams.partials.skills')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
   