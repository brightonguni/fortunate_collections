<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
  <div class="item-img">
    <img src="{{asset('img/figure/teacher.jpg')}}" alt="teacher">
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $category->name }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('blog_category_update', $canDo))
              <li><a href="/categorys/{{ $category->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('blog_category_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$category->id}}" 
                  data-toggle="modal" 
                  data-target="#delete"
                >
                  <i class="fas fa-trash-alt"></i>
                </a>
              </li>
            @endif
          </ul>
        </ul>
      </div>
    </div>
    <div class="info-table table-responsive">
      <table class="table text-nowrap">
        <tbody>
          <tr>
            <td>ID No:</td>
            <td class="font-medium text-dark-medium">{{ $category->id }}</td>
          </tr>
          <tr>
            <td>Category:</td>
            <td class="font-medium text-dark-medium">{{ $category->title }}</td>
          </tr>
          <tr>
            <td>category Description:</td>
            <td class="font-medium text-dark-medium">{{ $category->description }}</td>
          </tr>
          <tr>
            <td>Created Date:</td>
            <td class="font-medium text-dark-medium">{{ $category->created_at->format('d F Y H:i') }}</td>
          </tr>
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $category->active }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- category Single Info Details Table Area End Here   -->
