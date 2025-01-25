<?php

namespace App\Repositories\Dashboard;

use App\Models\Role;

class RolesRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getRoleById($id)
    {
        return Role::find($id);
    }
    public function createRole($request)
    {
        $role = Role::create([
            'role'=>[
                'en'=>$request->role['en'],
                'ar'=>$request->role['ar'],
            ],
            'permissions'=>json_encode($request->permissions)
        ]);
        return $role;
    }
    public function getRoles()
    {
        $roles = Role::select('id', 'role', 'permissions')->get();
        return $roles;
    }
    public function updateRole($request, $role)
    {
        $role->update([
            'role'=>$request->role,
            'permissions'=>json_encode($request->permissions)
        ]);
        return $role;
    }
    public function destroyRole($role)
    {
        return $role->delete();
    }
}
