@if($project->event)  
    <div class="row" style="padding-bottom: 20px; padding-top: 20px;">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3>{{ 'Service Events' }}</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-borderless table-condensed" width= 100%>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Venue</th>
                    <th>Suburb</th>
                    <th>Services</th>
                    <th>Products</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($project->event as $event) 
                  <tr>
                    <td>{{ $event->id }}</td>
                    <td width="10%">
                      <img class="img-responsive img-thumbnail" 
                      style="height: 50px; width: 50%;" 
                      src="{{asset('assets/images/image_3.jpg')}}" alt=""
                    >
                    </td>
                    <td width="20%">{{ str_limit($event->title,'100') }}</td>
                    <td>{{ $event->venue->title }}</td>
                    <td>{{ $event->venue->suburb }}</td>
                    <td>
                      <a class="card-text content-url btn" href="{{ route('web_service.show',
                        ['id' => $event->service->id]) }}"
                      >
                        {{ $event->service->title  }}
                      </a>
                    </td>
                    <td>
                      <a class="btn content-url " 
                        href="{{ route('web_product.show',
                        ['id' => $event->product->id]) }}"
                      >
                        {{ $event->product->name }}
                      </a>
                    </td>
                    <td>
                      <a class="card-text text-right btn 
                        btn-primary" href="{{ route('web_event.show',['id' => $event->id]) }}">
                        Find Out More 
                        <span class="fa fa-angle-double-right"></span>
                      </a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endif