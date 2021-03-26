<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>All Teams</h3>
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
            <th>Licensor</th>
            <th>Store</th>
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
            <tbody>
              @foreach($teams as  $team)
                <tr>
                  {{--<td class="p-0"></td>--}}
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input">
                      <label class=" form-check-label">&nbsp;</label>
                    </div>
                  </td>
                  <td>{{ $team->id }}</td>
                  <td>
                    <img 
                      style="padding-right: 15px;" 
                      src="{{asset('img/figure/student2.png')}}" 
                      alt="student"
                    >
                      {{ $team->name}}
                  </td>
                  <td>{{ $team->description }}</td>
                  <td>{{ $team->licensor->name }}</td>
                  <td>{{ $team->store->name}}</td>
                  <td class="text-center">
                    <span>
                      <i class="fas {{(!empty($team->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                      >
                      </i>
                    </span> 
                    &nbsp; 
                    <span hidden>{{ ($team->active) }}</span>
                  </td>
                    <td>
                      @component('components.menus.teams', ['canDo' => $canDo])
                        @slot('id')
                          {{$team->id}}
                        @endslot
                          User-Menu Component
                        @endcomponent
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
<!-- Teams Table Area End Here -->

