<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <!-- Progress Indicator -->
            <div class="step-indicator">
                <div class="progress-line">
                    <div class="progress-line-inner" style="width: {{ (($currentStep - 1) / 3) * 100 }}%">
                    </div>
                </div>

                <div class="step {{ $currentStep == 1 ? 'active' : ($currentStep > 1 ? 'completed' : '') }}">
                    <div class="step-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="step-name">{{ __('dashboard.step') }} 1</div>
                </div>

                <div class="step {{ $currentStep == 2 ? 'active' : ($currentStep > 2 ? 'completed' : '') }}">
                    <div class="step-icon">
                        <i class="fas fa-pen"></i>
                    </div>
                    <div class="step-name">{{ __('dashboard.step') }} 2</div>
                </div>

                <div class="step {{ $currentStep == 3 ? 'active' : ($currentStep > 3 ? 'completed' : '') }}">
                    <div class="step-icon">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="step-name">{{ __('dashboard.step') }} 3</div>
                </div>

                <div class="step {{ $currentStep == 4 ? 'active' : '' }}">
                    <div class="step-icon">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <div class="step-name">{{ __('dashboard.step') }} 4</div>
                </div>
            </div>

            <form action="" class="row-separator" method="post">
                <!-- Step 1 -->
                <div class="form-step {{ $currentStep == 1 ? 'active' : '' }}">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="NameEn" class="label-control">{{ __('dashboard.product_name_en') }}
                                    :</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control @error('name_en') is-invalid @enderror"
                                        wire:model.lazy="name_en" id="NameEn">
                                    @error('name_en')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="NameAr" class="label-control">{{ __('dashboard.product_name_ar') }}
                                    :</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control @error('name_ar') is-invalid @enderror"
                                        wire:model.lazy="name_ar" id="NameAr">
                                    @error('name_ar')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="small_description_en"
                                    class="label-control">{{ __('dashboard.product_small_description_en') }} :</label>
                                <div class="input-group has-validation">
                                    <textarea class="form-control @error('small_description_en') is-invalid @enderror"
                                        wire:model.lazy="small_description_en" id="small_description_en"></textarea>
                                    @error('small_description_en')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="small_description_ar"
                                    class="label-control">{{ __('dashboard.product_small_description_ar') }} :</label>
                                <div class="input-group has-validation">
                                    <textarea class="form-control @error('small_description_ar') is-invalid @enderror"
                                        wire:model.lazy="small_description_ar" id="small_description_ar"></textarea>
                                    @error('small_description_ar')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="description_en"
                                    class="label-control">{{ __('dashboard.product_description_en') }} :</label>
                                <div class="input-group has-validation">
                                    <textarea class="form-control @error('description_en') is-invalid @enderror" wire:model.lazy="description_en"
                                        id="description_en"></textarea>
                                    @error('description_en')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="description_ar"
                                    class="label-control">{{ __('dashboard.product_description_ar') }} :</label>
                                <div class="input-group has-validation">
                                    <textarea class="form-control @error('description_ar') is-invalid @enderror" wire:model.lazy="description_ar"
                                        id="description_ar"></textarea>
                                    @error('description_ar')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="categories_id" class="label-control">{{ __('dashboard.categories') }}
                                    :</label>
                                <div class="input-group has-validation">
                                    <select class="form-control @error('category_id') is-invalid @enderror"
                                        wire:model.lazy="category_id" id="categories_id">
                                        <option value="">{{ __('dashboard.select_category') }}</option>
                                        @foreach ($categories ?? [] as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="brand_id" class="label-control">{{ __('dashboard.brands') }} :</label>
                                <div class="input-group has-validation">
                                    <select class="form-control @error('brand_id') is-invalid @enderror"
                                        wire:model.lazy="brand_id" id="brand_id">
                                        <option value="">{{ __('dashboard.select_brand') }}</option>
                                        @foreach ($brands ?? [] as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="product_sku" class="label-control">{{ __('dashboard.product_sku') }}
                                    :</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control @error('sku') is-invalid @enderror"
                                        wire:model.lazy="sku" id="product_sku">
                                    @error('sku')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="avaliable_for"
                                    class="label-control">{{ __('dashboard.product_avilable_for') }} :</label>
                                <div class="input-group has-validation">
                                    <input type="date" class="form-control @error('avaliable_for') is-invalid @enderror"
                                        wire:model.lazy="avaliable_for" id="avaliable_for">
                                    @error('avaliable_for')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="tags" class="label-control">{{ __('dashboard.tags') }} :</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control @error('tags') is-invalid @enderror"
                                        wire:model.lazy="tags" id="tagInput"
                                        placeholder="Enter tags separated by commas">
                                    @error('tags')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">Enter tags separated by commas (e.g.,
                                    tag1,tag2,tag3)</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-primary"
                            wire:click="nextStep">{{ __('dashboard.next') }}</button>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="form-step {{ $currentStep == 2 ? 'active' : '' }}">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="hasVariants" class="label-control">{{ __('dashboard.has_variant') }}
                                    :</label>
                                <div class="input-group has-validation">
                                    <select class="form-control @error('has_variants') is-invalid @enderror"
                                        wire:model.live="has_variants" id="hasVariants">
                                        <option value="1">{{ __('dashboard.yes') }}</option>
                                        <option value="0">{{ __('dashboard.no') }}</option>
                                    </select>
                                    @error('has_variants')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @if ($has_variants == 0)
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="product_price"
                                        class="label-control">{{ __('dashboard.product_price') }}
                                        :</label>
                                    <div class="input-group has-validation">
                                        <input type="number"
                                            class="form-control @error('price') is-invalid @enderror"
                                            wire:model.lazy="price" id="product_price">
                                        @error('price')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($has_variants == 0)
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="manageStock" class="label-control">{{ __('dashboard.manage_stock') }}
                                        :</label>
                                    <div class="input-group has-validation">
                                        <select class="form-control @error('manage_stock') is-invalid @enderror"
                                            wire:model.live="manage_stock" id="manageStock">
                                            <option value="1">{{ __('dashboard.yes') }}</option>
                                            <option value="0">{{ __('dashboard.no') }}</option>
                                        </select>
                                        @error('manage_stock')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($manage_stock == 1 && $has_variants == 0)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_quantity"
                                        class="label-control">{{ __('dashboard.product_quantity') }} :</label>
                                    <div class="input-group has-validation">
                                        <input type="number"
                                            class="form-control @error('quantity') is-invalid @enderror"
                                            wire:model.lazy="quantity" id="product_quantity">
                                        @error('quantity')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="hasDiscount" class="label-control">{{ __('dashboard.has_discount') }}
                                    :</label>
                                <div class="input-group has-validation">
                                    <select class="form-control @error('has_discount') is-invalid @enderror"
                                        wire:model.live="has_discount" id="hasDiscount">
                                        <option value="1">{{ __('dashboard.yes') }}</option>
                                        <option value="0">{{ __('dashboard.no') }}</option>
                                    </select>
                                    @error('has_discount')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @if ($has_discount == 1)
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="product_discount"
                                        class="label-control">{{ __('dashboard.discount') }}
                                        :</label>
                                    <div class="input-group has-validation">
                                        <input type="number"
                                            class="form-control @error('discount') is-invalid @enderror"
                                            wire:model.lazy="discount" id="product_discount">
                                        @error('discount')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="start_date"
                                        class="label-control">{{ __('dashboard.discount_start_date') }}
                                        :</label>
                                    <div class="input-group has-validation">
                                        <input type="date"
                                            class="form-control @error('discount_start_date') is-invalid @enderror"
                                            wire:model.lazy="discount_start_date" id="start_date">
                                        @error('discount_start_date')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="end_date"
                                        class="label-control">{{ __('dashboard.discount_end_date') }}
                                        :</label>
                                    <div class="input-group has-validation">
                                        <input type="date"
                                            class="form-control @error('discount_end_date') is-invalid @enderror"
                                            wire:model.lazy="discount_end_date" id="end_date">
                                        @error('discount_end_date')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if ($has_variants == 1)
                        @for ($i = 0; $i < $valueRowCount; $i++)
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label for="Price.{{ $i }}"
                                            class="label-control">{{ __('dashboard.product_price') }}
                                            :</label>
                                        <div class="input-group has-validation">
                                            <input type="number"
                                                class="form-control @error('prices.' . $i) is-invalid @enderror"
                                                wire:model.lazy="prices.{{ $i }}"
                                                id="Price.{{ $i }}">
                                            @error('prices.' . $i)
                                                <div class="invalid-feedback d-block">
                                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label for="Qty.{{ $i }}"
                                            class="label-control">{{ __('dashboard.product_quantity') }}
                                            :</label>
                                        <div class="input-group has-validation">
                                            <input type="number"
                                                class="form-control @error('quantities.' . $i) is-invalid @enderror"
                                                wire:model.lazy="quantities.{{ $i }}"
                                                id="Qty.{{ $i }}">
                                            @error('quantities.' . $i)
                                                <div class="invalid-feedback d-block">
                                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                @foreach ($attributes as $attribute)
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="attrValue"
                                                class="label-control">{{ __('dashboard.product') }}
                                                {{ $attribute->name }} :</label>
                                            <div class="input-group has-validation">
                                                <select
                                                    class="form-control @error('attributeValues.' . $i . '.' . $attribute->id) is-invalid @enderror"
                                                    wire:model.lazy="attributeValues.{{ $i }}.{{ $attribute->id }}"
                                                    id="attrValue">
                                                    <option selected>{{ __('dashboard.select_value') }}</option>
                                                    @foreach ($attribute->attributeValues as $item)
                                                        <option value="{{ $item->id }}">{{ $item->value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('attributeValues.' . $i . '.' . $attribute->id)
                                                    <div class="invalid-feedback d-block">
                                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endfor
                        <div class="form-actions">
                            <button type="button" class="btn btn-outline-success" wire:click="addVariant"><i
                                    class="fa fa-plus"></i>
                                {{ __('dashboard.add_variant') }}</button>
                            <button type="button" class="btn btn-danger" wire:click="removeVariant"><i
                                    class="fa fa-minus"></i>
                                {{ __('dashboard.remove_variant') }}</button>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary" wire:click="previousStep">
                            {{ __('dashboard.previous') }}</button>
                        <button type="button" class="btn btn-primary" wire:click="nextStep">
                            {{ __('dashboard.next') }}</button>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="form-step {{ $currentStep == 3 ? 'active' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product_images"
                                    class="label-control">{{ __('dashboard.product_images') }}</label>
                                <div class="input-group has-validation">
                                    <input type="file" wire:model.live="images"
                                        class="form-control @error('images') is-invalid @enderror"
                                        id="product_images" multiple>
                                    @error('images')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @if ($images)
                            <div class="col-md-12 mt-3">
                                <div class="row">
                                    @foreach ($images as $key => $image)
                                        <div class="col-md-4 mb-3">
                                            <div class="position-relative">
                                                <img src="{{ $image->temporaryUrl() }}"
                                                    class="img-thumbnail rounded-md" width="100%" height="200px"
                                                    alt="{{ $name_en }}">

                                                <!-- Delete Button -->
                                                <button type="button" wire:click='deleteImages({{ $key }})'
                                                    class="btn btn-danger btn-sm position-absolute"
                                                    style="top: 5px; right: 5px;">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <!-- fullscreen Images -->
                                                <button type="button"
                                                    wire:click='openFullscreen({{ $key }})'
                                                    class="btn btn-primary btn-sm position-absolute"
                                                    style="bottom: 5px; right: 5px;">
                                                    <i class="fas fa-expand"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Modal -->
                    <div wire:ignore.self class="modal fade" id="fullscreenModal" tabindex="-1"
                        aria-labelledby="fullscreenModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ $fullscreenImage }}" class="img-fluid" id="fullscreenImage"
                                        alt="Full Screen Image">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary"
                            wire:click="previousStep">{{ __('dashboard.previous') }}</button>
                        <button type="button" class="btn btn-primary"
                            wire:click="nextStep">{{ __('dashboard.next') }}
                        </button>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="form-step {{ $currentStep == 4 ? 'active' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-4">{{ __('dashboard.product_summary') }}</h4>

                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">{{ __('dashboard.basic_infor') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>{{ __('dashboard.product_name_en') }}:</strong>
                                                {{ $name_en }}</p>
                                            <p><strong>{{ __('dashboard.product_name_ar') }}:</strong>
                                                {{ $name_ar }}</p>
                                            <p><strong>{{ __('dashboard.product_sku') }}:</strong>
                                                {{ $sku }}</p>
                                            <p><strong>{{ __('dashboard.product_avilable_for') }}:</strong>
                                                {{ $avaliable_for }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('dashboard.categories') }}:</strong>
                                                @if ($category_id && isset($categories))
                                                    @foreach ($categories as $category)
                                                        @if ($category->id == $category_id)
                                                            {{ $category->name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </p>
                                            <p><strong>{{ __('dashboard.brands') }}:</strong>
                                                @if ($brand_id && isset($brands))
                                                    @foreach ($brands as $brand)
                                                        @if ($brand->id == $brand_id)
                                                            {{ $brand->name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </p>
                                            <p><strong>{{ __('dashboard.tags') }}:</strong> {{ $tags }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">{{ __('dashboard.pricing_inventory') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>{{ __('dashboard.has_variant') }}:</strong>
                                                {{ $has_variants == 1 ? __('dashboard.yes') : __('dashboard.no') }}
                                            </p>
                                            @if ($has_variants == 0)
                                                <p><strong>{{ __('dashboard.product_price') }}:</strong>
                                                    {{ $price }}</p>
                                                <p><strong>{{ __('dashboard.manage_stock') }}:</strong>
                                                    {{ $manage_stock == 1 ? __('dashboard.yes') : __('dashboard.no') }}
                                                </p>
                                                @if ($manage_stock == 1)
                                                    <p><strong>{{ __('dashboard.product_quantity') }}:</strong>
                                                        {{ $quantity }}</p>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('dashboard.has_discount') }}:</strong>
                                                {{ $has_discount == 1 ? __('dashboard.yes') : __('dashboard.no') }}
                                            </p>
                                            @if ($has_discount == 1)
                                                <p><strong>{{ __('dashboard.discount') }}:</strong>
                                                    {{ $discount }}%</p>
                                                <p><strong>{{ __('dashboard.discount_start_date') }}:</strong>
                                                    {{ $discount_start_date }}</p>
                                                <p><strong>{{ __('dashboard.discount_end_date') }}:</strong>
                                                    {{ $discount_end_date }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Display variants if product has variants -->
                                    @if ($has_variants == 1 && isset($prices) && count($prices) > 0)
                                        <div class="mt-4">
                                            <h6 class="mb-3">{{ __('dashboard.product_variants') }}</h6>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>{{ __('dashboard.product_price') }}</th>
                                                            <th>{{ __('dashboard.product_quantity') }}</th>
                                                            @if (isset($attributes))
                                                                @foreach ($attributes as $attribute)
                                                                    <th>{{ $attribute->name }}</th>
                                                                @endforeach
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < $valueRowCount; $i++)
                                                            <tr>
                                                                <td>{{ $i + 1 }}</td>
                                                                <td>{{ isset($prices[$i]) ? $prices[$i] : '-' }}</td>
                                                                <td>{{ isset($quantities[$i]) ? $quantities[$i] : '-' }}
                                                                </td>
                                                                @if (isset($attributes))
                                                                    @foreach ($attributes as $attribute)
                                                                        <td>
                                                                            @if (isset($attributeValues[$i][$attribute->id]))
                                                                                @foreach ($attribute->attributeValues as $attrValue)
                                                                                    @if ($attrValue->id == $attributeValues[$i][$attribute->id])
                                                                                        {{ $attrValue->value }}
                                                                                    @endif
                                                                                @endforeach
                                                                            @else
                                                                                -
                                                                            @endif
                                                                        </td>
                                                                    @endforeach
                                                                @endif
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if ($images && count($images) > 0)
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0">{{ __('dashboard.product_images') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($images as $image)
                                                <div class="col-md-3 mb-3">
                                                    <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail"
                                                        alt="{{ $name_en }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary" wire:click="previousStep">
                            {{ __('dashboard.previous') }}
                        </button>
                        <button type="button" class="btn btn-success" wire:click="submit">
                            {{ __('dashboard.submit') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('showFullscreenModal', event => {
                var myModal = new bootstrap.Modal(document.getElementById('fullscreenModal'));
                myModal.show();
            });
        });
    </script>
@endpush
