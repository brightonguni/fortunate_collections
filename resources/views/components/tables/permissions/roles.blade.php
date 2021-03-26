<div class="card height-auto">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>All Roles</h3>
      </div>
      <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button"
           data-toggle="dropdown" aria-expanded="false">...</a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table id="nopagination" class="table display  table-with-images text-nowrap">
        <thead>
          <tr>
            <th>
              <div class="form-check">
                <input type="checkbox" class="form-check-input checkAll">
                <label class="form-check-label">ID</label>
              </div>
            </th>
            <th>Permission</th>
            @foreach($roles as $role)
              @if($role->name != 'Customer')
                <th>{{$role->name }}</th>
              @endif
            @endforeach
            {{--<th> </th>--}}
          </tr>
        </thead>
        <tbody>
          @foreach($permissions as $permission)
            <tr {{ ( explode(' ', $permission->description)[0] == 'Permission' ) ? 'hidden' : ''  }} >
              <td>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input">
                  <label class="form-check-label">{{ $permission->id }}</label>
                </div>
              </td>
              <td>{{ $permission->description }}</td>
              {{--{{$permissions[76]->permissionRoles[0]->role_id}}--}}
              @foreach($roles as $role)
                @if($role->name != 'Customer')
                  <td>
                    <div class="form-check">
                      @php
                          $checked=""
                      @endphp
                      @if( isset( $role->permissionRoles ) )
                        @foreach($role->permissionRoles as $pR)
                          @if($pR->permission_id == $permission->id )
                            @php $checked="checked"; @endphp
                            @break
                          @endif
                        @endforeach
                      @endif
                      <input type="checkbox" {{ ($checked) }} name="role[{{ $role->id }}][{{ $role->id }}_{{$permission->id}}]" value="{{$permission->id}}" class="form-check-input" />
                      <label class="form-check-label">&nbsp;</label>
                    </div>
                  </td>
                @endif
              @endforeach
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Licensors Area End Here -->

