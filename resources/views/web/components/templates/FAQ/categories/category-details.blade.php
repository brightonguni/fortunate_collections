 

@include('web.components.templates.FAQ.partials.page.faq-page')
<div class="row" id="blogs pt-5 mt-5">
  <div class="col-xs-12 col-sm-12 col-lg-12">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        @if($faqByCategories) 
          @foreach($faqByCategories->take(5) as $faq)
            <div class="accordion">
            	<div class="card" style="marging: 0 !important; padding: 2px !important;">
            		<div class="card-header faq-question"  id="infraOne"> 
                  <a href="#{{ $faq->id }}" 
                    data-toggle="collapse" 
                    data-target="#{{ $faq->id }}" 
                    aria-expanded="false" 
                    aria-controls="{{ $faq->id }}">
            				<h3 class="mb-0">
            			  {{ $faq->question }}
            				</h3>
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
                      {{ $faq->answer }}
                    </div>
                    <div class="url-link-to-item">
                      <a href="{{ route('web_faq.show',['id' => $faq->id]) }}"><strong>Continue reading ...</strong></a>
                    </div>
            			</div>
            		</div>
            	</div>
            </div>
          @endforeach
          @else
          <div class="alert-message" style="padding-top: 900px">
            <div class="card">
              <div class="card-body">
                <p class="no-records-message bg-dark-high">
                  {{ ('no records at the moment..') }}
                </p>
              </div>
            </div>
          </div>
         @endif
        </div>
        <div class="col-md-4 col-lg-4">
          <div class="row">
            <div class="col-12">
              @include('web.components.templates.FAQ.partials.categories')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="blog pt-4">
       @include('web._partials.blogs._blog')
    </div>