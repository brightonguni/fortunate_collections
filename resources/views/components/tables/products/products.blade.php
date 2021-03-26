<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>All Products</h3>
      </div>
      <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button"
          data-toggle="dropdown" aria-expanded="false">...</a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
          </div>
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
                <th>Image</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Color</th>
                <th>Categories</th>
                <th>Sub Categories</th>
                <th>Unit Price</th>
                <th>Stock</th>
                <th>Description</th>
                {{-- <th>Licensor</th> --}}
                <th>Business</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
          <tbody>
          @foreach($products as  $product)
            <tr>
              <td>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input">
                  <label class=" form-check-label">&nbsp;</label>
                </div>
              </td>
              <td>{{ $product->id }}</td>
              <td>
                <img style="padding-right: 15px;" 
                src="{{URL::asset('assets/images/products/'.$product->avatar)}}" 
                alt="no image"
              >
              </td>
              <td>
                {{ $product->name}}
              </td>
              <td>
                <img  class="img-responsive" style="padding-right: 15px;" src="{{ URL::asset('assets/images/products/brand/'.$product->brand->avatar)}}"  alt="{{  $product->brand->name}}" >
              </td>
              <td>
                <img  class="img-responsive"  style="padding-right: 15px;" src="{{ URL::asset('assets/images/products/color/'.$product->color->avatar)}}"  alt="{{  $product->color->name}}" >
              </td>
              <td>
                <ul>
                  @foreach($product->categories as  $category)
                    <li class="btn bg-gradient-twitter btn-sm p-1 m-1">{{ $category->title }}</li>
                  @endforeach
                </ul>
              </td>
              <td>
                <ul>
                  @foreach($product->sub_categories as $sub_category)
                    <li class="btn bg-gradient-gplus btn-sm p-1 m-1">{{ $sub_category->title }}</li>
                  @endforeach
                </ul>
              </td>
              <td>{{ $product->unit_price }}</td>
              <td>{{ $product->stock }}</td>
              <td>{{ str_limit($product->description,'80') }}</td>
              {{-- <td>{{ $product->licensor->name}}</td> --}}
              <td>{{ $product->store->name }}</td>
              <td class="text-center">
                <span>
                  <i class="fas {{(!empty($product->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                  >
                  </i>
                  </span> &nbsp; <span hidden>
                >
                  {{ ($product->active) }}
                </span>
              </td>
              <td>
                @component('components.menus.products', ['canDo' => $canDo])
                  @slot('id')
                    {{$product->id}}
                  @endslot
                  product-Menu Component
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

