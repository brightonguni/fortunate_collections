<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>All Store Addresses</h3>
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
            <th>Store Name</th>
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
              @foreach($addresses as  $address)
                <tr>
                  {{--<td class="p-0"></td>--}}
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input">
                      <label class=" form-check-label">&nbsp;</label>
                    </div>
                  </td>
                  <td>{{ $address->id }}</td>
                  <td>{{ $address->store->name}}</td>
                  <td>{{ $address->street }}</td>
                  <td>{{ $address->suburb }}</td>
                  <td>{{ $address->postal_code }}</td>
                  <td>{{ $address->city }}</td>
                  <td>{{ $address->state_province }}</td>
                  <td>{{ $address->country }}</td>
                  <td class="text-center">
                    <span>
                      <i class="fas {{(!empty($address->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                      >
                      </i>
                    </span> 
                    &nbsp; 
                    <span hidden>{{ ($address->active) }}</span>
                  </td>
                    <td>
                      @component('components.menus.stores.address.addresses', ['canDo' => $canDo])
                        @slot('id')
                          {{$address->id}}
                        @endslot
                          address-Menu Component
                        @endcomponent
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
<!-- addresss Table Area End Here -->

