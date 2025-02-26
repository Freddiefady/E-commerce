<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'discount_percentage',
        'start_date',
        'end_date',
        'limit',
        'time_used',
        'is_active'
    ];

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y H:i a', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('d/m/Y H:i a', strtotime($value));
    }

    public function scopeIsValid($query)
    {
        return $query->where('is_active', 1)
        ->where('time_used', '<', 'limit')
        ->where('end_date', '>', now());
    }

    public function scopeInValid($query)
    {
        return $query->where('is_active', 0)
        ->orWhere('time_used', '>=', 'limit')
        ->orWhere('end_date', '<', now());
    }

    public function couponIsValid()
    {
        return $this->is_active == 1 && $this->time_used < $this->limit && $this->end_date > $this->now();
    }

    public function getStatus()
    {
        if (config('app.locale') == 'ar') {
            return $this->is_active == 1 ? 'مفعل' : 'غير مفعل';
        }
        return $this->is_active == 1 ? 'Active' : 'Inactive';
    }
}
