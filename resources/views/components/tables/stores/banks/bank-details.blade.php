<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-4">
    <div class="item-content">
        <div class="header-inline item-header">
            <h3 class="text-dark-medium font-medium">{{ $bank->name }}</h3>
            <div class="header-elements">
              <ul>
                @if( in_array('store_bank_update', $canDo) )
                <li><a href="/store-bank/{{ $bank->id }}/edit"><i class="far fa-edit"></i></a></li>
                @endif
                    @if( in_array('store_bank__delete', $canDo) )
                <li><a class="dropdown-item" data-target-id="{{$bank->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
                @endif

              </ul>
            </div>
        </div>
        <div class="info-table table-responsive">
            <table class="table text-nowrap">
                <tbody>
                <tr>
                    <td>ID No:</td>
                    <td class="font-medium text-dark-medium">{{ $bank->id }}</td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td class="font-medium text-dark-medium">{{ $bank->name }}</td>
                </tr>
                <tr>
                    <td>Bank:</td>
                    <td class="font-medium text-dark-medium">{{ $bank->branch_code }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Store Single Info Details Table Area End Here -->

