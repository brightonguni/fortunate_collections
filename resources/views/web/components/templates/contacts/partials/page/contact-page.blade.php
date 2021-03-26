<div class="row m-3">
  <div class="col-12">
    @if($contact_page)
      @foreach($contact_page as $page)
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="article-title text-center">
              <h2 class="text-hover">{{ $page->title }}</h2>
              <p class="text-height text-hover">{{ $page->description }}</p>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <img class="img-responsive img-hover-zoom--zoom-n-rotate img-thumbnail" 
            src="{{ asset('assets/images/services/'.$page->avatar)}}" alt="">
          </div>
        </div>
      @endforeach
    @endif
  </div>
</div>