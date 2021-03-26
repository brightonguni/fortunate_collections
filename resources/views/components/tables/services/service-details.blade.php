<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
  <div class="item-img">
   <img style="padding-right: 15px;" 
        src="{{URL::asset('assets/images/services/'.$service->avatar)}}" 
        alt="no service image"
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $service->name }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('service_update', $canDo))
              <li><a href="/service/{{ $service->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('service_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$service->id}}" 
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
            <td class="font-medium text-dark-medium">{{ $service->id }}</td>
          </tr>
          <tr>
            <td>Service Title:</td>
            <td class="font-medium text-dark-medium">{{ $service->title }}</td>
          </tr>
          <tr>
            <td>Categories</td>
            <td>
              <ul>
                @foreach($service->categories as $category)
                <li class="btn bg-gradient-twitter btn-sm p-1 m-1">{{ $category->title }}</li>
                @endforeach
              </ul>
            </td>
          </tr>
          <tr>
            <td>Description:</td>
            <td class="font-medium text-dark-medium">{{ $service->description }}</td>
          </tr>
          
          <tr>
            <td>Created Date:</td>
            <td class="font-medium text-dark-medium">{{ $service->created_at->format('d F Y H:i') }}</td>
          </tr>
          
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $service->active }}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Skill Single Info Details Table Area End Here   -->
