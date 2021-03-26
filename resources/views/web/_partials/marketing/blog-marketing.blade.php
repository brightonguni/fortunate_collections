
<div class="marketing-background" style="background-image: url('{{ asset('assets/images/image_11.jpg')}}');">
  <div class="row">
    <div class="col-12 guni-marketing">
      <div class="row">
        <div class="col-md-5 col-lg-5"></div>
        <div class="marketing-wrapper col-md-7 col-lg-7">
          <div class="blog-heading">
            <h2 class="main-title">Blog  @Manux Kitchen <br>
              <span class="sub-title">Your Mobile Kitchen Platform</span>
            </h2>
          </div>
          <div class="blog-options">
            <ul class="marketing-events-list list-unstyled list-group list-group-flush">
             @foreach($blogs->take(5) as $key => $blog)
                <li class="marketing-icons fa fa-calendar-check">
                  {{ $blog->title }}
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>