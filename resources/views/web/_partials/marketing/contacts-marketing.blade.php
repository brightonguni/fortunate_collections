
<div class="marketing-background" style="background-image: url('{{ asset('assets/images/image_10.jpg')}}');">
  <div class="row">
    <div class="marketing-wrapper col-12">
      <div class="row">
        <div class="col-12 text-right">
          <h2 class="main-title">Contacts @Manux Kitchen<br> <span 
              class="sub-title">Your Mobile Kitchen Platform</span>
          </h2>
          <h2 </h2>
        </div>
      </div>
      <div class="row">
        @foreach($services as $service)
        <div class="col-md-3 col-lg-3">
            <div class="card">
              <div class="body">
                <div class="col-md-1 col-lg-1">
                  <img class="img-responsive img-thumbnail img-circle" 
                    src="{{ asset('assets/images/image_1.jpg')}}" 
                    alt class="thumbnail"
                    style="width: 100px; height: 100px, border-radius: 50%"
                  >
                </div>
                <div class="col-md-11 col-lg-11">
                  <div class="card-marketing-title">
                    <h2><strong>{{  str_limit($service->title,'20' )}}</strong></h2>
                  </div>
                  <div class="card-marketing-description">
                    <p>{{ str_limit($service->description,'100') }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

