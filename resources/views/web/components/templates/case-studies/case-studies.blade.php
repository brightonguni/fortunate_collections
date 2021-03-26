
@if($case_studies)
  <div class="row">
    <div class="col-md-8 col-lg-8">
      @foreach($case_studies as $case)  
        <div class="col-12 " style="margin: 0; padding: 1px;">
            <div class="card">
              <div class="card-body">
                <div class="card-title">
                  <h2>{{ str_limit($case->title,'100') }}</h2>
                </div>
                <div class="author">
                  <h4><small><strong>Posted By : </strong></small><small>Department:</small>{{ $case->department->name }}/ <small>Author:</small>{{ $case->user->name}}</h4>
                </div>
                <div class="blog-image">
                  <img class="card-img-small"  src="{{asset('assets/images/image_2.jpg')}}" alt="teacher">
                </div>
                <div class="card-description">
                  <p>{{ str_limit($case->description,'450') }}
                    <a class="card-text" style="color: rgb(179, 79, 79); font-weight: 900;" 
                      href="{{ route('web_case_study.show',
                    ['id' => $case->id]) }}"
                    >
                      <strong>{{ ('Continue Reading....') }} </strong>
                    </a>
                  </p>
                </div>
                <div class="blog-category">
                  <h3><small>{{ ('category :') }} </small></h3>
                  <h5 class="blog-category-text">
                    <a class="btn btn-default 
                      btn-sm" href="{{ route('web_case_study_category.show',
                      ['id' => $case->category->id]) }}" 
                    >
                      {{ $case->category->title }} 
                    </a
                  </h5>
                </div>
              </div>
            </div>
          </div>
      @endforeach
    </div>
    <div class="col-md-4 col-lg-4">
      <div class ="row">
        <div class="col-md-12">
          @include('web.components.templates.case-studies.partials.categories')
        </div>
      </div>

      <div class ="row">
        <div class="col-md-12">
          @include('web.components.templates.services.partials._service')
        </div>
      </div>
    </div>
  </div>
@endif