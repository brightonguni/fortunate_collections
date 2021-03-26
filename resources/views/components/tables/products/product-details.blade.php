<div class="row single-info-details pt-5">
  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 p-1">
    <div class="item-img p-1">
        <img src="{{URL::asset('assets/images/products/'.$product->avatar)}}" alt="no images">
    </div>
    <div class="item-img">
        <img src="{{URL::asset('assets/images/products/'.$product->product_avatar)}}" alt="no images">
    </div>
  </div>
  <div class=" col-xs-12 col-sm-12 col-md-9 col-lg-9  p-1 item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $product->name }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('product_update', $canDo))
              <li><a href="/product/{{ $product->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('product_delete', $canDo))
              <li><a class="dropdown-item" data-target-id="{{$product->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
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
                <td class="font-medium text-dark-medium">{{ $product->id }}</td>
            </tr>
            <tr>
                <td>Name:</td>
                <td class="font-medium text-dark-medium">{{ $product->name }}</td>
            </tr>
            <tr>
              <td>
                <ul>
                  <li>Main Categories</li>
                  @foreach($product->categories as  $category)
                    <li class="btn bg-gradient-twitter btn-sm p-1 m-1"><a href="{{ route('product_category.show',['id' =>$category->id]) }}">{{  $category->title }}</a></li>
                  @endforeach
                </ul>
              </td>
            </tr>
            <tr>
              <td>
                <ul>
                  <li>Sub Categories</li>
                  @foreach($product->sub_categories as $sub_category)
                    <li class="btn bg-gradient-gplus btn-sm p-1 m-1">{{ $sub_category->title }}</li>
                  @endforeach
                </ul>
              </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td class="font-medium text-dark-medium">{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Start Date:</td>
                <td class="font-medium text-dark-medium">{{ $product->created_at->format('d F Y H:i') }}</td>
            </tr>
            <tr>
                <td>Status:</td>
                <td class="font-medium text-dark-medium">{{ $product->active }}</td>
            </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
    
