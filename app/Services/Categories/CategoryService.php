<?php

namespace App\Services\Categories;

use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Categories\CategoryRepository;

class CategoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public CategoryRepository $categoryRepository)
    {
        //
    }
    public function getCategoriesByDatatables()
    {
        $categories = $this->categoryRepository->getCategories();

        return DataTables::of($categories)
        ->addIndexColumn()
        ->addColumn('name', function($category){
            return $category->getTranslation('name', app()->getLocale());
        })
<<<<<<< HEAD
        ->addColumn('products_count', function($category){
            return $category->products->count() == 0 ? trans('dashboard.no_data') : $category->products->count();
        })
=======
>>>>>>> main
        ->addColumn('date', function ($category): mixed {
            return $category->created_at;
        })
        ->addColumn('action', function ($category) {
<<<<<<< HEAD
            return view('dashboard.categories.datatables.yajra-action', compact('category'));
=======
            return view('components.yajra-action', compact('category'));
>>>>>>> main
        })
        ->make(true);
    }
    public function getById($id)
    {
        return $this->categoryRepository->findById($id);
    }
    public function storeCategory($data)
    {
        return $this->categoryRepository->createCategory($data);
    }
    public function updateCategory($data, $id)
    {
        if (!$category = $this->categoryRepository->findById($id)) {
            return false;
        }
        return $this->categoryRepository->updateCategory($category, $data);
    }
    public function destroyCategory($id)
    {
        if (!$category = $this->categoryRepository->findById($id)) {
            abort(404);
        }
        return $this->categoryRepository->deleteCategory($category);
    }
    public function getParentCategories()
    {
        return $this->categoryRepository->getParentCategories();
    }
    public function getCategoriesExceptChildern($id)
    {
        return $this->categoryRepository->getCategoriesExceptChildern($id);
    }
    public function changeStatus($id)
    {
        $category = self::getById($id);
        $category = $this->categoryRepository->changeStatus($category);
        if (!$category) {
            return false;
        }
        return true;
    }
}
