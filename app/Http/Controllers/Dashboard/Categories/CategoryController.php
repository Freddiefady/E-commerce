<?php

namespace App\Http\Controllers\Dashboard\Categories;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryService;
use App\Http\Requests\Dashboard\CategoriesRequest;

class CategoryController extends Controller
{
    public function __construct(public CategoryService $categoryService)
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.categories.index');
    }
    public function getCategories()
    {
        return $this->categoryService->getCategoriesByDatatables();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryService->getParentCategories();
        return view('dashboard.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesRequest $request)
    {
        $data = $request->only(['name', 'parent', 'status', 'id']);
        if (!$this->categoryService->storeCategory($data)) {
            return redirect()->back()->with('error', __('dashboard.msg_error_category'));
        }
        return redirect()->back()->with('success', __('dashboard.msg_success_category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->categoryService->getById($id);
        $categories = $this->categoryService->getCategoriesExceptChildern($id);
        return view('dashboard.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriesRequest $request, string $id)
    {
        $data = $request->only(['name', 'parent', 'status', 'id']);
        if (!$this->categoryService->updateCategory($data, $id)) {
            return redirect()->back()->with('error', __('dashboard.msg_error_category'));
        }
        return redirect()->back()->with('success', __('dashboard.msg_success_update_category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->categoryService->destroyCategory($id)) {
            return redirect()->back()->with('error', __('dashboard.msg_error'));
        }
        return redirect()->back()->with('success', __('dashboard.msg_success_delete_category'));
    }
    public function changeStatus($id)
    {
        $category = $this->categoryService->changeStatus($id);
        if (!$category) {
            redirect()->back()->with('error', __('dashboard.msg_error_category'));
        }
        $category = $this->categoryService->getById($id);
        return redirect()->back()->with('success', __('dashboard.msg_success_change_status_category'));
    }
}
