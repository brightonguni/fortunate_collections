<div class="row">
 <div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h2>Get Events</h2>
    </div>
    <div class="card-body">
       @if($events)
        @foreach($events->take(1) as $event)
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <img class="img-responsive img-thumbnail card-image-small" 
              src="{{asset('assets/images/events/'.$event->avatar)}}" 
              alt="{{ $event->title }}"
            >
          </div>
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="row">
              <div class="col-12">
                <div class="event-title">
                  <h3 class="text-hover">{{ $event->title }}</h3>
                </div>
                <div class="event-description">
                  <p class="text-hover">{{ $event->description }}</p>
                </div>
                <div class="event-url">
                  <a class="btn btn-md gradient-dodger-blue" 
                    href="{{ route('web_event.show',['id' => $event->id]) }}">
                    Find Out More
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      @endif
    </div>
  </div>
 </div>
</div>
<div class="row gutters-20">
  <div class="col-md-12">
    <div class="card ui-tab-card">
      <div class="card-body p-0">
        <div class="border-nav-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#latest-events" role="tab" aria-selected="true">Active-events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#up-coming-events" role="tab" aria-selected="false">Up-coming Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#suspended-events" role="tab" aria-selected="false">Suspend Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#all-events" role="tab" aria-selected="false">All Events</a>
            </li>
            </ul>
          </div>
          <div class="row gutters-20">
            <div class="col-md-12">
              <div class="card ui-tab-card">
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="latest-events" role="tabpanel">
                    @include('web.components.templates.bookings.events.partials.latest-events')
                  </div>
                  <div class="tab-pane fade" id="up-coming-events" role="tabpanel">
                    @include('web.components.templates.bookings.events.partials.upcoming-events')
                  </div>
                  <div class="tab-pane fade" id="suspended-events" role="tabpanel">
                    @include('web.components.templates.bookings.events.partials.suspended-events')
                  </div>
                  <div class="tab-pane fade" id="all-events" role="tabpanel">
                    @include('web.components.templates.bookings.events.partials.all-events')
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   @include('web._partials.blogs._blog')