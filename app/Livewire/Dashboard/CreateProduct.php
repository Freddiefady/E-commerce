<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Attribute;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use App\Services\Products\ProductService;

class CreateProduct extends Component
{
    use WithFileUploads;
    public $currentStep = 1;
    // Form data
    public $category_id, $brand_id;
    public $images = [], $fullscreenImage = "";
    public $name_ar, $name_en, $description_ar, $description_en, $small_description_ar, $small_description_en, $sku, $categories,
    $brands, $avaliable_for, $tags, $quantity, $price;
    public $quantities = [], $prices = [], $attributeValues = [], $discount, $discount_start_date, $discount_end_date;
    public $has_variants = 0, $manage_stock = 0, $has_discount = 0, $valueRowCount = 1;

    protected $productService;
    public function boot(ProductService $productService)
    {
        $this->productService = $productService;
    }

    // Validation rules
    // protected function rules()
    // {
    //     $attributeValues = Arr::flatten($this->attributeValues);
    //     return [
    //         'name_en' => 'required|min:2',
    //         'name_ar' => 'required|min:2',
    //         'small_description_en' => 'required|string',
    //         'small_description_ar' => 'required|string',
    //         'description_ar' => 'required|string',
    //         'description_en' => 'required|string',
    //         'category_id' => ['required','exists:categories,id'],
    //         'brand_id' => ['required','exists:brands,id'],
    //         'sku' => 'required',
    //         'avaliable_for' => 'required|date',
    //         'tags' => 'required',
    //         'price' => 'required|numeric',
    //         'quantity' => 'required|numeric',
    //         'has_variants' => 'required|in:0,1',
    //         'manage_stock' => 'required|in:0,1',
    //         'has_discount' => 'required|in:0,1',
    //         'discount' => 'required|numeric',
    //         'discount_start_date' => 'required|date',
    //         'discount_end_date' => 'required|date',
    //         'images' => 'required|array',
    //         'attributeValues' => [
    //             'required',
    //             'array',
    //             function ($attribute, $value, $fail) use ($attributeValues) {
    //                 if (!Attribute::whereIn('id', $attributeValues)->exists()) {
    //                     $fail('Invalid attribute values');
    //                 }
    //             },
    //         ],
    //     ];
    // }

    public function mount($categories, $brands)
    {
        $this->categories = $categories;
        $this->brands = $brands;
    }

    public function addVariant()
    {
        $this->price[] = null;
        $this->quantities[] = null;
        $this->attributeValues[] = null;
        $this->valueRowCount++;
    }

    public function removeVariant()
    {
        if ($this->valueRowCount > 1) {
            $this->valueRowCount--;
            array_pop($this->price);
            array_pop($this->quantities);
            array_pop($this->attributeValues);
        }
    }

    public function deleteImages($key)
    {
        unset($this->images[$key]);
        $this->images = array_values($this->images); // Re-index array after deletion
    }

    public function openFullscreen($key)
    {
        $this->fullscreenImage = $this->images[$key]->temporaryUrl();
        $this->dispatch('showFullscreenModal');
    }

    // Only validate the field that was updated
    // public function updated()
    // {
    //     $this->validate();
    // }

    public function render()
    {
        $attributes = Attribute::with('attributeValues')->get();
        return view('livewire.dashboard.create-product', compact('attributes'));
    }

    // Custom error messages
    protected $messages = [
        'name_ar.required' => 'Product name in Arabic is required',
        'name_en.required' => 'Product name is required',
        'small_description_ar.required' => 'Small description in Arabic is required',
        'small_description_en.required' => 'Small description in English is required',
        'description_ar.required' => 'Description in Arabic is required',
        'description_en.required' => 'Description in English is required',
        'category_id.required' => 'Please select a category',
        'brand_id.required' => 'Please select a brand',
        'sku.required' => 'SKU is required',
        'avaliable_for.required' => 'Date is required',
        'images.required' => 'Please upload at least one product image',
        'attributeValues.required' => 'Invalid attribute values',
    ];

    // Go to next step
    public function nextStep()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'name_en' => 'required|min:2',
                'name_ar' => 'required|min:2',
                'small_description_en' => 'required|string',
                'small_description_ar' => 'required|string',
                'description_ar' => 'required|string',
                'description_en' => 'required|string',
                'category_id' => ['required','exists:categories,id'],
                'brand_id' => ['required','exists:brands,id'],
                'sku' => 'required',
                'avaliable_for' => 'required|date',
                'tags' => 'required',
            ]);
        } else if ($this->currentStep == 2) {
            // Only validate fields that are relevant based on conditions
            $rules = [
                'has_variants' => 'required|in:0,1',
                'has_discount' => 'required|in:0,1',
            ];

            if ($this->has_variants == 0) {
                $rules['price'] = 'required|numeric|min:0.01';
                $rules['manage_stock'] = 'required|in:0,1';

                if ($this->manage_stock == 1) {
                    $rules['quantity'] = 'required|numeric|min:0';
                }
            } else {
                    //    If product has variants, validate variant data
                for ($i = 0; $i < $this->valueRowCount; $i++) {
                    $rules["prices.$i"] = 'required|numeric|min:0.01';
                    $rules["quantities.$i"] = 'required|integer|min:0';

                    // Get attributes from the render method
                    $attributes = Attribute::with('attributeValues')->get();

                    // Validate attribute values for each variant
                    foreach ($attributes as $attribute) {
                        $rules["attributeValues.$i.$attribute->id"] = 'required';
                    }
                }

            }

            // If product has discount
            if ($this->has_discount == 1) {
                $rules['discount'] = 'required|numeric|min:1|max:100';
                $rules['discount_start_date'] = 'required|date|after_or_equal:today';
                $rules['discount_end_date'] = 'required|date|after:discount_start_date';
            }

            $this->validate($rules);
        } else if ($this->currentStep == 3) {
            $this->validate([
                'images' => 'required|array|max:5120|min:1', // 5MB max per image
            ]);
        }

        $this->currentStep++;
    }

    // Go to previous step
    public function previousStep()
    {
        $this->currentStep--;
    }

    // Submit the form
    public function submit()
    {
        // Process tags - convert from string to array if needed
        // $tagsArray = is_string($this->tags) ? explode(',', $this->tags) : $this->tags;

        // // Make sure tags is an array before saving
        // if (!is_array($tagsArray)) {
        //     $tagsArray = [$tagsArray];
        // }
        try {
            $product = [
                'name' => ['en' => $this->name_en, 'ar' => $this->name_ar],
                'small_description' => ['en' => $this->small_description_en, 'ar' => $this->small_description_ar],
                'description' => ['en' => $this->description_en, 'ar' => $this->description_ar],
                'sku' => $this->sku,
                'avaliable_for' => $this->avaliable_for,
                'has_variants' => $this->has_variants,
                'price' => $this->has_variants == 0 ? $this->price : null,
                'manage_stock' => $this->has_variants == 0 ? $this->manage_stock : 1,
                'quantity' => $this->manage_stock == 1 ? $this->quantity : null,
                'has_discount' => $this->has_discount,
                'discount' => $this->has_discount == 1 ? $this->discount : null,
                'start_discount' => $this->has_discount == 1 ? $this->discount_start_date : null,
                'end_discount' => $this->has_discount == 1 ? $this->discount_end_date : null,
                'category_id' => (int) $this->category_id,
                'brand_id' => (int) $this->brand_id,
                // 'tags' => $tagsArray, // Save as array
            ];

            $productVariants = [];
            if ($this->has_variants) {
            foreach ($this->prices as $index => $price) {
                    $productVariants[] = [
                    'product_id' => null,
                    'price' => $price,
                    'stock' => $this->quantities[$index] ?? 0,
                    'attriubte_value_ids' => $this->attributes[$index],
                    ];
                }
            }

                $this->productService->createProductWithValues($product, $productVariants, $this->images);
            // Reset form and show success message
            $this->resetExcept(['categories', 'brands']);
            $this->currentStep = 1;

            session()->flash('message', __('dashboard.msg_success_create_product'));
        } catch (\Exception $e) {
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }
}
