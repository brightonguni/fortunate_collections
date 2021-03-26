
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="item-img">
              <img class="img-responsive card-image-small" 
                src="{{asset('assets/images/events/'.$event->avatar)}}" 
                alt="{{ $event->title }}"
             </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="table-responsive">
              <table class="table display no-wrap text-capitalize">
                <tbody>
                  <tr>
                    <th>Event</th>
                    <td>{{ $event->title }}</td>
                  </tr>
                  <tr>
                    <th>Start Date</th>
                    <td>{{ $event->start_date }}</td>
                  </tr>
                  <tr>
                    <th>Ending Date</th>
                    <td>{{ $event->end_date }}</td>
                  </tr>
                  <tr>
                    <th>Venue Name:</th>
                    <td>{{ $event->venue->title }}</td>
                  </tr>
                  <tr>
                      <th>Street:</th>
                      <td>{{ $event->venue->street }}</td>
                  </tr>
                   <tr>
                      <th>Postal Code:</th>
                      <td>{{ $event->venue->postal_code }}</td>
                  </tr>
                    <tr>
                      <th>City:</th>
                      <td>{{ $event->venue->city }}</td>
                    </tr>
                    <tr>
                      <th>State / Province:</th>
                      <td>{{ $event->venue->state }}</td>
                    </tr>
                    <tr>
                      <th>Country:</th>
                      <td>{{ $event->venue->country }}</td>
                    </tr>
                    <tr>
                      <th>Description</th>
                      <td>{{ $event->description }}</td>
                    </tr>
                    <tr>
                      <th>Service</th>
                      <td>{{ $event->service->title }}</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td>
                        <a class="gradient-dodger-blue btn btn-md" 
                          href="{{ route('web_event_book.booking',['id' => $event->id]) }}">
                          Make a Booking <span class="fa fa-calender"></span>
                        </a>
                      </td>
                    </tr>
                  </tfoot>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('web._partials.blogs._blog')