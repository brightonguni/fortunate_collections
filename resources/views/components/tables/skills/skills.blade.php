<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>Manage Skills</h3>
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
            <th>experience</th>
            <th>level</th>
            <th>Licensor</th>
            <th>Store</th>
            <th>Description</th>
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
            <tbody>
              @foreach($skills as  $skill)
                <tr>
                  {{--<td class="p-0"></td>--}}
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input">
                      <label class=" form-check-label">&nbsp;</label>
                    </div>
                  </td>
                  <td>{{ $skill->id }}</td>
                  <td>{{ $skill->name}}</td>
                  <td>{{ $skill->experience }}</td>
                  <td>{{ $skill->level->name }}</td>
                  <td>{{ $skill->licensor->name }}</td>
                  <td>{{ $skill->store->name}}</td> 
                   <td>{{ str_limit($skill->description,'80') }}</td>
                  <td class="text-center">
                    <span>
                      <i class="fas {{(!empty($skill->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                      >
                      </i>
                    </span> 
                    &nbsp; 
                    <span hidden>{{ ($skill->active) }}</span>
                  </td>
                    <td>
                      @component('components.menus.skills', ['canDo' => $canDo])
                        @slot('id')
                          {{$skill->id}}
                        @endslot
                          Skills-Menu Component
                        @endcomponent
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
<!-- Skills Table Area End Here -->

