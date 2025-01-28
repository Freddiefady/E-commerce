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
        ->addColumn('date', function ($category) {
            return $category->created_at;
        })
        ->addColumn('action', function ($category) {
            return view('components.yajra-action', compact('category'));
        })
        ->make(true);
    }
}
