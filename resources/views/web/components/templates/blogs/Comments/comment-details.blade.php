     
    
      
<div class="row">
  <div class="col-12">
    <div class="blog-content">
      <h3 class="blog-title text-hover">
        {{ $comment->blog->title }}
      </h3>
      <h5 class="blog-department text-hover"><small>Department :</small>
        <strong>{{ $comment->blog->department->name }}</strong>  |
        <span class="blog-category text-hover"><small>Category:</small><strong>{{ $comment->blog->category->title }}</strong></span>
      </h5>
      <img class="img-responsive img-fluid card-image-large" src="{{asset('assets/images/image_17.jpg')}}" alt="teacher">
      <div class="blog-date text-hover">
        <strong> published: {{ $comment->blog->created_at->diffForHumans() }}</strong>
      </div>
      <div class="blog-author">
        <div class="row">
          <div class="col-md-2 col-lg-2" style="margin: 0; padding: 2px;">
            <div class="author-image text-center">
              <img class="img-responsiveimage-grayscale img-thumbnail" 
                style="width: 100px; height: 100px;"
                src="{{asset('assets/images/image_17.jpg')}}" alt="teacher"
              >
            </div>
          </div>
          <div class="col-md-10 col-lg-10" style="margin: 0; padding: 2px;">
            <div class="author-username text-left" style="padding-top: 30px">
              <h6 class="text-hover"><strong> Author: {{ $comment->blog->user->name }}</strong></h6>
            </div>
          </div>
        </div>
      </div>
      <div class="blog-description">
        <p class="text-hover">{{ $comment->blog->description }}</p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-8 col-md-offset 4 col-lg-8 col-lg-offset-4">
    <div class="row">
      <div class="col-md-3 col-lg-3" style="margin: 0; padding: 2px;">
        <div class="author-image text-center">
          <img class="img-responsiveimage-grayscale img-thumbnail" 
            style="width: 100px; height: 100px;"
            src="{{asset('assets/images/image_17.jpg')}}" alt="teacher"
          >
          <h6 class="text-hover"><strong>{{ $comment->user->name }}</strong></h6>
        </div>
      </div>
      <div class="col-md-9 col-lg-9" style="margin: 0; padding: 2px;">
        <p class="full-comment text-hover">
        {{ $comment->comment }}
        </p>
      </div>
    </div>
  </div>
</div>


