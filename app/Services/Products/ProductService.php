<?php

namespace App\Services\Products;

use App\Repositories\Products\ProductRepository;
use App\Utils\ImageManager;

class ProductService
{
    public function __construct(
        protected ProductRepository $productRepository,
        protected ImageManager $imageManager
    ) {
        //
    }

    public function getProducts()
    {
        return $this->productRepository->getProducts();
    }

    public function getProduct(string $id)
    {
        $product = $this->productRepository->getProduct($id);
        return $product ?? abort(404);
    }

    public function ProductWithEagerLoading(string $id)
    {
        $product = $this->productRepository->ProductWithEagerLoading($id);
        return $product ?? abort(404);
    }

    public function createProductWithValues(array $productData, array $productVariants, $images)
    {
        $product = $this->productRepository->createProduct($productData);

        foreach ($productVariants as $variant) {
            $variant['product_id'] = $product->id;
            $productVariant = $this->productRepository->createProductVariants($variant);

            foreach ($variant['attriubte_value_ids'] as $attribute_value_id) {
                $this->productRepository->createVariantAttributeValues([
                    'product_variant_id' => $productVariant->id,
                    'attribute_value_id' => $attribute_value_id,
                ]);
            }
        }

        $this->imageManager->uploadMultipleImages($images, $product, 'products');
    }
}
