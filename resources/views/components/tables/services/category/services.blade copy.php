<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>Service Categories</h3>
      </div>
      <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
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
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($servicesCategories as $category)
          <tr>
            {{--<td class="p-0"></td>--}}
            <td>
              <div class="form-check">
                <input type="checkbox" class="form-check-input">
                <label class=" form-check-label">&nbsp;</label>
              </div>
            </td>
            <td>{{ $category->id }}</td>
            <td>
              <img style="padding-right: 15px;" src="{{asset('img/figure/student2.png')}}" alt="student">

            </td>
            <td>{{ $category->title}}</td>
            <td>{{ $category->description }}</td>
            <td class="text-center">
              <span>
                <i class="fas {{(!empty($service->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle">
                </i>
              </span>
              &nbsp;
              <span hidden>{{ ($category->active) }}</span>
            </td>
            <td>
              @component('components.menus.services.categories', ['canDo' => $canDo])
              @slot('id')
              {{$category->id}}
              @endslot
              service-category-Menu Component
              @endcomponent
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Skills Table Area End Here -->