<?php

namespace App\Services\Brands;

use App\Repositories\Brands\BrandRepository;
use App\Utils\ImageManager;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\DataTables;

class BrandService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected BrandRepository $brandRepository,
        protected ImageManager $imageManager
    ) {
        //
    }
    public function getBrandById($id)
    {
        $brand = $this->brandRepository->getBrandById($id);
        if (!$brand) {
            abort(404);
        }
        return $brand;
    }
    public function getBrandsForDataTables()
    {
        $brands = $this->brandRepository->getBrands();

        return DataTables::of($brands)
            ->addIndexColumn()
            ->addColumn('name', function ($brand) {
                return $brand->getTranslation('name', app()->getLocale());
            })
            ->addColumn('status', function ($brand) {
                return $brand->getStatus();
            })
            ->addColumn('logo', function ($brand) {
                return view('dashboard.brands.datatables.logo', compact('brand'));
            })
            ->addColumn('products_count', function ($brand) {
                return $brand->products_count == 0 ? trans('dashboard.no_data') : $brand->products_count;
            })
            ->addColumn('action', function ($brand) {
                return view('dashboard.brands.datatables.yajra-action', compact('brand'));
            })
            ->rawColumns(['action', 'logo'])
            ->make(true);
    }
    public function createBrand($data)
    {
        if ($data['logo'] != null) {
            $fileName = $this->imageManager->uploadSingleImage($data['logo'], '/', 'brands');
            $data['logo'] = $fileName;
        }
        self::BrandCache();
        return $this->brandRepository->create($data);
    }
    public function updateBrand($id, $data)
    {
        $brand = self::getBrandById($id);

        if ($data['logo'] != null) {
            $this->imageManager->deleteImageFromLocal($brand->logo);
            $fileName = $this->imageManager->uploadSingleImage($data['logo'], '/', 'brands');
            $data['logo'] = $fileName;
        }
        return $this->brandRepository->update($brand, $data);
    }
    public function destroyBrand($id)
    {
        $brand = self::getBrandById($id);
        if ($brand['logo'] != null) {
            $this->imageManager->deleteImageFromLocal($brand->logo);
        }
        $brands = $this->brandRepository->destroy($brand);
        self::BrandCache();
        return $brands;
    }
    public function changeStatus($id)
    {
        $brand = self::getBrandById($id);
        if (!$this->brandRepository->changeStatus($brand)) {
            return false;
        }
        return true;
    }

    private function BrandCache()
    {
        Cache::forget('categories_count');
        Cache::forget('brands_count');
    }
}
