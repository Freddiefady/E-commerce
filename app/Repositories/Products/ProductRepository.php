<?php

namespace App\Repositories\Products;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Variant;

class ProductRepository
{
    public function getProducts()
    {
        return Product::latest()->get();
    }

    public function getProduct(string $id)
    {
        return Product::find($id);
    }

    public function ProductWithEagerLoading($id)
    {
        return Product::with('productVariants.attributeVariants')->find($id);
    }

    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function createProductVariants(array $data)
    {
        return ProductVariant::create($data);
    }

    public function createVariantAttributeValues(array $data)
    {
        return Variant::create($data);
    }
}
