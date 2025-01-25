<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\RolesRepository;

class RolesService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public RolesRepository $rolesRepository)
    {
        //
    }
    public function getRoleById($id)
    {
        return $this->rolesRepository->getRoleById($id);
    }
    public function createRole($request)
    {
        return $this->rolesRepository->createRole($request);
    }
    public function getRoles()
    {
        return $this->rolesRepository->getRoles();
    }
    public function updateRole($request, $id)
    {
        $role = $this->rolesRepository->getRoleById($id);
        if (!$role) {
            return false;
        }
        $role = $this->rolesRepository->updateRole($request, $role);
        return $role;
    }
    public function destroyRole($id)
    {
        $role = $this->rolesRepository->getRoleById($id);
        if ($role->admins->count() > 0 || !$role) {
            return false;
        }
        return $role = $this->rolesRepository->destroyRole($role);
    }
}
