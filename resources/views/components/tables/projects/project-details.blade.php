<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
    <div class="item-img">
        <img src="{{URL::asset('assets/images/projects/'.$project->avatar)}}" alt="no image">
    </div>
    <div class="item-content">
        <div class="header-inline item-header">
            <h3 class="text-dark-medium font-medium">{{ $project->name }}</h3>
            <div class="header-elements">
                <ul>
                    <ul>
                        @if(in_array('project_update', $canDo))
                        <li><a href="/users/{{ $project->id }}/edit"><i class="far fa-edit"></i></a></li>
                        @endif
                        @if(in_array('project_delete', $canDo))
                        <li><a class="dropdown-item" data-target-id="{{$project->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
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
                    <td class="font-medium text-dark-medium">{{ $project->id }}</td>
                </tr>
                <tr>
                    <td>Project Name:</td>
                    <td class="font-medium text-dark-medium">{{ $project->name }}</td>
                </tr>
                <tr>
                  <td>
                    <ul>
                      <li>Project Categories</li>
                      @foreach($project->categories as $category)
                        <li>{{ $category->title }}</li>
                      @endforeach
                    </ul>
                  </td>
                </tr>
                <tr>
                  <td>
                    <ul>
                      <li>Project Sub Categories</li>
                      @foreach($project->sub_categories as $sub_category)
                        <li>{{ $sub_category->title }}</li>
                      @endforeach
                    </ul>
                  </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td class="font-medium text-dark-medium">{{ $project->description }}</td>
                </tr>
                <tr>
                    <td>Published Date:</td>
                    <td class="font-medium text-dark-medium">{{ $project->created_at->format('d F Y H:i') }}</td>
                </tr>
                <tr>
                     <td>Earliest Start Date</td>
                    <td class="font-medium text-dark-medium">{{ $project->start_date }}</td>
                </tr>
                <tr>
                    <td>Earliest Ending Date</td>
                    <td class="font-medium text-dark-medium">{{ $project->end_date }}</td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td class="font-medium text-dark-medium">{{ $project->active }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Store Single Info Details Table Area End Here -->
