  @foreach($case_studies->take(5) as $case)  
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin: 0; padding: 3px;">
      <div class="card" style="margin: 0; padding: 3px;">
        <div class="card-body">
          <div class="card-title">
            <h2 style="text-align: left !important;">{{ str_limit($case->title,'100') }}</h2>
          </div>
          <div class="author">
            <h4><small><strong>Posted By : </strong></small><small>Department:</small>{{ $case->department->name }}/ <small>Author:</small>{{ $case->user->name}}</h4>
          </div>
          <div class="card-image">
            <img class="card-img-small" src="{{asset('assets/images/image_2.jpg')}}" alt="teacher">
          </div>
          <div class="card-description">
            <p>{{ str_limit($case->description,'450') }}
              <a class="card-text" style="color: rgb(179, 79, 79); font-weight: 900;" 
                href="{{ route('web_case_study.show',['id' => $case->id]) }}"
              >
                <strong>{{ ('Continue Reading....') }} </strong>
              </a>
            </p>
          </div>
          <div class="blog-category">
             <h5 class="blog-category-text">
               <a class="btn btn-gradient-yellow btn-sm" href="#" >{{ $case->category->title }} </a
             </h5>
          </div>
        </div>
      </div>
    </div>
  @endforeach