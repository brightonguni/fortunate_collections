<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-4">
    <div class="item-img">
        @if($contact->store->logo != NULL)
        <img width="230" height="330" src="{{url('/')}}/images/store/logo/{{$store->logo}}" alt="{{$store->logo}}">
        @endif
    </div>
    <div class="item-content">
        <div class="header-inline item-header">
            <h3 class="text-dark-medium font-medium">{{ $contact->store->name }}</h3>
            <div class="header-elements">
              <ul>
                @if( in_array('store_contact_update', $canDo))
                <li><a href="/store-contact/{{ $contact->id }}/edit"><i class="far fa-edit"></i></a></li>
                @endif
                    @if( in_array('store_contact_delete', $canDo))
                <li><a class="dropdown-item" data-target-id="{{$contact->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
                @endif

              </ul>
            </div>
        </div>
        <div class="info-table table-responsive">
            <table class="table text-nowrap">
                <tbody>
                <tr>
                    <td>ID No:</td>
                    <td class="font-medium text-dark-medium">{{ $contact->user->id }}</td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td class="font-medium text-dark-medium">{{ $contact->user->name }}</td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td class="font-medium text-dark-medium">{{ $contact->store->email }}</td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td class="font-medium text-dark-medium">{{ $contact->store->phone }}</td>
                </tr>
                <tr>
                    <td>Joining Date:</td>
                    <td class="font-medium text-dark-medium">{{ $contact->created_at->format('d F Y H:i') }}</td>
                </tr>
              </tbody>
          </table>
        </div>
    </div>
</div>

<!-- Store Single Info Details Table Area End Here -->

