<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-4 pb-4">
    @if(count($aboutUs) > 0)
      @foreach($aboutUs as $about) 
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            @if($about->store->avatar)
              <div class="card-image-small" style="background-image: url('{{ asset('assets/images/store/'.$about->store->avatar)}}')"></div>  
            @endif                        
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">
            <div class="col-12">
              <div class="store-title text-center pt-5 mt-5">
                <h2 class="store-name text-hover">{{ $about->store->name }}</h2>
              </div>
              <div class="card-description">
                <p class="text-hover">{{ str_limit($about->store->description,'250') }}</p>
              </div>
              <div class="card-text content-url text-center">
                <a class="btn btn-lg  btn-outline-dark" 
                  href="{{ route('web_about_us.show',
                  ['id' => $about->store->id]) }}"
                >
                  Find Out More
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
</div>