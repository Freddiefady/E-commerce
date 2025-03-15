<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

    public $translatable  = ['name', 'small_description', 'description'];
    protected $fillable = [
        'name',
        'small_description',
        'description',
        'status',
        'sku',
        'avaliable_for',
        'views',
        'has_variants',
        'price',
        'has_discount',
        'discount',
        'start_discount',
        'end_discount',
        'manage_stock',
        'quantity',
        'avaliable_in_stock',
        'category_id',
        'brand_id'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function Tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    public function Wishlists()
    {
        return $this->hasMany(wishlist::class);
    }

    public function Previews()
    {
        return $this->hasMany(ProductPreview::class);
    }

    public function Images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function isSimple()
    {
        return !$this->has_variants;
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y H:i a', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('d/m/Y H:i a', strtotime($value));
    }
}
