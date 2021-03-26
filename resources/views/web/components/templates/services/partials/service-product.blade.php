

@if($service->product)  
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="header">
          <h3>{{ 'Service Products' }}</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-borderless table-condensed" style="width: 100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
               @foreach($service->product as $product)   
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->image }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->description }}</td>
                  <td>
                    <a class="card-text text-right btn 
                      btn-primary" href="{{ route('web_event.show',['id' => $product->id]) }}">
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