<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AdminsRepository;

class AdminService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public AdminsRepository $adminsRepository)
    {
        //
    }
    public function getAdmins()
    {
        return $this->adminsRepository->getAdmins();
    }
    public function getAdminById($id)
    {
        $admin = $this->adminsRepository->getAdminById($id);
        if (!$admin) {
            abort(404);
        }
        return $admin;
    }
    public function createAdmin($request)
    {
        return $this->adminsRepository->createAdmin($request);
    }
    public function updateAdmin($data, $id)
    {
        $admin = $this->adminsRepository->getAdminById($id);
        if (!$admin) {
            abort(404);
        }
        if ($data['password'] == null) {
            unset($data['password']);
        }
        $admin = $this->adminsRepository->updateAdmin($data, $admin);
        if (!$admin) {
            false;
        }
        return $admin;
    }
    public function deleteAdmin($id)
    {
        $admin = $this->adminsRepository->getAdminById($id);
        if (!$admin) {
            abort(404);
        }
        $admin = $this->adminsRepository->deleteAdmin($admin);
        return $admin;
    }
    public function changeStatus($id)
    {
        $admin = $this->adminsRepository->getAdminById($id);
        if (!$admin) {
            abort(404);
        }
        $admin->status() == 'Active' ? $status = 0 : $status = 1;
        $status = $this->adminsRepository->changeStatus($admin, $status);
        return $status;
    }
}
