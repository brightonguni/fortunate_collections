<div class="single-info-details pt-5">
  <div class="item-img">
    <img src="{{URL::asset('assets/images/products/brand/'.$brand->avatar)}}" alt="">
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $brand->name }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('product_brand_update', $canDo))
            <li><a href="/product-brand/{{ $brand->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('product_brand_delete', $canDo))
            <li><a class="dropdown-item" data-target-id="{{$brand->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
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
            <td class="font-medium text-dark-medium">{{ $brand->id }}</td>
          </tr>
          <tr>
            <td>brand Name:</td>
            <td class="font-medium text-dark-medium">{{ $brand->name }}</td>
          </tr>
          <tr>
            <td>Description:</td>
            <td class="font-medium text-dark-medium">{{ $brand->description }}</td>
          </tr>
          <tr>
            <td>Start Date:</td>
            <td class="font-medium text-dark-medium">{{ $brand->created_at->format('d F Y H:i') }}</td>
          </tr>
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $brand->active }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
