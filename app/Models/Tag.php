<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'slug'
    ];

    public function Products()
    {
        return $this->belongsToMany(Product::class);
    }
}
