@foreach ($item->attributeValues as $value)
    <div class="badge border-primary primary">
        {{ $value->gettranslation('value', app()->getLocale()) }}
    </div>
@endforeach