<?php

namespace App\Repositories\Dashboard;

use App\Models\Admin;

class AdminsRepository
{
    public function getAdmins()
    {
        return Admin::select('id', 'email', 'name', 'created_at', 'role_id', 'status')->paginate();
    }
    public function getAdminById($id)
    {
        return Admin::find($id);
    }
    public function createAdmin($request)
    {
        return Admin::create($request);
    }
    public function updateAdmin($data, $admin)
    {
        $admin = $admin->update($data);
        return $admin;
    }
    public function deleteAdmin($admin)
    {
        return $admin->delete();
    }
    public function changeStatus($admin, $status)
    {
        $admin->update([
            'status' => $status
        ]);
        return $admin;
    }
}
