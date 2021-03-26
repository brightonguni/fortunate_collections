

@if($services->project)  
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header gradient-dodger-blue">
          <h3>{{ 'Service projects' }}</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-borderless table-condensed" style="width: 100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
               @foreach($services->project as $project)   
                <tr>
                  <td>{{ $project->id }}</td>
                  <td>{{ $project->image }}</td>
                  <td>{{ $project->name }}</td>
                  <td>{{ $project->description }}</td>
                  <td>
                    <a class="card-text text-right btn btn-gradient-yellow btn-md" href="{{ route('web_event.show',['id' => $project->id]) }}">
                      Find Out More 
                      <span class="fa fa-angle-double-right"></span>
                    </a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @endif