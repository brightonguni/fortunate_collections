<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>All events</h3>
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
            <th>Title</th>
            <th>Start Date</th>
            <th>Ending Date</th>
            <th>Venue</th>
            <th>Description</th>
            {{-- <th>Licensor</th>
            <th>Store</th> --}}
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
            <tbody>
              @foreach($events as  $event)
                <tr>
                  {{--<td class="p-0"></td>--}}
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input">
                      <label class=" form-check-label">&nbsp;</label>
                    </div>
                  </td>
                  <td>{{ $event->id }}</td>
                  <td>
                    <img 
                      style="padding-right: 15px;" 
                      src="{{URL::asset('iassets/images/Bookings/events/'.$event->avatar)}}" 
                      alt="no image"
                    >
                  </td>
                  <td>{{ $event->title}}</td>
                  <td>{{ $event->start_date }}</td>
                  <td>{{ $event->end_date }}</td>
                  <td>{{ $event->venue->title}}</td>
                  <td>{{ $event->description }}</td>
                  {{-- <td>{{ $event->licensor->name }}</td> --}}
                  {{-- <td>{{ $event->store->name}}</td> --}} 
                  <td class="text-center">
                    <span>
                      <i class="fas {{(!empty($event->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                      >
                      </i>
                    </span> 
                    &nbsp; 
                    <span hidden>{{ ($event->active) }}</span>
                  </td>
                    <td>
                      @component('components.menus.events', ['canDo' => $canDo])
                        @slot('id')
                          {{$event->id}}
                        @endslot
                          events-Menu Component
                        @endcomponent
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
<!-- events Table Area End Here -->

