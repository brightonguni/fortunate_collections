
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif

    <form class="pt-2" data-async data-target="#edit" id="rolesForm" action="{{ route('permissions.store') }}" novalidate
          _lpchecked="1" method="POST">
        @csrf

        <input name="_method" type="hidden" value="POST" />

        <!-- fo -->
        @include('components.tables.permissions.roles' ,['roles' => $roles, 'permissions' => $permissions ])

        <div class="row">
            <div class="col-12">
                <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
            </div>
        </div>
</form>
