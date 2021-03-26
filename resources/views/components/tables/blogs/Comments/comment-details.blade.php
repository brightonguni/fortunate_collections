<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
  <div class="item-img">
    <img src="{{asset('img/figure/teacher.jpg')}}" alt="teacher">
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $comment->title }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('skill_update', $canDo))
              <li><a href="/comment/{{ $comment->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('comment_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$comment->id}}" 
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
            <td class="font-medium text-dark-medium">{{ $comment->id }}</td>
          </tr>
          <tr>
            <td>Blog ID:</td>
            <td class="font-medium text-dark-medium">{{ $comment->blog->id }}</td>
          </tr>
          <tr>
            <td>Comment:</td>
            <td class="font-medium text-dark-medium">{{ $comment->description }}</td>
          </tr>
          <tr>
            <td>Created Date:</td>
            <td class="font-medium text-dark-medium">{{ $comment->created_at->format('d F Y H:i') }}</td>
          </tr>
          
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $comment->active }}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Skill Single Info Details Table Area End Here   -->
