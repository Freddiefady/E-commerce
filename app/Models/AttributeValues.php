<?php

namespace App\Models;

use App\Models\Variant;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AttributeValues extends Model
{
    use HasTranslations;

    protected $table = 'attribute_values';
    public $timestamps = false;
    protected $translatable = ['value'];

    protected $fillable = ['attribute_id', 'value'];

    public function attribute()  {
        return $this->belongsTo(Attribute::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
