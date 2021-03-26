@if($events)
<div class="card">
  <div class="height-auto" id="index-card">
    <div class="card-body">
      <h2 class="text-hover">Latest Events</h2>
      <div class="table-responsive">
        <table class="table display data-table text-nowrap"style="width: 100%; color: #000; text-capitilize">
          <thead class="text-hover">
            <tr class="text-hover">
              <th>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input checkAll">
                  <label class="form-check-label">&nbsp;</label>
                </div>
              </th>
              <th>ID</th>
              <th>Image</th>
              <th>Title</th>
              <th>Start Date</th>
              <th>Ending Date</th>
              <th>Venue</th>
              <th>Suburb</th>
              <th>Service</th>
              <th>Store</th> 
              <th>Status</th>
              <th></th>
            </tr>
            </thead>
              <tbody>
                @foreach($events as  $event)
                  <tr class="text-hover">
                    {{--<td class="p-0"></td>--}}
                    <td>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class=" form-check-label">&nbsp;</label>
                      </div>
                    </td>
                    <td>{{ $event->id }}</td>
                    <td>
                      <img 
                        style="padding-right: 15px;" 
                        src="{{asset('img/figure/student2.png')}}" 
                        alt="student"
                      >
                    </td>
                    <td>{{ $event->title}}</td>
                    <td>{{ $event->start_date}}</td>
                    <td>{{ $event->end_date }}</td>
                    <td>{{ $event->venue->title }}</td>
                    <td>{{ $event->venue->suburb }}</td>
                    <td>
                      <a class="card-text content-url" href="{{ route('web_service.show',
                        ['id' => $event->service->id]) }}"
                      >
                        {{ $event->service->title  }}
                      </a>
                    </td>
                    <td>{{ $event->store->name}}</td> 
                    <td class="text-center">
                      <span>
                        <i class="fas {{(!empty($event->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                        >
                        </i>
                      </span> 
                      &nbsp; 
                      <span hidden>{{ ($event->active) }}</span>
                    </td>
                      <td>
                        <a class="btn btn-block gradient-dodger-blue btn-md" href="{{ route('web_event.show',['id' => $event->id]) }}">show</a>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    @endif