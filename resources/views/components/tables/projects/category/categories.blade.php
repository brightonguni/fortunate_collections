<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>Project Categories</h3>
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
          @foreach($project_categories as  $category)
            <tr>
              <td>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input">
                  <label class=" form-check-label">&nbsp;</label>
                </div>
              </td>
              <td>{{ $category->id }}</td>
              <td>
                <img class="pr-2 img-responsive" src="{{URL::asset('assets/images/projects/category/'.$category->avatar)}}" alt="">
              </td>
              <td>{{ $category->title}}</td>
              <td>{{ $category->description }}</td>
              <td>{{ $category->licensor->name}}</td>
              <td>{{ $category->store->name }}</td>
              <td class="text-center">
                <span>
                  <i class="fas {{(!empty($category->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"></i>
                </span> &nbsp; <span hidden>{{ ($category->active) }}</span>
              </td>
              <td>
                @component('components.menus.projects.categories', ['canDo' => $canDo])
                  @slot('id')
                    {{$category->id}}
                  @endslot
                  project category-Menu Component
                @endcomponent
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

