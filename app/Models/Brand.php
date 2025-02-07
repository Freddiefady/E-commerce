<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Brand extends Model
{
    use Sluggable, HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ['name', 'slug', 'logo', 'status'];
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
    public function getStatus()
    {
        if (config('app.locale') == 'ar') {
            return $this->status == 1 ? 'مفعل' : 'غير مفعل';
        }
        return $this->status == 1 ? 'Active' : 'Inactive';
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }
    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y h:i a', strtotime($value));
    }
    public function getLogoAttribute($logo)
    {
        return 'uploads/brands/'. $logo;
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }
}
