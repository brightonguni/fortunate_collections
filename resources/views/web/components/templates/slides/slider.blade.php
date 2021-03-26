<!-- Carousel Slideshow -->
  <div id="carousel-example" class="carousel slide" data-ride="carousel">
      <!-- Carousel Indicators -->
      <ol class="carousel-indicators">
          <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example" data-slide-to="1"></li>
          <li data-target="#carousel-example" data-slide-to="2"></li>
      </ol>
      <div class="clearfix"></div>
      <!-- End Carousel Indicators -->
      <!-- Carousel Images -->
      <div class="carousel-inner">
      @foreach ($slider as $key => $slide)
        <div class="item{{ $key == 0 ? ' active' : '' }}">
            <img src="{{ $slide->image }}">
        </div>
      @endforeach
      <!-- Carouse Images -->
      <!-- Carousel Controls -->
      <a class="left carousel-control" href="#carousel-example" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
      <!-- End Carousel Controls -->
  </div>
  <!-- End Carousel Slideshow -->