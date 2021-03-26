<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-4">
    <div class="item-img">
        @if($store->logo != NULL)
        <img src="{{URL::asset('assets/images/store/logo/'.$store->avatar)}}" alt="{{$store->logo}}">
        @endif
    </div>
    <div class="item-content">
        <div class="header-inline item-header">
            <h3 class="text-dark-medium font-medium">{{ $store->name }}</h3>
            <div class="header-elements">
              <ul>
                @if( in_array('store_update', $canDo) && $storeBelongs )
                <li><a href="/stores/{{ $store->id }}/edit"><i class="far fa-edit"></i></a></li>
                @endif
                    @if( in_array('store_delete', $canDo) && $storeBelongs )
                <li><a class="dropdown-item" data-target-id="{{$store->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
                @endif

              </ul>
            </div>
        </div>
        <p> {{$store->description}}</p>
        <div class="info-table table-responsive">
            <table class="table text-nowrap">
                <tbody>
                <tr>
                    <td>ID No:</td>
                    <td class="font-medium text-dark-medium">{{ $store->id }}</td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td class="font-medium text-dark-medium">{{ $store->name }}</td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td class="font-medium text-dark-medium">{{ $store->email }}</td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td class="font-medium text-dark-medium">{{ $store->phone }}</td>
                </tr>
                <tr>
                    <td>Joining Date:</td>
                    <td class="font-medium text-dark-medium">{{ $store->created_at->format('d F Y H:i') }}</td>
                </tr>
                {{-- @if($store->account->number)
                <tr>
                    <td>Account Number:</td>
                    <td class="font-medium text-dark-medium">{{ $store->account->number }}</td>
                </tr>
                @endif  --}}
                {{-- @if($store->account->name)
                <tr>
                    <td>Bank:</td>
                    <td class="font-medium text-dark-medium">{{ $store->account->name }}</td>
                </tr>
                @endif
                @if($store->account->branch_code)
                <tr>
                    <td>Branch Code:</td>
                    <td class="font-medium text-dark-medium">{{ $store->account->branch_code }}</td>
                </tr>
                @endif
                @if($store->account->type)
                <tr>
                    <td>Account Type:</td>
                    <td class="font-medium text-dark-medium">{{ $store->account->type }}</td>
                </tr>
                @endif
                @if($store->pin)
                <tr>
                    <td>Pin:</td>
                    <td class="font-medium text-dark-medium">{{ $store->pin }}</td>
                </tr>
                @endif --}}
                {{-- <tr>
                    <td>Category:</td>
                    <td class="font-medium text-dark-medium">
                    <ul>
                    @foreach($store->categories as $category)
                       <li>{{ $category->name }}</li>
                    @endforeach
                    </ul>
                    </td>
                </tr> --}}
                @if(count($store->addresses)> 0)
                  @foreach($store->addresses as $address)
                    <tr>
                        <td>Address:</td>
                        <td class="font-medium text-dark-medium">{{ $address->street }}</td>
                    </tr>
                  @endforeach
                @endif
               {{--   @if($store->hours)
                <tr>
                  <td>Trade Hours:</td>
                  <td class="font-medium text-dark-medium">
                      <ul>
                          @foreach($store->hours as $hour)
                              <li>{{ $hour->name }}</li>
                          @endforeach
                      </ul>
                  </td>
                </tr>
                @endif
                @if($store->contacts->name)
                <tr>
                    <td>Contact Person:</td>
                    <td class="font-medium text-dark-medium">{{ $store->contacts->name }}</td>
                </tr>
                @endif
                @if($store->contacts->phone)
                <tr>
                    <td>Contact Phone:</td>
                    <td class="font-medium text-dark-medium">{{ $store->contacts->phone }}</td>
                </tr>
                @endif --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Store Single Info Details Table Area End Here -->

