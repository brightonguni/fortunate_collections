@if($team_page)
    @foreach($team_page as $page)
      <div class="row p-2">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <div class="article-title text-center">
                <h2 class="text-hover">{{ $page->title }}</h2>
                <p class="text-height text-hover">{{ $page->description }}</p>
                <a class="btn btn-lg gradient-orange-black" href="{{ route('web_service.index') }}">Find Out More</a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <img class="img-responsive img-hover-zoom--zoom-n-rotate img-thumbnail" 
              src="{{ asset('assets/images/services/'.$page->avatar)}}" alt="">
            </div>
          </div>
        </div>
      </div>
    @endforeach
  @endif