  
@include('web.components.templates.FAQ.partials.page.faq-page')
<div class="container-fluid p-2 m-2">
  @if(count($faqs) > 0)
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
              <div class="faq-title text-left">
                <div class="card-header">
                  <h3>Frequently Asked Questions FAQs</h3>
                </div>
              </div>
              @foreach($faqs as $faq)
                <div class="accordion">
                	<div class="card p-2">
                		<div class="card-header faq-question"  id="infraOne"> 
                      <a href="#{{ $faq->id }}" 
                        data-toggle="collapse" 
                        data-target="#{{ $faq->id }}" 
                        aria-expanded="false" 
                        aria-controls="{{ $faq->id }}">
                				<p class="faq-question mb-0" style="font-weight: 300;">{{ $faq->question }}</p>
                			</a>
                		</div>
                    <div 
                      id="{{ $faq->id }}" 
                      class="collapse" 
                      aria-labelledby="infraOne" 
                      data-parent="#accordion"
                    >
                			<div class="card-body">
                        <div class="faq-answer">
                          <p>{{ $faq->answer }}</p>
                        </div>
                        <div class="url-link-to-item btn btn-md btn-outline-light">
                          <a href="{{ route('web_faq.show',['id' => $faq->id]) }}">
                            <strong>Find Out More</strong></a>
                        </div>
                			</div>
                		</div>
                	</div>
              	</div>
              @endforeach
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  @include('web.components.templates.FAQ.partials.categories')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="row bg-dark-gray">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <p>No frequently Asked questions, yet</p>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
@if(count($blogs) > 0)
  <div class="blog-partials pb-3">
    @include('web._partials.blogs._blog')
  </div>
@endif