<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>All Customers</h3>
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
      <form class="mg-b-20">
        <div class="row gutters-8">
          <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
            <input type="text" placeholder="Search by ID ..." class="form-control">
          </div>
          <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
            <input type="text" placeholder="Search by Name ..." class="form-control">
          </div>
          <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
            <input type="text" placeholder="Search by Phone" class="form-control">
          </div>
          <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
            <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
          </div>
        </div>
      </form>
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
                <th >Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
          <tbody>
          @foreach($customers as  $customer)
            <tr>
              {{--<td class="p-0"></td>--}}
              <td>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input">
                  <label class=" form-check-label">&nbsp;</label>
                </div>
              </td>
              <td>{{ $customer->id }}</td>
              <td >
                <img style="padding-right: 15px;" 
                src="{{asset('img/figure/student2.png')}}" 
                alt="student"
              >
                {{ $customer->name}}
              </td>
              <td>{{ $customer->email }}</td>
              <td>{{ $customer->phone }}</td>
              <td>{{ $customer->role()->name}}</td>
              <td class="text-center">
                <span>
                  <i class="fas {{(!empty($customer->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                  >
                  </i>
                  </span> &nbsp; <span hidden>
                >
                  {{ ($customer->active) }}
                </span>
              </td>
              <td>
                @component('components.menus.users', ['canDo' => $canDo])
                  @slot('id')
                    {{$customer->id}}
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
<!-- Users Table Area End Here -->

