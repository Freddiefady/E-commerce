<?php

namespace App\Repositories\Attributes;

use App\Models\Attribute;

class AttributesRepository
{
    public function getAttrById($id)
    {
        return Attribute::find($id);
    }

    public function getAttributes()
    {
        return Attribute::with('attributeValues')->get();
    }

    public function createAttribute(array $data)
    {
        return Attribute::create([
            'name' => $data['name']
        ]);
    }

    public function updateAttribute($attribute, array $data)
    {
        return $attribute->update($data);
    }

    public function destroyAttribute($attribute)
    {
        return $attribute->delete();
    }

}
