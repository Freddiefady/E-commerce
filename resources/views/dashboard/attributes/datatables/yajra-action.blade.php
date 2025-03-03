<div class="content-header-right col-md-6 col-12">
    <div class="dropdown float-md-right">
        <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton" type="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('dashboard.operations')}}</button>
        <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton">
            <button class="attribute_edit dropdown-item"
                data-id="{{ $item->id }}"
                data-name-ar="{{ $item->getTranslation('name', 'ar') }}"
                data-name-en="{{ $item->getTranslation('name', 'en') }}"
                data-values="{{ $item->attributeValues->map(fn ($value) => [
                    'id' => $value->id,
                    'value_ar' => $value->getTranslation('value', 'ar'),
                    'value_en' => $value->getTranslation('value', 'en'),
                ])->toJson() }}"><i class="la la-edit"></i>
                    {{__('dashboard.edit')}}
                </button>

            <div class="dropdown-divider"></div>
            <button class="delete_btn dropdown-item" attribute-id="{{ $item->id }} "><i class="la la-trash"></i>
                {{__('dashboard.delete')}}</button>
        </div>
    </div>
</div>
