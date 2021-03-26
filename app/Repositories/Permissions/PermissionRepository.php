<?php

    namespace App\Repositories\Permissions;

    use App\Entities\Licensors\Form;
    use App\Helpers\RepositoryInterface;
    use App\Model\Permissions\Permission;
    use App\Model\Permissions\PermissionRole;
    use App\Model\Permissions\Role;
    use Validator;

    class PermissionRepository extends Form implements RepositoryInterface {

        public function allRoles()
        {
            return Role::with('permissionRoles')->get() ; //all()
        }

        /**
         * Get's specific resource by it's ID
         *
         * @param int
         */
        public function get($id)
        {

        }

        public function all()
        {
            return Permission::with('permissionRoles')->get();
        }

        public function allPermissionRoles()
        {
            return PermissionRole::all();
        }

        public function delete($id)
        {

        }

        public function update($id, array $data)
        {

        }

        public function store(array $data)
        {
            //echo '<pre>';

            foreach($data['role'] as $role_id => $r_val) {

                $role_permissions = [];
                foreach($r_val as $v) {
                    $role_permissions[] = $v;
                }
                Role::find($role_id)->permissions()->sync($role_permissions);

            }

            return redirect('permissions/')->with('success', 'You have successfully updated the permissions');

        }

    }
