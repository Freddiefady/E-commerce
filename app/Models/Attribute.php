<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Attribute extends Model
{
    use HasTranslations;
    protected $table = 'attributes';
    protected $translatable = ['name'];
    protected $fillable = ['name'];

    public function attributeValues()  {
        return $this->hasMany(AttributeValues::class);
    }

    public function getAttributeValues() {
        return $this->attributeValues()->get();
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y h:i a', strtotime($value));
    }

}
