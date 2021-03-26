<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>Product Sub Categories</h3>
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
                <th>Category</th>
                <th>Description</th>
                <th>Licensor</th>
                <th>Store</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
          <tbody>
          @foreach($sub_categories as  $sub_category)
            <tr>
              <td>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input">
                  <label class=" form-check-label">&nbsp;</label>
                </div>
              </td>
              <td>{{ $sub_category->id }}</td>
              <td>
                <img style="padding-right: 15px;" 
                src="{{URL::asset('assets/images/products/sub-category'.$sub_category->avatar)}}" 
                alt=""
              ></td>
              <td>
                {{ $sub_category->title}}
              </td>
              <td>{{ $sub_category->category->title }}</td>
              <td>{{ str_limit($sub_category->description,'80') }}</td>
              <td>{{ $sub_category->licensor->name}}</td>
              <td>{{ $sub_category->store->name }}</td>
              <td class="text-center">
                <span>
                  <i class="fas {{(!empty($sub_category->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                  >
                  </i>
                  </span> &nbsp; <span hidden>
                >
                  {{ ($sub_category->active) }}
                </span>
              </td>
              <td>
                @component('components.menus.products.sub-categories', ['canDo' => $canDo])
                  @slot('id')
                    {{$sub_category->id}}
                  @endslot
                  product sub category-Menu Component
                @endcomponent
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

