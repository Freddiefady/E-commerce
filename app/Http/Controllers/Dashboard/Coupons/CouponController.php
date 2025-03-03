<?php

namespace App\Http\Controllers\Dashboard\Coupons;

use App\Http\Controllers\Controller;
use App\Services\Coupons\CouponService;
use App\Http\Requests\Dashboard\CouponRequest;

class CouponController extends Controller
{
    public function __construct(protected CouponService $couponService)
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.coupons.index');
    }

    public function getCoupons()
    {
        return $this->couponService->getCouponsForDatatables();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        $data = $request->only(['code', 'discount_percentage', 'start_date', 'end_date', 'limit', 'is_active']);
        if (! $this->couponService->createCoupon($data)) {
            return response()->json([
                'status'=> 'error',
                'message'=> __('dashboard.msg_error_coupon'),
            ], 400);
        }
        return response()->json([
            'status'=> 'success',
            'message'=> __('dashboard.msg_success_coupon'),
            'data'=> $data
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, string $id)
    {
        $data = $request->except(['_token']);
        if (! $this->couponService->updateCoupon($id, $data)) {
            return response()->json([
                'status'=> 'error',
                'message'=> __('dashboard.msg_error_coupon'),
            ], 400);
        }
        return response()->json([
            'status'=> 'success',
            'message'=> __("dashboard.msg_success_update_coupon"),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! $this->couponService->deleteCoupon($id)) {
            return response()->json([
                'status'=> 'error',
                'message'=> __('dashboard.msg_error_coupon'),
            ], 400);
        }
        return response()->json([
            'status'=> 'success',
            'message'=> __('dashboard.msg_success_delete_coupon'),
        ], 200);
    }

}
