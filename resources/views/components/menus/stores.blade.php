{{--<div class="dropdown">--}}
{{--    <button--}}
{{--        style="text-decoration: none; width: 32px; height: 32px;line-height: 29px; border-radius: 50%"--}}
{{--        class=" btn-fab-sm bg-transparent b-0 text-light-black"--}}
{{--        type="button" data-toggle="dropdown"--}}
{{--        aria-haspopup="true" aria-expanded="false"><i--}}
{{--            style="font-size: 24px;" class="icon-pen-angled"></i>--}}
{{--    </button>--}}
{{--    <div class="dropdown-menu dropdown-menu-right">--}}
{{--        <a class="dropdown-item"--}}
{{--           href="{{route('user.show',$id)}}"><i--}}
{{--                class="icon icon-eye"></i> View</a>--}}
{{--        <a class="dropdown-item" data-target-id="{{$id}}"--}}
{{--           data-toggle="modal" href="/users/{{$id}}/edit" ><i--}}
{{--                class="icon icon-edit"></i>Edit</a>--}}
{{--        <a class="dropdown-item" data-target-id="{{$id}}" data-toggle="modal" data-target="#delete"><i--}}
{{--                class="icon icon-delete"></i> Delete</a>--}}
{{--        <a class="dropdown-item"  href="/users/{{$id}}/profile#orders" ><i--}}
{{--                class="icon icon-orders"></i> Orders</a>--}}
{{--        <a class="dropdown-item"  href="/users/{{$id}}/profile#wallet" ><i--}}
{{--                class="icon icon-wallet"></i> Wallet</a>--}}
{{--        <a class="dropdown-item"  href="/users/{{$id}}/profile#cards" ><i--}}
{{--                class="icon icon-credit-card"></i> Credit Card</a>--}}
{{--        <a class="dropdown-item"  href="/users/{{$id}}/profile#meters" ><i--}}
{{--                class="icon icon-calculator"></i> Meters</a>--}}
{{--        <a class="dropdown-item" href="/users/{{$id}}/profile#timeline" ><i--}}
{{--                class="icon icon-history"></i> Timeline</a>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="flaticon-more-button-of-three-dots"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        @if(in_array('store_read', $canDo))
         {{-- $canDo) ) --}}
        <a class="dropdown-item" href="/stores/{{$id}}"><i class="fas fa-eye text-dark-normal"></i>View</a>
        @endif
        @if(in_array('store_update', $canDo))
        {{-- , $canDo) && $own == '1' ) --}}
        <a class="dropdown-item" href="/stores/{{$id}}/edit"><i class="fas fa-user-edit text-dark-normal"></i>Edit</a>
        @endif
        @if(in_array('store_delete', $canDo))
        {{-- , $canDo) && $own == '1' ) --}}
        <a class="dropdown-item" data-target-id="{{$id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-times text-orange-red"></i>Delete</a>
        @endif


            @if( auth()->user()->id != 1 )

                @if( $isActive == '1' )

                <a href="{{ route('store.deactivate', ['id' => $id ]) }}" class="dropdown-item">
                    <i class="fas fa-user-edit text-dark-normal"></i> Deactivate </a>
                </a>
                @else
                    <a href="{{ route('store.activate', ['id' => $id ]) }}" class="dropdown-item">
                        <i class="fas fa-user-edit text-dark-normal"></i> Activate </a>
                    </a>
                @endif

            @endif

    </div>
</div>
