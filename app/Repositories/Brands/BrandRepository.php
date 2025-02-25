<?php

namespace App\Repositories\Brands;

use App\Models\Brand;

class BrandRepository
{
    public function getBrandById($id)
    {
        return Brand::find($id);
    }
    public function getBrands()
    {
        return Brand::withCount('products')->latest()->get();
    }
    public function create($data)
    {
        return Brand::create($data);
    }
    public function update($brand, $data)
    {
        return $brand->update($data);
    }
    public function destroy($brand)
    {
        return $brand->delete();
    }
    public function changeStatus($brand)
    {
        return $brand = $brand->update([
            'status' => $brand->status == 'Active' || $brand->status == 'مفعل' ? 0 : 1
        ]);
    }
}
