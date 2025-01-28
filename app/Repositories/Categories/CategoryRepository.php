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

}
