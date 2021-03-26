<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-5">
  <div class="item-content">
    <div class="header-inline item-header">
      <h3 class="text-dark-medium font-medium">{{ $faq->name }}</h3>
      <div class="header-elements">
        <ul>
          <ul>
            @if(in_array('faq_update', $canDo))
              <li><a href="/faqs/{{ $faq->id }}/edit"><i class="far fa-edit"></i></a></li>
            @endif
            @if(in_array('faq_delete', $canDo))
              <li>
                <a 
                  class="dropdown-item" 
                  data-target-id="{{$faq->id}}" 
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
            <td class="font-medium text-dark-medium">{{ $faq->id }}</td>
          </tr>
          <tr>
            <td>Name:</td>
            <td class="font-medium text-dark-medium">{{ $faq->name }}</td>
          </tr>
          <tr>
            <td>Description:</td>
            <td class="font-medium text-dark-medium">{{ $faq->description }}</td>
          </tr>
          <tr>
            <td>Status:</td>
            <td class="font-medium text-dark-medium">{{ $faq->active }}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- faq Single Info Details Table Area End Here   -->
