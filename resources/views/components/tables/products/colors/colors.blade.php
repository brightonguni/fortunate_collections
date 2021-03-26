<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>Product Colours</h3>
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
                <th>Title</th>
                <th>Description</th>
                <th>Licensor</th>
                <th>Store</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
          <tbody>
          @foreach($colors as  $color)
            <tr>
              <td>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input">
                  <label class=" form-check-label">&nbsp;</label>
                </div>
              </td>
              <td>{{ $color->id }}</td>
              <td>
                <img style="padding-right: 15px;" 
                src="{{asset('assets/images/products/color'.$color->avatar)}}" 
                alt=""
              ></td>
              <td>
                {{ $color->title}}
              </td>
              <td>{{ str_limit($color->description,'80') }}</td>
              <td>{{ $color->licensor->name}}</td>
              <td>{{ $color->store->name }}</td>
              <td class="text-center">
                <span>
                  <i class="fas {{(!empty($color->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                  >
                  </i>
                  </span> &nbsp; <span hidden>
                >
                  {{ ($color->active) }}
                </span>
              </td>
              <td>
                @component('components.menus.products.colors', ['canDo' => $canDo])
                  @slot('id')
                    {{$color->id}}
                  @endslot
                  product color-Menu Component
                @endcomponent
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

