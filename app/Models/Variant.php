<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = [
        'product_variant_id',
        'attribute_value_id'
    ];
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function AttributeValues()
    {
        return $this->belongsTo(AttributeValues::class);
    }
}
