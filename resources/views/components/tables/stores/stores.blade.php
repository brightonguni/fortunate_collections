<!-- Users Table Area Start Here -->
<div class="height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>All Stores</h3>
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
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    @if( auth()->user()->id != 1 )
                    <th>Owned</th>
                    @endif
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($stores as  $store)

                    <tr>

                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input">
                                <label class="form-check-label">&nbsp;</label>
                            </div>
                        </td>
                        <td>{{ $store->id }}</td>
                        <td><img style="padding-right: 15px;" src="{{asset('img/figure/student2.png')}}" alt="student"> {{ $store->name}}</td>
                        <td>{{ $store->email }}</td>
                        <td>{{ $store->phone }}</td>
                        <td class="text-center">
                            {{--@if($store->own )--}}

                            <span><i class="fas {{(!empty($store->isActive) && $store->isActive )
                            ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"></i></span> &nbsp; <span hidden>{{ ($store->isActive) }}</span>

                        </td>
                        @if( auth()->user()->id != 1 )
                        <td>
                            {{(!empty($store->own) && $store->own ) ? 'Yes' : 'No' }}
                         </td>

                         @endif
                        <td>
                             @component('components.menus.stores', ['canDo' => $canDo ])
                                 @slot('id')
                                     {{$store->id}}
                                 @endslot
                             {{-- @slot('isActive')
                                 {{$store->isActive}}
                             @endslot --}}
                                 {{-- @slot('own')
                                     {{$store->own}}
                                @endslot --}}
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

