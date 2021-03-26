<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
  <div class="item-img">
    <img src="{{asset('img/figure/teacher.jpg')}}" alt="teacher">
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $booking->title }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('booking_update', $canDo))
              <li><a href="/booking/{{ $booking->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('booking_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$booking->id}}" 
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
            <td class="font-medium text-dark-medium">{{ $booking->id }}</td>
          </tr>
          <tr>
            <td>Title:</td>
            <td class="font-medium text-dark-medium">{{ $booking->title }}</td>
          </tr>
          <tr>
            <td>From:</td>
            <td class="font-medium text-dark-medium">{{ $booking->start_date }}</td>
          </tr>
          <tr>
            <td>To:</td>
            <td class="font-medium text-dark-medium">{{ $booking->end_date }}</td>
          </tr>
          <tr>
            <td> Event:</td>
            <td class="font-medium text-dark-medium">{{ $booking->event->name }}</td>
          </tr>
          <tr>
            <td>booking Venue:</td>
            <td class="font-medium text-dark-medium">{{ $booking->venue->name }}</td>
          </tr>
          <tr>
            <td>booking Category:</td>
            <td class="font-medium text-dark-medium">{{ $booking->category->name }}</td>
          </tr>
          <tr>
            <td>booking Category:</td>
            <td class="font-medium text-dark-medium">{{ $booking->category->name }}</td>
          </tr>
          <tr>
            <td>Service:</td>
            <td class="font-medium text-dark-medium">{{ $booking->service->name }}</td>
          </tr>
          <tr>
            <td>booking Description:</td>
            <td class="font-medium text-dark-medium">{{ $booking->description }}</td>
          </tr>
          <tr>
            <td>Created Date:</td>
            <td class="font-medium text-dark-medium">{{ $booking->created_at->format('d F Y H:i') }}</td>
          </tr>
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $booking->active }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- booking Single Info Details Table Area End Here   -->
