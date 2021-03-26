
   
<div id="project-carousel" class="carousel slide">
  <!-- INDICATORS -->
  {{-- <ol class="carousel-indicators">
    @foreach($projects as $slide)
      <li data-target="#project-carousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
    @endforeach
  </ol> --}}
      <div class="carousel-inner m-0 p-0 container-overlay">
        @foreach($projects as $slide)
          <div class="carousel-item slide-item-image {{ $loop->first ? ' active' : '' }} fade-in" style="background-image: url('{{ asset('assets/images/projects/'.$slide->avatar)}}');" 
            aria-label="slide-slide">
            <div class="row carousel-caption pt-0 mt-0 overlay">
              <div class="slider-content col-xs-12 col-sm-12 col-md-9 offset-md-3 col-lg-9 offset-lg-3 pt-0 mt-0">
                <div class="slide-title"><h3 class="slide-title">{{ str_limit($slide->title ,'80') }}</h3></div>
                <div class="slide-description"><p class="slide-description">{{str_limit( $slide->description ,'180')}}</p></div>
                <div class="slide-url pt-3 pb-3">
                  <a class="btn btn-lg gradient-orange-black pl-5 pr-5"  
                    href="{{ route('web_service_category.show',['id' =>$slide->id]) }}">
                    Find Out More
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#project-carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#project-carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>