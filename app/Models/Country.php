<?php

namespace App\Models;

use App\Models\User;
use App\Models\Governorate;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = ['name', 'phone_code', 'flag_icon', 'is_active'];
    public $timestamps = false;

    public function governorates()
    {
        return $this->hasMany(Governorate::class, 'country_id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function getIsActiveAttribute($value)
    {
        if (Config::get('app.locale') == 'ar') {
            return $value == 1 ? 'مفعل' : 'غير مفعل';
        }
        return $value == 1 ? 'Active' : 'Inactive';
    }

}
