<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
  <div class="item-img">
    <img src="{{asset('img/figure/teacher.jpg')}}" alt="teacher">
  </div>
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $case_study->title }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('case_study_update', $canDo))
              <li><a href="/case_study/{{ $case_study->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('case_study_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$case_study->id}}" 
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
            <td class="font-medium text-dark-medium">{{ $case_study->id }}</td>
          </tr>
          <tr>
            <td>case_study Title:</td>
            <td class="font-medium text-dark-medium">{{ $case_study->title }}</td>
          </tr>
          <tr>
            <td>Category:</td>
            <td class="font-medium text-dark-medium">{{ $case_study->category_id }}</td>
          </tr>
          <tr>
            <td>Description:</td>
            <td class="font-medium text-dark-medium">{{ $case_study->description }}</td>
          </tr>
          
          <tr>
            <td>Created Date:</td>
            <td class="font-medium text-dark-medium">{{ $case_study->created_at->format('d F Y H:i') }}</td>
          </tr>
          
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $case_study->active }}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Skill Single Info Details Table Area End Here   -->
