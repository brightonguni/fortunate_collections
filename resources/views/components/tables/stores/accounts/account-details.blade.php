<!-- account Single Info Details Table Area Start Here -->
<div class="single-info-details pt-4">
    <div class="item-content">
        <div class="header-inline item-header">
            <h3 class="text-dark-medium font-medium">{{ $account->name }}</h3>
            <div class="header-elements">
              <ul>
                @if( in_array('store_account_update', $canDo))
                <li><a href="/store-account/{{ $account->id }}/edit"><i class="far fa-edit"></i></a></li>
                @endif
                    @if( in_array('store_account_delete', $canDo))
                <li><a class="dropdown-item" data-target-id="{{$account->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
                @endif

              </ul>
            </div>
        </div>
        <div class="info-table table-responsive">
            <table class="table text-nowrap">
                <tbody>
                <tr>
                    <td>ID No:</td>
                    <td class="font-medium text-dark-medium">{{ $account->id }}</td>
                </tr>
                <tr>
                    <td>Account Name:</td>
                    <td class="font-medium text-dark-medium">{{ $account->account_name }}</td>
                </tr>
                <tr>
                    <td>Account Type:</td>
                    <td class="font-medium text-dark-medium">{{ $account->account_type }}</td>
                </tr>
                <tr>
                    <td>Account Number:</td>
                    <td class="font-medium text-dark-medium">{{ $account->account_number }}</td>
                </tr>
                <tr>
                    <td>Branch Code:</td>
                    <td class="font-medium text-dark-medium">{{ $account->bank->branch_code }}</td>
                </tr>
                <tr>
                    <td>Bank:</td>
                    <td class="font-medium text-dark-medium">{{ $account->bank->name }}</td>
                </tr>
                <tr>
                    <td>Joining Date:</td>
                    <td class="font-medium text-dark-medium">{{ $account->created_at->format('d F Y H:i') }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- account Single Info Details Table Area End Here -->

