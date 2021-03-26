<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
  <div class="item-img">
   <img src="{{URL::asset('assets/images/bookings/events'.$event->avatar)}}" alt="no image">
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $event->title }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('booking_event_update', $canDo))
              <li><a href="event/{{ $event->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('booking_event_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$event->id}}" 
                  data-toggle="modal" 
                  data-target="#delete"
                >
                  <i class="fas fa-trash-alt"></i>
                </a>
              </li>
            @endif
          </ul>
        </ul>
      </div>
    </div>
    <div class="info-table table-responsive">
      <table class="table text-nowrap">
        <tbody>
          <tr>
            <td>ID No:</td>
            <td class="font-medium text-dark-medium">{{ $event->id }}</td>
          </tr>
          <tr>
            <td>event Name:</td>
            <td class="font-medium text-dark-medium">{{ $event->title }}</td>
          </tr>
          <tr>
            <td>Service:</td>
            <td class="font-medium text-dark-medium">{{ $event->venue->title}}</td>
          </tr>
          <tr>
            <td>Service:</td>
            <td class="font-medium text-dark-medium">{{ $event->service->title}}</td>
          </tr>
          <tr>
            <td>event Description:</td>
            <td class="font-medium text-dark-medium">{{ $event->description }}</td>
          </tr>
          
          <tr>
            <td>Created Date:</td>
            <td class="font-medium text-dark-medium">{{ $event->created_at->format('d F Y H:i') }}</td>
          </tr>
          
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $event->active }}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- event Single Info Details Table Area End Here   -->
