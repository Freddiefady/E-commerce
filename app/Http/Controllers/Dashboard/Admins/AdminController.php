<?php

namespace App\Http\Controllers\Dashboard\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Services\Dashboard\AdminService;
use App\Services\Dashboard\RolesService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(public AdminService $adminService, public RolesService $rolesService)
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = $this->adminService->getAdmins();
        return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->rolesService->getRoles();
        return view('dashboard.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        if (! $this->adminService->createAdmin($request->only(['name', 'email', 'password', 'status', 'role_id']))) {
            return redirect()->back()->with('error', __('dashboard.msg_error_admin'));
        }
        return redirect()->route('dashboard.admins.index')->with('success', __('dashboard.msg_success_admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = $this->rolesService->getRoles();
        if (!$admin = $this->adminService->getAdminById($id)) {
            return redirect()->back()->with('error', __('dashboard.msg_error_admin'));
        }
        return view('dashboard.admins.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        if (! $this->adminService->updateAdmin($request->only(['name', 'email', 'password', 'role_id', 'status']), $id)) {
            return redirect()->back()->with('error', __('dashboard.msg_error_admin'));
        }
        return redirect()->route('dashboard.admins.index')->with('success', __('dashboard.msg_success_update_admin'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->adminService->deleteAdmin($id);
        return redirect()->back()->with('success', __('dashboard.msg_success_delete_admin'));
    }
    public function changeStatus($id)
    {
        if (!$this->adminService->changeStatus($id)) {
            return redirect()->back()->with('error', __('dashboard.msg_error_admin'));
        }
        return redirect()->back()->with('success', __('dashboard.msg_success_change_status_admin'));
    }
}
