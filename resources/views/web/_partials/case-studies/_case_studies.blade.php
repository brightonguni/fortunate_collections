@if($case_studies)
  <div class="row">
    <div class="col-12 text-center">
      <h3>Case Studies</h3>
    </div>
  </div>
  <div class="row" style="padding-bottom: 2px; margin-bottom: 2px;">
    @foreach($case_studies->take(3) as $case)  
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="margin: 0; padding: 1px;">
        <div class="card" style="margin: 2px;">
          <div class="card-body" style="margin: 10px; padding: 10px !important">
            <div class="card-title" style="height: 50px;">
              <h3>{{ str_limit($case->title,'100') }}</h3>
            </div>
            <div class="author" style="height: 50px;">
              <h4 style="font-size: 14px !important;"><small><strong>Posted By : </strong></small><small>Department:</small>{{ $case->department->name }}/ <small>Author:</small>{{ $case->user->name}}</h4>
            </div>
            <div class="blog-image">
              <img class="card-image-small"  src="{{asset('assets/images/image_2.jpg')}}" alt="teacher">
            </div>
            <div class="card-description" style="height: 250px;">
              <p>{{ str_limit($case->description,'450') }} </p>
            </div>
            <div class="blog-url">
                <a class="card-text btn btn-block btn-primary btn-lg" 
                  href="{{ route('web_case_study.show',
                ['id' => $case->id]) }}"
                >
                  {{ ('Continue Reading...') }} 
                </a>
            </div>
            <div class="blog-category">
              <h5><small>{{ ('category :') }} </small></h5>
              <h5 class="blog-category-text">
                <a class="btn btn-sm fa fa-gears 
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
  <div class="row">
    <div class="col-12 p-2">
      <div class="card-link">
        <a class="card-text btn btn-lg bgradient-dodger-blue"
          href="{{ route('web_case_study.index') }}"
        >
          <strong>{{ ('More Case Studies') }} </strong>
          <span class="fa fa-angle-double-right"></span>
        </a>
      </div>
    </div>
  </div>
@endif