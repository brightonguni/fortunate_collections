<!-- Store Single Info Details Table Area Start Here -->

<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="item-img">
          <img src="{{asset('img/figure/teacher.jpg')}}" alt="teacher">
        </div>
      </div>
  </div>
</div>
  <div class="col-md-9">
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h3 class="sub-title">{{ $case_study->title }}</h3>
        </div>
        <div class="card-published text-right">
          <p>{{ $case_study->created_at->format('d F Y H:i') }}</p>
        </div>
        <div class="card-description">
           <p>{{ $case_study->description }}</p>
        </div>
        <div class="card-category">
           <p><span>Category :</span>{{ $case_study->category->title }}</p>
        </div>
        <div class="card-author"><span>published by: </span>{{ $case_study->user->name}}</div>
      </div>
    </div>
  </div>
</div>

