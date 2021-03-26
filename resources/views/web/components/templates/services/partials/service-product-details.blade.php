<div class="service-events-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-lg-8">
        <div class="row">
         @foreach($services->product as $product)  
            <div class="col-12">
              <h2 class="event-title">
                {{ $service->product->name }}
              </h2>
              <p class="service-event-description">
                {{ $service->product->description }}
              </p>
            </div>
            
        </div>
      </div>
    </div>
  </div>
</div>