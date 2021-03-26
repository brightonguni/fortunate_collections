<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>All bookings</h3>
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
            <th>Event</th>
            <th>Venue</th>
            <th>Service</th>
            <th>Category</th>
            <th>From</th>
            <th>To</th>
            {{-- <th>Licensor</th>
            <th>Store</th> --}}
             <th>Description</th>
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
            <tbody>
              @foreach($bookings as  $booking)
                <tr>
                  {{--<td class="p-0"></td>--}}
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input">
                      <label class=" form-check-label">&nbsp;</label>
                    </div>
                  </td>
                  <td>{{ $booking->id }}</td>
                  <td>
                    <img 
                      style="padding-right: 15px;" 
                      src="{{asset('img/figure/student2.png')}}" 
                      alt="student"
                    >
                      
                  </td>
                  <td>{{ $booking->event->title }}</td>
                  <td>{{ $booking->venue->title }}</td>
                  <td>{{ $booking->service->title }}</td>
                  <td>{{ $booking->category->title }}</td>
                  <td>{{ $booking->event->start_date }}</td>
                  <td>{{ $booking->event->end_date }}</td>
                  <td>{{ str_limit($booking->description,'100') }}</td>
                  {{-- <td>{{ $booking->licensor->name }}</td>
                  <td>{{ $booking->store->name}}</td> --}}
                  <td class="text-center">
                    <span>
                      <i class="fas {{(!empty($booking->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                      >
                      </i>
                    </span> 
                    &nbsp; 
                    <span hidden>{{ ($booking->active) }}</span>
                  </td>
                    <td>
                      @component('components.menus.bookings', ['canDo' => $canDo])
                        @slot('id')
                          {{$booking->id}}
                        @endslot
                          bookings-Menu Component
                        @endcomponent
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
<!-- bookings Table Area End Here -->

