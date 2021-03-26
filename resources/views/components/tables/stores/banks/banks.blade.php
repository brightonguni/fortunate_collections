<!-- Users Table Area Start Here -->
<div class="height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>All Banks</h3>
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
                    <th>Branch Code</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($banks as  $bank)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input">
                                <label class="form-check-label">&nbsp;</label>
                            </div>
                        </td>
                        <td>{{ $bank->id }}</td>
                        <td>{{ $bank->name}}</td>
                        <td>{{ $bank->branch_code }}</td>
                        <td>
                             @component('components.menus.stores.banks.banks', ['canDo' => $canDo ])
                                 @slot('id')
                                     {{$bank->id}}
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

