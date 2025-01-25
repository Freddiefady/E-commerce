<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Governorate extends Model
{
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = ['name', 'is_active', 'country_id'];
    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function cities() {
        return $this->hasMany(City::class);
    }
    public function shippingGoverno() {
        return $this->hasOne(Shipping_governorate::class);
    }
    public function users() {
        return $this->hasMany(User::class);
    }
    public function getIsActiveAttribute($value)
    {
        if (Config::get('app.locale') == 'ar') {
            return $value == 1 ? 'مفعل' : 'غير مفعل';
        }
        return $value == 1 ? 'Active' : 'Inactive';
    }
}
