<?php

namespace App\Http\Controllers\Dashboard\brands;

use App\Http\Controllers\Controller;
use App\Services\Brands\BrandService;
use App\Http\Requests\Dashboard\BrandRequest;

class BrandController extends Controller
{
    public function __construct(public BrandService $brandService){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.brands.index');
    }

    public function getBrands()
    {
        return $this->brandService->getBrandsForDataTables();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $data = $request->only(['name', 'logo', 'status']);
        if (! $this->brandService->createBrand($data)) {
            return redirect()->back()->with('error', __("dashboard.msg_error_brand"));
        }
        return redirect()->back()->with('success', __("dashboard.msg_success_brand"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = $this->brandService->getBrandById($id);
        return view('dashboard.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        $data = $request->only(['name', 'logo', 'status']);
        if (! $this->brandService->updateBrand($id, $data)) {
            return redirect()->back()->with('error', __('dashboard.msg_error_brand'));
        }
        return redirect()->back()->with('success', value: __('dashboard.msg_success_update_brand'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! $this->brandService->destroyBrand($id)) {
            return redirect()->back()->with('error', __('dashboard.msg_error'));
        }
        return redirect()->back()->with('success', __('dashboard.msg_success_delete_brand'));
    }

    public function changeStatus($id)
    {
        if (! $this->brandService->changeStatus($id)) {
            return redirect()->back()->with('error', __('dashboard.msg_error'));
        }
        $this->brandService->getBrandById($id);
        return redirect()->back()->with('success', __('dashboard.msg_success_change_status_brand'));
    }
}
