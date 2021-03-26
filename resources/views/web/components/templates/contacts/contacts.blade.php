
@if($stores)
  <div class="row m-3">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="row">
        @foreach($stores as $store)  
          <div class="col-xs-12 col-sm-12 col-md-4  col-lg-4 mb-4">
            <div class="card pt-2">
              <div class="card-body">
                <div class="card-image-small p-0 m-0" 
                  style="background-image: url('{{ asset('assets/images/store/'.$store->avatar)}}');background-color: #000;">
                </div>
                  @if($store->name)
                    <div class="contact-title text-center">
                      <h3 class="contact-title pt-1 pb-1">{{ $store->name }}</h3>
                    </div>
                  @endif
                <div class="contacts">
                  <div class="contact-emails">
                    <ul>
                       @if($store->email)
                        <li>
                          <a class="fa fa-envelope" href="mail:to{{ $store->email }}">
                            <span class="pl-2 ml-2">{{ $store->email }}</span>
                          </a>
                        </li>
                       @endif
                       {{-- @if($store->admin_email)
                        <li>
                          <a  class="fa fa-envelope" href="mail:to{{ $store->admin_email }}">
                           {{ $store->admin_email }}
                          </a>
                        </li>
                       @endif --}}
                       @if($store->info_email)
                      <li>
                        <a class="fa fa-envelope" href="mail:to{{ $store->info_email }}">
                          {{ $store->info_email }}
                        </a>
                      </li>
                      @endif
                      @if($store->phone)
                        <li class="phone-number fa fa-skype">
                          <span class="pl-2 ml-2"> {{  $store->phone }}</span>
                        </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-footer p-0 m-0">
                <a class="btn btn-block btn-md btn-outline-dark"
                   href="{{ route('web_contact_us.show',['id' => $store->id]) }}"
                 >
                 Get In Touch
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endif
@if(count($blogs) > 0)
  @include('web._partials.blogs._blog')
@endif 
