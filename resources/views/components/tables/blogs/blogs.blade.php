<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>All Blog Articles</h3>
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
            <th>Author</th>
            <th>Image</th>
            <th>Title</th>
            <th>Departments</th>
            <th>Description</th>
            <th>Categories</th>
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
            <tbody>
              @foreach($blogs as  $blog)
                <tr>
                  {{--<td class="p-0"></td>--}}
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input">
                      <label class=" form-check-label">&nbsp;</label>
                    </div>
                  </td>
                  <td>{{ $blog->id }}</td>
                   <td>{{ $blog->user->name }}</td>
                  <td>
                    <img style="padding-right: 15px;" 
                      src="{{URL::asset('assets/images/blogs/'.$blog->avatar)}}" 
                      alt="no service image">
                                    
                  </td>
                  <td>{{ str_limit($blog->title,'20')}}</td>
                  <td>
                    @foreach($blog->departments  as $department)
                    <ul>
                        <li class="btn bg-gradient-twitter btn-sm p-1 m-1">{{ $department->name }}</li>
                    </ul>
                    @endforeach
                  </td>
                  <td>{{str_limit( $blog->description,'50') }}</td>
                  <td>
                    @foreach($blog->categories  as $category)
                    <ul>
                        <li class="btn bg-gradient-gplus btn-sm p-1 m-1">{{ $category->title }}</li>
                    </ul>
                    @endforeach
                  </td>
                  
                  <td class="text-center">
                    <span>
                      <i class="fas {{(!empty($blog->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                      >
                      </i>
                    </span> 
                    &nbsp; 
                    <span hidden>{{ ($blog->active) }}</span>
                  </td>
                    <td>
                      @component('components.menus.blogs', ['canDo' => $canDo])
                        @slot('id')
                          {{$blog->id}}
                        @endslot
                          Blog-Menu Component
                        @endcomponent
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
<!-- Skills Table Area End Here -->

