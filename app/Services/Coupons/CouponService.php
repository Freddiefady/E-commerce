<?php

namespace App\Services\Coupons;

use Yajra\DataTables\DataTables;
use App\Repositories\Coupons\CouponRepository;

class CouponService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected CouponRepository $couponRepository)
    {
        //
    }
    public function getById($id)
    {
        $counon = $this->couponRepository->getById($id);
        return $counon?? abort(404);
    }
    public function getCouponsForDatatables()
    {
        $coupon = $this->couponRepository->getCoupons();

        return DataTables::of($coupon)
            ->addIndexColumn()
            ->addColumn('action', function ($coupon) {
                return view('dashboard.coupons.datatables.yajra-action', compact('coupon'));
            })
            ->addColumn('discount_percentage', function ($coupon) {
                return $coupon->discount_percentage . '%';
            })
            ->addColumn('is_active', function ($coupon) {
                return $coupon->getStatus();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function createCoupon($data)
    {
        return $this->couponRepository->createCoupon($data);
    }
    public function updateCoupon($id, $data)
    {
        $coupon = self::getById($id);
        if (! $coupon) {
            return false;
        }
        return $this->couponRepository->updateCoupon($coupon, $data);
    }
    public function deleteCoupon($id)
    {
        $coupon = self::getById($id);
        if (! $coupon) {
            abort(404);
        }
        return $this->couponRepository->deleteCoupon($coupon);
    }
    public function changeStatus($id, $status)
    {
        $coupon = self::getById($id);
        if (! $coupon) {
            return false;
        }
        $coupon->is_active == 'Active' ? $status = 0 : $status = 1;
        $status = $this->couponRepository->changeStatus($coupon);
        return $status;
    }
}
