<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $department->name }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('department_update', $canDo))
              <li><a href="/departments/{{ $department->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('department_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$department->id}}" 
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
            <td class="font-medium text-dark-medium">{{ $department->id }}</td>
          </tr>
          <tr>
            <td>Name:</td>
            <td class="font-medium text-dark-medium">{{ $department->name }}</td>
          </tr>
          <tr>
            <td>Description:</td>
            <td class="font-medium text-dark-medium">{{ $department->description }}</td>
          </tr>
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $department->active }}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- department Single Info Details Table Area End Here   -->
