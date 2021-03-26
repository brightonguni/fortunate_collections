@if($product_categories)
  <div class="card">
    <div class="card-header gradient-dodger-blue">
      <h3>Categories</h3>
    </div>
    <div class="card-body">
      <ul class="list-group list-group-flush">
        @foreach($product_categories as $category)
          <li 
            class="list-group-item 
            text-capitalize fa fa-calendar-check"
            style="padding: 10px;"
          >
            <a 
              href="{{ route('web_product_category.show',
              ['id' => $category->id]) }}"
            > 
              <span 
                class="card-category-text" 
              >
                {{  $category->title }} 
              </span> 
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
@endif