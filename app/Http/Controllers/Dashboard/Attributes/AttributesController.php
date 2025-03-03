<?php

namespace App\Http\Controllers\Dashboard\Attributes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AttributesRequest;
use App\Services\Attributes\AttributesService;


class AttributesController extends Controller
{
    public function __construct(protected AttributesService $attributesService)
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.attributes.index');
    }

    public function getAttributes()
    {
        return $this->attributesService->getBrandsForDataTables();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributesRequest $request)
    {
        if (! $attribute = $this->attributesService->createAttr($request->except('_token'))) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.msg_error')
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.msg_success_create_attribute'),
            'data' => $attribute
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (! $attribute = $this->attributesService->updateAttr($request->except(['_token', '_method']), $id)) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.msg_error')
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.msg_success_edit_attribute'),
            'data' => $attribute
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! $this->attributesService->deleteAttr($id)) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.msg_error')
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.msg_success_delete_attribute')
        ], 200);
    }
}
