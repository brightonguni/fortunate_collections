<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>All Projects</h3>
      </div>
      <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button"
          data-toggle="dropdown" aria-expanded="false">...</a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
          </div>
        </div> 
      </div>
        <div class="table-responsive">
          <table class="table display data-table text-nowrap">
            <thead>
              <tr>
                <th>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input checkAll">
                    <label class="form-check-label">&nbsp;</label>
                  </div>
                </th>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Licensor</th>
                <th>Business</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
          <tbody>
          @foreach($projects as  $project)
            <tr>
              <td>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input">
                  <label class=" form-check-label">&nbsp;</label>
                </div>
              </td>
              <td>{{ $project->id }}</td>
              <td>
                <img style="padding-right: 15px;" 
                src="{{asset('img/figure/student2.png')}}" 
                alt="student"
              >
                {{ $project->name}}
              </td>
              <td>{{ $project->description }}</td>
              <td>{{ $project->start_time }}</td>
              <td>{{ $project->end_time }}</td>
              <td>{{ $project->licensor->name}}</td>
              <td>{{ $project->store->name }}</td>
              <td class="text-center">
                <span>
                  <i class="fas {{(!empty($project->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                  >
                  </i>
                  </span> &nbsp; <span hidden>
                >
                  {{ ($project->active) }}
                </span>
              </td>
              <td>
                @component('components.menus.projects', ['canDo' => $canDo])
                  @slot('id')
                    {{$project->id}}
                  @endslot
                  Project-Menu Component
                @endcomponent
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Users Table Area End Here -->

