<section id="about-us-page mb-3 pb-3">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin: 0; padding: 3px;">
      <div class="card-image-large fadeInLeft" style="background-image: url('{{ asset('assets/images/store/'.$aboutUsPage->store->avatar)}}');"></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">  
      <h2 class="text-hover">  {{ $aboutUsPage->store->name }}</h2>
      <div class="store-description">
         <p class="text-hover">{{ $aboutUsPage->store->description }}</p>
      </div>
      {{-- <div class="store-categories">
        <h5>Store Categories</h5>
        <ul>
          @foreach($aboutUsPage->store->categories as $category)
             <li>{{ $category->name }}</li>
          @endforeach
        </ul>
      </div> --}}
      {{-- <div class="store-hours">
        <h5>Trade Hours:</h5>
        <ul>
          @foreach($aboutUsPage->store->hours as $hour)
              <li>{{ $hour->name }}</li>
          @endforeach
        </ul>
      </div> --}}
      {{-- <div class="contacts">
        <div class="contact-emails">
          <a href="mail:to{{ $aboutUsPage->store->email }}">Foodtruck: .' '.{{ $aboutUsPage->store->email }}</a>
          <a href="mail:to{{ $aboutUsPage->store->admin_email }}">Admin: .' '.{{ $aboutUsPage->store->admin_email }}</a>
          <a href="mail:to{{ $aboutUsPage->store->info_email }}">Info: .' '.{{ $aboutUsPage->store->info_email }}</a>
          <a href="mail:to{{ $aboutUsPage->store->sales_email }}">Sales: .' '.{{ $aboutUsPage->store->sales_email }}</a>
        </div>
      </div> --}}
    </div>
  </div>
</section>
@if(count($blogs) > 0)
  <div class="blog-partials pb-3">
    @include('web._partials.blogs._blog')
  </div>
@endif
 