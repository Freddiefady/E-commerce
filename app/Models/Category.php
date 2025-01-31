<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use Sluggable, HasTranslations;
    protected $table = 'categories';
    protected $translatable = ['name'];
    protected $fillable = ['name', 'slug', 'status', 'parent'];
    protected $hidden = ['created_at', 'updated_at'];

    public function products() {
        return $this->hasMany(Product::class);
    }
    public function children() {
        return $this->hasMany(Category::class, 'parent');
    }
    public function parent(){
        return $this->belongsTo(Category::class, 'parent');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }
    public function getStatusAttribute($value)
    {
        if (config('app.locale') == 'ar') {
            return $value == 1 ? 'مفعل' : 'غير مفعل';
        }
        return $value == 1 ? 'Active' : 'Inactive';
    }
    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y H:i a', strtotime($value));
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
