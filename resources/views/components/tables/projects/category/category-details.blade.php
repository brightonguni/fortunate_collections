<div class="single-info-details pt-5">
  <div class="item-img">
    <img src="{{URL::asset('assets/images/projects/category/'.$project_category->avatar)}}" alt="">
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $project_category->title }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('project_category_update', $canDo))
            <li><a href="/project-category/{{ $project_category->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('project_category_delete', $canDo))
            <li><a class="dropdown-item" data-target-id="{{$project_category->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
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
            <td class="font-medium text-dark-medium">{{ $project_category->id }}</td>
          </tr>
          <tr>
            <td>Title:</td>
            <td class="font-medium text-dark-medium">{{ $project_category->title }}</td>
          </tr>
          <tr>
            <td>Description:</td>
            <td class="font-medium text-dark-medium">{{ $project_category->description }}</td>
          </tr>
          <tr>
            <td>Start Date:</td>
            <td class="font-medium text-dark-medium">{{ $project_category->created_at->format('d F Y H:i') }}</td>
          </tr>
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $project_category->active }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
