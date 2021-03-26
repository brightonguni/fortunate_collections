<div class="single-info-details pt-5">
  <div class="item-img">
   <div class="category-image"><img src="{{ URL::asset('assets/images/products/color/'. $color->avatar )}}"></div>
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $color->name }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('product_color_update', $canDo))
            <li><a href="/product-color/{{ $color->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('product_color_delete', $canDo))
            <li><a class="dropdown-item" data-target-id="{{$color->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
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
            <td class="font-medium text-dark-medium">{{ $color->id }}</td>
          </tr>
          
          <tr>
            <td>color Name:</td>
            <td class="font-medium text-dark-medium">{{ $color->name }}</td>
          </tr>
          <tr>
            <td>Description:</td>
            <td class="font-medium text-dark-medium">{{ $color->description }}</td>
          </tr>
          <tr>
            <td>Start Date:</td>
            <td class="font-medium text-dark-medium">{{ $color->created_at->format('d F Y H:i') }}</td>
          </tr>
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $color->active }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
