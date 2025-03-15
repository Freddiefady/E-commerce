<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPreview extends Model
{

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'comment',
            'product_id',
            'user_id'
        ];

    public function Products()
    {
        return $this->belongsTo(Product::class);
    }
}
