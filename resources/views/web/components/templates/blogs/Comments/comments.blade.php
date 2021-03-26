@if(count($comments) > 0)
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card-comments">
        <h3 class="text-hover">Blog comments</h3>
        @foreach($comments as $comment)
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                      <div class="card-comment-username">
                        <img class="img-responsive img-thumbnail img-circle" src="{{ ('assets/images/stores/logo/1572527217.jpg') }}">
                        <h3 class="text-hover">{{ $comment->user->name }}</h3>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                      <div class="comment-details text-hover">
                        <p class="">{{ str_limit($comment->comment ,'200')}}</p>
                        <h6 class="text-hover">
                          <small>
                            <strong>
                              {{ $comment->created_at->diffForHumans() }} / 
                              <a 
                                href="{{ route('web_blog_comment.show',['id' => $comment->id]) }}"
                              >
                              <small><strong>{{ ('Read More') }}</strong></small>
                              </a>
                            </strong>
                          </small>
                        </h6>
                        </a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endif