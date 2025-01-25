<?php

namespace App\Http\Controllers\Dashboard\Roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RoleRequest;
use App\Services\Dashboard\RolesService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(public RolesService $rolesService)
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->rolesService->getRoles();
        return view('dashboard.Roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.Roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = $this->rolesService->createRole($request);
        if (!$role) {
            return redirect()->back()->with('error', __('dashboard.msg_error'));
        }
        return redirect()->back()->with('success', __('dashboard.msg_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = $this->rolesService->getRoleById(id: $id);
        if (!$role) {
            return redirect()->back()->with('error', __('dashboard.msg_error'));
        }
        return view('dashboard.Roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $role = $this->rolesService->updateRole($request, $id);
        if (!$role) {
            return redirect()->back()->with('error', __('dashboard.msg_error'));
        }
        return redirect()->back()->with('success', __('dashboard.msg_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = $this->rolesService->destroyRole($id);
        if (!$role) {
            return redirect()->back()->with('error', __('dashboard.msg_error'));
        }
        return redirect()->back()->with('success', __('dashboard.msg_success'));
    }
}
