<!-- Users Table Area Start Here -->
<div class="height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>All Accounts</h3>
            </div>
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
                    <th>Account Type</th>
                    <th>Account Number</th>
                    <th>Brach Code</th>
                    <th>Store</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($accounts as  $account)

                    <tr>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input">
                                <label class="form-check-label">&nbsp;</label>
                            </div>
                        </td>
                        <td>{{ $account->id }}</td>
                        <td> {{ $account->bank->name}}</td>
                        <td>{{ $account->account_name }}</td>
                        <td>{{ $account->account_number }}</td>
                        <td>{{ $account->account_type }}</td>
                        <td>{{ $account->bank->branch_code }}</td>
                        <td>{{ $account->status }}</td>
                        <td>
                             @component('components.menus.stores.accounts.accounts', ['canDo' => $canDo,'accounts'=>$accounts ])
                                 @slot('id')
                                     {{$account->id}}
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

