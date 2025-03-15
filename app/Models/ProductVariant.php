<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'price',
        'stock'
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
    public  function attributeVariants()
    {
        return $this->hasMany(Variant::class);
    }
}
