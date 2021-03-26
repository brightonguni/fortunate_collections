<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $package->name }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('package_update', $canDo))
              <li><a href="/package/{{ $package->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('package_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$package->id}}" 
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
            <td class="font-medium text-dark-medium">{{ $package->id }}</td>
          </tr>
          <td>
            <img 
              style="padding-right: 15px;" 
              src="{{URL::asset('assets/images/packages/'.$package->avatar)}}" 
              alt="no image"
            >
          </td>
          <tr>
            <td>Name:</td>
            <td class="font-medium text-dark-medium">{{ $package->name }}</td>
          </tr>
          <tr>
            <td>Description:</td>
            <td class="font-medium text-dark-medium">{{ $package->description }}</td>
          </tr>
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $package->active }}</td>
          </tr>
          <tr>
              <td>Service:</td>
              <td class="font-medium text-dark-medium">{{ $package->service->title}}</td>
          </tr>
          <tr>
              <td>Licensor:</td>
              <td class="font-medium text-dark-medium">{{ $package->licensor->name}}</td>
          </tr>
          <tr>
              <td>Store:</td>
              <td class="font-medium text-dark-medium">{{ $package->store->name}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- package Single Info Details Table Area End Here   -->
