<div class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      <span class="flaticon-more-button-of-three-dots"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
      @if(in_array('brand_update', $canDo))
          <a class="dropdown-item" data-target-id="{{ $id }}" href="/project-brand/{{$id}}/edit"><i class="fas fa-user-edit text-dark-normal"></i>Edit</a>
      @endif
      @if(in_array('brand_read', $canDo))
          <a class="dropdown-item" href="/project-brand/{{$id}}"><i class="fas fa-eye text-dark-normal"></i>View</a>
      @endif
    </div>
</div>
