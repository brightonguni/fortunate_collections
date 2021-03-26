@if($case_categories)

  <section id="blog-categories" class="sidebar">
    <h4 class="card-header">Categories</h4>
    <ul class="list-group list-group-flush">
      @foreach($case_categories as $category)
        <li class="list-group-item text-capitalize fa fa-calendar-check"
            style="padding: 10px;">
          <a href="{{ route('web_case_study_category.show',['id' => $category->id]) }}"> {{ $category->title }} </a>
        </li>
      @endforeach
    </ul>
  </section>
@endif
