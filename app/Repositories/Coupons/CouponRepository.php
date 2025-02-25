<?php

namespace App\Repositories\Coupons;

use App\Models\Coupon;

class CouponRepository
{
    public function getById($id)
    {
        return Coupon::find($id);
    }
    public function getCoupons()
    {
        return Coupon::latest()->get();
    }
    public function createCoupon($data)
    {
        return Coupon::create($data);
    }
    public function updateCoupon($coupons, $data): mixed
    {
        return $coupons->update($data);
    }
    public function deleteCoupon($coupon): mixed
    {
        return $coupon->delete();
    }
    public function changeStatus($coupon): mixed
    {
        return $coupon = $coupon->update([
            'status' => $coupon->status == 'Active' || $coupon->status == 'فعال'? 0 : 1
        ]);
    }
}
