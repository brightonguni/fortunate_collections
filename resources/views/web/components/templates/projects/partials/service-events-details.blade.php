<div class="service-events-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-lg-8">
        <div class="row">
          @foreach($service_events as $events)
            <div class="col-12">
              <h2 class="event-title">
                {{ $service->event->title }}
              </h2>
              <p class="service-event-description">
                {{ $service->event->description }}
              </p>
            </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>