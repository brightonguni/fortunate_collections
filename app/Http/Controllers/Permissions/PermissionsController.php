<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\Repositories\Permissions\PermissionRepository;

class PermissionsController extends Controller
{
    protected $permission;

    public function __construct(PermissionRepository $permission)
    {
        $this->middleware('auth');
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     *
     */
    public function index()
    {
        $roles = $this->permission->allRoles();
        $permissions = $this->permission->all();
        //$permRoles   = $this->permission->allPermissionRoles();
        //var_dump($permissions[76]->permissionRoles[0]->role_id );
        //print_r($permissions);
        return view('pages.permissions.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        return $this->permission->store($this->permission->submission());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update()
    {
        //return $this->permission->store()
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
