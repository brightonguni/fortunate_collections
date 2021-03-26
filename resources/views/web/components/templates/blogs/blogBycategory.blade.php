@if($blogByCategories)
  <div class="blog-categories">
    <h3 class="category-title">Blog Categories</h3>
    <ul class="list-unstyled">
      @foreach($blogByCategories as  $category)
        <li class="list-item text-hover">
          <a href="{{ route('web_blog_by_Category.show',['id' =>$category->id]) }}" $category->title }}
        </li>
        <li class="divider"></li>
      @endforeach
    </ul>
  </div>
@endif