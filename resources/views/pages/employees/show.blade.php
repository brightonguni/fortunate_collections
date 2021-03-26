@extends('layouts.app')
@section('content')

    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>employee</h3>
        <ul>
            <li>
                <a href="{{ route('employees.index') }}">Home</a>
            </li>
            <li>employee Details</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- employee Table Area Start Here -->
    <div class="row gutters-20">
        <div class="col-md-12">
        <div class="card ui-tab-card">
            <div class="card-body p-0">
                <div class="border-nav-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#credit-card" role="tab" aria-selected="false">Credit Cards</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">Wallet</a>
                        </li>
                        @if( in_array('transaction_list', $canDo) )
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#orders" role="tab" aria-selected="false">Purchases</a>
                        </li>
                        @endif
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" data-toggle="tab" href="#tab6" role="tab" aria-selected="false">Activity Log</a>--}}
                        {{--</li>--}}
                        @if( in_array('employee_update', $canDo) )
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('employees.edit', ['id' => $employee->id ]) }}"  aria-selected="false">Edit</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
    @component('components.modals.alert')
        Alert Component
    @endcomponent
    <div class="row gutters-20">
        <div class="col-md-12">
            <div class="card ui-tab-card">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                        <div class="card-body">
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>About Me</h3>
                                </div>
                                <!-- <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-expanded="false">...</a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                    </div>
                                </div> -->
                            </div>
                            <div class="single-info-details">
                                <div class="item-img">
                                    <img src="{{asset('img/figure/teacher.jpg')}}" alt="teacher">
                                </div>
                                <div class="item-content">
                                    <div class="header-inline item-header">
                                        <h3 class="text-dark-medium font-medium">{{ $employee->name }}</h3>
                                        <div class="header-elements">
                                            <ul>
                                                @if(isset($storeBelongs) && $storeBelongs && in_array('employee_update', $canDo))
                                                <li><a href="{{ $employee->id }}/edit"><i class="far fa-edit"></i></a></li>
                                                @endif
                                                @if(isset($storeBelongs) && $storeBelongs && in_array('employee_delete', $canDo))
                                                <li><a class="dropdown-item" data-target-id="{{$employee->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
                                                @endif

                                                {{--                                                <li><a href="#"><i class="far fa-edit"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="fas fa-print"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="fas fa-download"></i></a></li>--}}
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="info-table table-responsive">
                                        <table class="table text-nowrap">
                                            <tbody>
                                            <tr>
                                                <td>ID No:</td>
                                                <td class="font-medium text-dark-medium">{{ $employee->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>First Name:</td>
                                                <td class="font-medium text-dark-medium">{{ $employee->first_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Last Name:</td>
                                                <td class="font-medium text-dark-medium">{{ $employee->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone:</td>
                                                <td class="font-medium text-dark-medium">{{ $employee->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Joining Date:</td>
                                                <td class="font-medium text-dark-medium">{{ $employee->created_at->format('d F Y H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <td>E-mail:</td>
                                                <td class="font-medium text-dark-medium">{{ $employee->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status:</td>
                                                <td class="font-medium text-dark-medium">{{ ($employee->active)? 'Active' : 'Suspended'}}</td>
                                            </tr>
                                            @if($employee->hasLicensor())
                                            <tr>
                                                <td>Licensor:</td>
                                                <td class="font-medium text-dark-medium">{{ $employee->licensor->name}}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td>Role:</td>
                                                <td class="font-medium text-dark-medium">{{ $employee->role()->name }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab5" role="tabpanel">
                        <div hidden class="alert alert-success wallet-success">{{ 'You have updated the wallet balance'  }}</div>
                        <div class="card-body p-0 pt-2">
                            <div class="counter-box text-center white r-3">
                                <div class="p-2">
                                    <div class="mt-2">
                                        <span><i class="fas fa-5x fa-wallet"></i></span>
                                    </div>
                                    <div class="counter-title p-t-b-2 mt-4 s-18">Balance</div>
                                    <h3 id="balance1" class="mt-4 s-36">R{{$employee->wallet->balance }}</h3>

                                    @if($isNotA !== 'true' )

                                    <form action="/employees/topup" id="walletTopupForm" >
                                        @csrf
                                        <input type="hidden" name="employee_id" value="{{ $employee->id }}" />
                                        <input type="hidden" name="licensor_id" value="{{ ($employee->role()->id != 1 ) ? $employee->licensor->id : 4 }}"/>
                                        <div class="form-group">
                                            <input type="text" style=" width: auto; display: inline-block; margin-bottom: 10px;" class="form-control r-0 light" name="amount" value="" />
                                        </div>
                                    </form>

                                    <button  type="submit" id="submitBtn" class="btn-fill-lg submitBtn btn-gradient-yellow btn-hover-bluedark">Top Up</button>

                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="credit-card" role="tabpanel">
                        <div class="card-body p-0 pt-2">
                            @component('components.table.credit-card',['cards' => $employee->cards ])
                                Card table Component
                            @endcomponent
                        </div>
                    </div>
                    @if( in_array('transaction_list', $canDo) )
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="card-body p-0 pt-2">
                            @component('components.table.orders',['storeBelongs' => $storeBelongs, 'orders' => $employee->orders, 'canDo' => $canDo ])
                                Orders table Component
                            @endcomponent
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function(){
            $('button#submitBtn').click(function(event) {
                // event.preventDefault();,
                event.preventDefault();
                var $form = $('#walletTopupForm');
                //var $target = $($form.attr('data-target'));
                $.ajax({
                    type: 'POST',
                    url: $form.attr('action'),
                    dataType: 'json',
                    processData: false,
                    data: $form.serialize(),
                    success: function(data) {

                        if(data.status) {
                            $('#balance1').html('R' + data.data.balance );
                            $('.wallet-success').html('You have topped up the wallet balance by R' + $form.find('input[name=amount]').val() +
                                ' Please refresh to see the wallet transaction in the Purchases tab ');
                            $('.wallet-success').removeAttr('hidden');
                            $form.find('input[name=amount]').val('');
                        } else {
                            $form.find('input[name=amount]').addClass('is-invalid');
                        }
                    }
                });
            });

        })

    </script>
@endsection
