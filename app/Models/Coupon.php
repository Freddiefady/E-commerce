<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'code',
            'discount',
            'discount_percentage',
            'expire_date',
            'limit',
            'time_used',
            'is_active'
        ];


}
