
<div class="slide-wrapper mt-3 pt-3">
  <div class="row">
    <div class="col-12">
    <div id="slide-carousel" class="carousel slide">
      <!-- INDICATORS -->
      <ol class="carousel-indicators">
        @foreach($service_categories as $slide)
          <li data-target="#slide-carousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
      </ol>
      <div class="carousel-inner m-0 p-0">
        @foreach($service_categories as $slide)
          <div class="carousel-item slide-image {{ $loop->first ? ' active' : '' }} fade-in" style="background-image: url('{{ asset('assets/images/services/category/'.$slide->avatar)}}');" aria-label="slide-slide">
            <div class="row carousel-caption pt-0 mt-0">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 mt-0">
                <div class="slider-content">
                  <div>
                    <h2 class="slide-title">{{ str_limit($slide->title ,'80') }}</h2>
                  </div>
                  <div><p class="slide-description">{{str_limit( $slide->description ,'180')}}</p></div>
                  <div class="slide-url pt-3 pb-3">
                    <a class="btn btn-lg gradient-pastel-green pl-5 pr-5"  
                      href="{{ route('web_service_category.show',['id' =>$slide->id]) }}">
                      Find Out More
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#slide-carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#slide-carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  </div>
</div>
     