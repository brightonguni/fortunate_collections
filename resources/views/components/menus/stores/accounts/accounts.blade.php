<div class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="flaticon-more-button-of-three-dots"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        @if(in_array('account_read', $canDo))
        <a class="dropdown-item" href="/store-account/{{$id}}"><i class="fas fa-eye text-dark-normal"></i>View</a>
        @endif
        @if(in_array('account_update', $canDo))
        <a class="dropdown-item" href="/store-account/{{$id}}/edit"><i class="fas fa-user-edit text-dark-normal"></i>Edit</a>
        @endif
        @if(in_array('account_delete', $canDo))
        <a class="dropdown-item" data-target-id="{{$id}}" data-toggle="modal" data-target="#delete-account"><i class="fas fa-times text-orange-red"></i>Delete</a>
        @endif

    </div>
</div>
