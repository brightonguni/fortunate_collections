<div class="single-info-details pt-5">
  <div class="item-img">
    <img src="{{asset('img/figure/teacher.jpg')}}" alt="teacher">
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $page->title }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('page_update', $canDo))
              <li><a href="/page/{{ $page->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('page_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" data-target-id="{{$page->id}}" data-toggle="modal" data-target="#delete">
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
            <td class="font-medium text-dark-medium">{{ $page->id }}</td>
          </tr>
          <tr>
            <td>Blog Title:</td>
            <td class="font-medium text-dark-medium">{{ $page->name }}</td>
          </tr>
          <tr>
            <td>Description:</td>
            <td class="font-medium text-dark-medium">{{ $page->description }}</td>
          </tr>
          <tr>
            <td>Created Date:</td>
            <td class="font-medium text-dark-medium">{{ $page->created_at->format('d F Y H:i') }}</td>
          </tr>
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $page->active }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
