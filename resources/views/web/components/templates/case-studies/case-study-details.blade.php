<div class="row">
  <div class="col-md-9">
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h2 style="text-align: left !important;">{{ $case_study->title }}</h2>
        </div>
        <div class="author">
          <h3><small><strong>Posted By : </strong></small><small>Department:</small>{{ $case_study->department->name }}/ <small>Author:</small>{{ $case_study->user->name}}</h3>
        </div>
        <div class="blog-image">
          <img src="{{asset('assets/images/image_1.jpg')}}" alt="teacher">
        </div>
        <div class="card-description">
           <p>{{ $case_study->description }}</p>
        </div>
        <div class="card-published">
          <p>{{ $case_study->created_at->format('d F Y H:i') }}</p>
        </div>
        <div class="card-category">
          <h6>Categories</h6>
           <a class="btn btn-default text-capitalize" href="#"> {{ $case_study->category->title }}</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    @include('web.components.templates.case-studies.partials.categories')
  </div>
</div>

