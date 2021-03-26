<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="row  mb-4">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @if($store->avatar)
              <div class="card-image-small" 
                style="background-image: url('{{ asset('assets/images/store/logo/'.$store->avatar)}}')" alt="">
              </div>
            @endif
          </div>
        </div>
      </div>  
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        @if($store->name)
          <div class="store-name">
            <h3>{{ $store->name }}</h3>
          </div>
        @endif
        @if($store->description)
          <div class="store-description">
            <p>{{ str_limit($store->description ,'400')}}</p>
          </div>
        @endif
        <div class="contact-url pt-2 pb-2">
          <a class="btn btn-md btn-outline-dark" href="{{ route('web_about_us.show',['id' =>$store->id]) }}">
            Find Out More
          </a>
        </div> 
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="card">
      <div class="card-header">
        <h3>Contact Inforomation</h3>
      </div>
      <div class="card-body">
        <div class="store-details">
          @if($store->name)
            <div class="fa fa-location">
              <h2>{{ $store->name }}</h2>
            </div>
          @endif
          @if($store->phone)
            <div class="phone-number fa fa-skype">
              <p>{{ $store->phone }}</p>
            </div>
          @endif
          @if($store->email)
            <div class="fa fa-envelope">
              <p>{{ $store->email }}</p>
            </div>
          @endif
          <ul class="list-unstyled">
           @if($store->email)
              <li class="fa fa-envelope">
                <a href="mail:to{{ $store->email }}"><span>{{ $store->email }}</span></a>
              </li>
            @endif
            @if($store->admin_email)
              <li>
                <a class="fa fa-envelope" href="mail:to{{ $store->admin_email }}"><span>{{ $store->admin_email }}</span></a>
              </li>
             @endif
            @if($store->info_email)
              <li>
                <a class="fa fa-envelope" href="mail:to{{ $store->info_email }}"><span>{{ $store->info_email }}</span></a> 
              </li>
            @endif
            @if($store->sales_email)
              <li>
                <a class="fa fa-envelope" href="mail:to{{ $store->sales_email }}"><span>{{ $store->sales_email }}</span></a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="card">
      <div class="card-header">
        <h3>Contact Us Form</h3>
      </div>
      <div class="card-body">
        @include('web.components.forms.contact_us.contact_us')
      </div>
    </div>
  </div>
</div>
@if(count($blogs) > 0)
  @include('web._partials.blogs._blog')
@endif 
