@if($services)
  @foreach($services->take(3) as $service)
    <div class="row">
      <div class="col-12 services-side-widget"> 
        <div class="card">
          <div class="card-body service-background-image" background-image:url('{{ URL::asset('assets/images/services/'.$service->avatar) }}')>
            <h3 class="case-widget">{{ $service->title }}?</h3>
            <p class="widget-content">
              {{ str_limit($service->description,'100') }}
            </p>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endif