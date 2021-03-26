<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>All Packages</h3>
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
            <th>Service</th>
            <th>Licensor</th>
            <th>Store</th>
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
            <tbody>
              @foreach($packages as  $package)
                <tr>
                  {{--<td class="p-0"></td>--}}
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input">
                      <label class=" form-check-label">&nbsp;</label>
                    </div>
                  </td>
                  <td>{{ $package->id }}</td>
                  <td>
                    <img 
                      style="padding-right: 15px;" 
                      src="{{URL::asset('assets/images/packages/'.$package->avatar)}}" 
                      alt="no image"
                    >
                  </td>
                  <td>{{ $package->name}}</td>
                  <td>{{ str_limit($package->description ,'80')}}</td>
                  <td>
                    <ul>
                      <li>Services</li>
                      @if($package->services)
                        @foreach($package->services as $service)
                        <li>{{ $service->title }}</li>
                        @endforeach
                        @endif
                    </ul>
                  </td>
                  <td>
                    <ul>
                      <li>Products</li>
                      @if($package->products)
                        @foreach($package->products as $product)
                        <li>{{ $product->name }}</li>
                        @endforeach
                        @endif
                    </ul>
                  </td>
                  <td>{{ $package->licensor->name }}</td>
                  <td>{{ $package->store->name}}</td>
                  <td class="text-center">
                    <span>
                      <i class="fas {{(!empty($package->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                      >
                      </i>
                    </span> 
                    &nbsp; 
                    <span hidden>{{ ($package->active) }}</span>
                  </td>
                    <td>
                      @component('components.menus.packages.packages', ['canDo' => $canDo])
                        @slot('id')
                          {{$package->id}}
                        @endslot
                          package-Menu Component
                        @endcomponent
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

