<div class="height-auto" id="index-card">
  {{-- <div class="card-body"> --}}
    <div class="heading-layout1">
      <div class="item-title">
        <h3 class="text-hover p-1 m-1">All Events</h3>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table display data-table text-nowrap" style="width: 100%">
        <thead>
          <tr>
            <th>
              <div class="form-check">
                <input type="checkbox" class="form-check-input checkAll">
                <label class="form-check-label">&nbsp;</label>
              </div>
            </th>
            <th>ID</th>
            {{-- <th>Image</th> --}}
            <th>Title</th>
            <th>Start Date</th>
            <th>Ending Date</th>
            <th>Venue</th>
            <th>Suburb</th>
            <th>Service</th>
            {{-- <th>Store</th>  --}}
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
            <tbody>
              @foreach($events as  $event)
                <tr style="color: #000 !important;">
                  {{--<td class="p-0"></td>--}}
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input">
                      <label class=" form-check-label">&nbsp;</label>
                    </div>
                  </td>
                  <td>{{ $event->id }}</td>
                  {{-- <td width="20%">
                    <img class="img-responsive img-thumbnail event-image-table"
                      src="{{asset('assets/images/events/'.$event->avatar)}}" 
                      alt="{{ $event->title }}"
                    >
                  </td> --}}
                  <td>{{ $event->title}}</td>
                  <td>{{ $event->start_date}}</td>
                  <td>{{ $event->end_date }}</td>
                  <td>{{ $event->venue->title }}</td>
                  <td>{{ $event->venue->suburb }}</td>
                  <td>
                    <a class="card-text content-url" href="{{ route('web_service_category.show',
                      ['id' => $event->service->category->id]) }}"
                    >
                      {{ $event->service->category->title  }}
                    </a>
                  </td>
                  {{-- <td>{{ $event->store->name}}</td>  --}}
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
                      <a class="btn gradient-dodger-blue btn-block" href="{{ route('web_event.show',['id' => $event->id]) }}">show</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          {{-- </div> --}}
        </div>
      </div>