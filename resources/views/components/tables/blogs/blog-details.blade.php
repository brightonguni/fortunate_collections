<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
  <div class="item-img">
    <img style="padding-right: 15px;" 
      src="{{URL::asset('assets/images/blogs/'.$blog->avatar)}}" 
      alt="no service image">
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $blog->title }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('blog_update', $canDo))
              <li><a href="/blog/{{ $blog->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('blog_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$blog->id}}" data-toggle="modal" data-target="#delete"
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
            <td class="font-medium text-dark-medium">{{ $blog->id }}</td>
          </tr>
          <tr>
            <td>Blog Title:</td>
            <td class="font-medium text-dark-medium">{{ $blog->name }}</td>
          </tr>
          <tr>
            <td>Category:</td>
            <td class="font-medium text-dark-medium">{{ $blog->category }}</td>
          </tr>
          <tr>
            <td>Description:</td>
            <td class="font-medium text-dark-medium">{{ $blog->description }}</td>
          </tr>
          <tr>
            @foreach($departments->departments as $department)
            <td>
              <ul>
                <li>{{ $department->name }}</li>
              </ul>
            </td>
            @endforeach
          </tr>
          
          <tr>
            <td>Created Date:</td>
            <td class="font-medium text-dark-medium">{{ $blog->created_at->format('d F Y H:i') }}</td>
          </tr>
          
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $blog->active }}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Skill Single Info Details Table Area End Here   -->
