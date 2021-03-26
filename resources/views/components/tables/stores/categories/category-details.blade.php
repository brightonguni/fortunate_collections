<!-- Store Single Info Details Table Area Start Here -->
<div class="single-info-details pt-4">
    <div class="item-img">
        @if(!empty($category->avatar))
          <img style="padding-right: 15px;" src="{{URL::asset('assets/images/store/category/'.$category->avatar)}}" alt="no image">
        @endif
    </div>
    <div class="item-content">
        <div class="header-inline item-header">
            <h3 class="text-dark-medium font-medium">{{ $category->title }}</h3>
            <div class="header-elements">
              <ul>
                @if( in_array('store_category_update', $canDo))
                <li><a href="/store-category/{{ $category->id }}/edit"><i class="far fa-edit"></i></a></li>
                @endif
                    @if( in_array('store_category_delete', $canDo))
                <li><a class="dropdown-item" data-target-id="{{$category->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
                @endif

              </ul>
            </div>
        </div>
        <div class="info-table table-responsive">
            <table class="table text-nowrap">
                <tbody>
                <tr>
                    <td>ID No:</td>
                    <td class="font-medium text-dark-medium">{{ $category->id }}</td>
                </tr>
                <td>Image</td>
                 <td><img style="padding-right: 15px;" src="{{URL::asset('assets/images/store/category/'.$category->avatar)}}" alt="no image"></td>
                <tr>
                    <td>Name:</td>
                    <td class="font-medium text-dark-medium">{{ $category->title }}</td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td class="font-medium text-dark-medium">{{ $category->description }}</td>
                </tr>
                <tr>
                    <td>Joining Date:</td>
                    <td class="font-medium text-dark-medium">{{ $category->created_at->format('d F Y H:i') }}</td>
                </tr>
              </tbody>
          </table>
        </div>
    </div>
</div>

<!-- Store Single Info Details Table Area End Here -->

