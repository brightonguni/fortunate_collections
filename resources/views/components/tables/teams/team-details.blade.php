<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
  <div class="item-img">
    <img src="{{asset('img/figure/teacher.jpg')}}" alt="teacher">
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $customer->name }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('customer_update', $canDo))
              <li><a href="/users/{{ $customer->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('customer_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$customer->id}}" 
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
            <td class="font-medium text-dark-medium">{{ $customer->id }}</td>
          </tr>
          <tr>
            <td>First Name:</td>
            <td class="font-medium text-dark-medium">{{ $customer->first_name }}</td>
          </tr>
          <tr>
            <td>Last Name:</td>
            <td class="font-medium text-dark-medium">{{ $customer->last_name }}</td>
          </tr>
          <tr>
            <td>Phone:</td>
            <td class="font-medium text-dark-medium">{{ $customer->phone }}</td>
          </tr>
          <tr>
            <td>Joining Date:</td>
            <td class="font-medium text-dark-medium">{{ $customer->created_at->format('d F Y H:i') }}</td>
          </tr>
          <tr>
            <td>E-mail:</td>
            <td class="font-medium text-dark-medium">{{ $customer->email }}</td>
          </tr>
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $customer->active }}</td>
          </tr>
          <tr>
            <td>Role:</td>
            <td class="font-medium text-dark-medium">{{ $customer->role()->name }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Store Single Info Details Table Area End Here   -->
