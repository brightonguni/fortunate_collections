<!-- Users Table Area Start Here -->
<div class="height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>All Contacts</h3>
            </div>
            {{--<div class="dropdown">--}}
                {{--<a class="dropdown-toggle" href="#" role="button"--}}
                   {{--data-toggle="dropdown" aria-expanded="false">...</a>--}}
                {{--<div class="dropdown-menu dropdown-menu-right">--}}
                    {{--<a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>--}}
                    {{--<a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>--}}
                    {{--<a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>

        <div class="table-responsive">
            <table class="table display data-table text-nowrap">
                <thead>
                <tr>
                    <th>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input checkAll">
                            <label class="form-check-label">&nbsp;</label>
                        </div>
                    </th>
                    
                    <th>ID</th>
                    <th>Name</th>
                    <th>Store Logo</th>
                    <th>Phone</th>
                    <th>E-mail</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($contacts as  $contact)
                    <tr>
                        <td>
                          <div class="form-check">
                              <input type="checkbox" class="form-check-input">
                              <label class="form-check-label">&nbsp;</label>
                          </div>
                        </td> 
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->user->name }}</td>
                        <td><img style="padding-right: 15px;" src="{{URL::asset('assets/images/stores/logo'.$contact->store->logo)}}" alt="no logo"></td>
                         <td class="font-medium text-dark-medium">{{ $contact->store->phone }}</td>
                        <td class="font-medium text-dark-medium">{{ $contact->store->email }}</td>
                        <td>{{ $contact->status }}</td>
                        <td>
                             @component('components.menus.stores.contacts.contacts', ['canDo' => $canDo,'contacts'=>$contacts ])
                                 @slot('id')
                                     {{$contact->id}}
                                 @endslot
                                Store-Menu Component
                            @endcomponent
                        </td> 
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Users Table Area End Here -->

