<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $address->title }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('store_address_update', $canDo))
              <li><a href="address/{{ $address->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('store_address_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$address->id}}" 
                  data-toggle="modal" 
                  data-target="#delete"
                >
                  <i class="fas fa-trash-alt"></i>
                </a>
              </li>
            @endif
          </ul>
        </ul>
      </div>
    </div>
    <div class="info-table table-responsive">
      <table class="table text-nowrap">
        <tbody>
          <tr>
            <td>ID No:</td>
            <td class="font-medium text-dark-medium">{{ $address->id }}</td>
          </tr>
          <tr>
              <td>Store:</td>
              <td class="font-medium text-dark-medium">{{ $address->store->name}}</td>
          </tr>
          <tr>
            <td>address Street:</td>
            <td class="font-medium text-dark-medium">{{ $address->street }}</td>
          </tr>
          <tr>
            <td>Suburb:</td>
            <td class="font-medium text-dark-medium">{{ $address->suburb }}</td>
          </tr>
          <tr>
            <td>Postal Code:</td>
            <td class="font-medium text-dark-medium">{{ $address->postal_code }}</td>
          </tr>
          <tr>
            <td>City:</td>
            <td class="font-medium text-dark-medium">{{ $address->city }}</td>
          </tr>
          <tr>
            <td>State / Province:</td>
            <td class="font-medium text-dark-medium">{{ $address->state_province }}</td>
          </tr>
          <tr>
            <td>Country:</td>
            <td class="font-medium text-dark-medium">{{ $address->country }}</td>
          </tr>
          <tr>
            <td>Date Created:</td>
            <td class="font-medium text-dark-medium">{{ $address->created_at->format('d F Y H:i') }}</td>
          </tr>
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ ($address->active)? 'Active' : 'Suspended'}}</td>
          </tr>
          <tr>
              <td>Licensor:</td>
              <td class="font-medium text-dark-medium">{{ $address->licensor->name}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- address Single Info Details Table Area End Here   -->
