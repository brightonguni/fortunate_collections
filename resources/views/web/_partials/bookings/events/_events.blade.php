<div class="row">
   <div class="col-md-12">
    <div class="card">
      <div class="card-header gradient-dodger-blue">
        <h3 class="text-hover">Events</h3>
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
                    <a class="btn btn-md gradient-dodger-blue text-hover" href="{{ route('web_event.show',['id' => $event->id]) }}">Find Out More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        @endif
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <a class="btn gradient-dodger-blue btn-md text-hover" href="{{ route('web_event.index') }}">{{ 'Find Out More' }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
