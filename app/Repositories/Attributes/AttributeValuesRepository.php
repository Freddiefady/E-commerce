<?php

namespace App\Repositories\Attributes;

class AttributeValuesRepository
{
    public function getAttributeValues($attribute)
    {
        return $attribute->attributeValues;
    }
    public function createAttributeValues($attribute, $value)
    {
        return $attribute->attributeValues()->create([
            'value' => $value
        ]);
    }
    public function updateAttributeValues($attributeValue, $key, $value)
    {
        return $attributeValue->attributeValues()->updateOrCreate(['id' => $key], ['value' => $value]);
    }

    public function destroyAttributeValues($attributeValue)
    {
        return $attributeValue->attributeValues()->delete();
    }
}
