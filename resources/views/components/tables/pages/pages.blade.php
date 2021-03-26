<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>All Pages</h3>
      </div>
      <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button"
         data-toggle="dropdown" aria-expanded="false">...</a>
        <div class="dropdown-menu dropdown-menu-right">
          {{-- <a class="dropdown-item" href="{{ route('page.create') }}"><i class="fas fa-times text-orange-red"></i>Close</a>
          <a class="dropdown-item" href="{{ route('page.edit'.['id'=>$pages->id]) }}"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
          <a class="dropdown-item" href="{{ route('page.delete'.['id'=>$pages->id]) }}"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a> --}}
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
            <th>Page</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
            <tbody>
              @foreach($pages as  $page)
                <tr>
                  {{--<td class="p-0"></td>--}}
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input">
                      <label class=" form-check-label">&nbsp;</label>
                    </div>
                  </td>
                  <td>{{ $page->id }}</td>
                  <td>
                    <img 
                      style="padding-right: 15px;" 
                      src="{{asset('img/figure/student2.png')}}" 
                      alt="student"
                    >
                      
                  </td>
                  <td>{{ $page->title}}</td>
                  <td>{{ $page->description }}</td>
                  <td class="text-center">
                    <span>
                      <i class="fas {{(!empty($page->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"></i>
                    </span> 
                    &nbsp; 
                    <span hidden>{{ ($page->active) }}</span>
                  </td>
                  <td>
                    @component('components.menus.pages', ['canDo' => $canDo])
                      @slot('id')
                        {{$page->id}}
                      @endslot
                        Page-Menu Component
                      @endcomponent
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

