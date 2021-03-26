<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>All venues</h3>
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
            <th>Image</th>
            <th>Name</th>
            <th>Street</th>
            <th>Suburb</th>
            <th>Postal Code</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
            <tbody>
              @foreach($venues as  $venue)
                <tr>
                  {{--<td class="p-0"></td>--}}
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input">
                      <label class=" form-check-label">&nbsp;</label>
                    </div>
                  </td>
                  <td>{{ $venue->id }}</td>
                  <td>
                    <img 
                      style="padding-right: 15px;" 
                      src="{{asset('img/figure/student2.png')}}" 
                      alt="student"
                    >
                      
                  </td>
                  <td>{{ $venue->title}}</td>
                  <td>{{ $venue->street }}</td>
                  <td>{{ $venue->suburb }}</td>
                  <td>{{ $venue->postal_code }}</td>
                  <td>{{ $venue->city }}</td>
                  <td>{{ $venue->state_province }}</td>
                  <td>{{ $venue->country }}</td>
                  <td class="text-center">
                    <span>
                      <i class="fas {{(!empty($venue->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                      >
                      </i>
                    </span> 
                    &nbsp; 
                    <span hidden>{{ ($venue->active) }}</span>
                  </td>
                    <td>
                      @component('components.menus.venues', ['canDo' => $canDo])
                        @slot('id')
                          {{$venue->id}}
                        @endslot
                          venues-Menu Component
                        @endcomponent
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
<!-- venues Table Area End Here -->

