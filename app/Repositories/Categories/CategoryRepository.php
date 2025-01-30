<?php

namespace App\Repositories\Categories;

use App\Models\Category;

class CategoryRepository
{
    public function getCategories()
    {
        return Category::all();
    }
    public function findById($id)
    {
        return Category::find($id);
    }
    public function createCategory($data)
    {
        return Category::create($data);
    }
    public function updateCategory($category, $data)
    {
        $category = $category->update($data);
        return $category;
    }
    public function deleteCategory($category)
    {
        return $category->delete();
    }
    public function getParentCategories()
    {
        return Category::whereNull('parent')->get();
    }
    public function getCategoriesExceptChildern($id)
    {
        return Category::where('id', '!=', $id)
            ->whereNull('parent')->get();
    }
    public function changeStatus($category)
    {
        $category = $category->update([
            'status' => $category->status == 'Active' || $category->status == 'مفعل' ? 0 : 1,
        ]);
        return $category;
    }
}
