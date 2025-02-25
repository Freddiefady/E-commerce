<div class="content-header-right col-md-6 col-12">
    <div class="dropdown float-md-right">
        <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton" type="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('dashboard.operations')}}</button>
        <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton">
            <button class="coupon_edit dropdown-item"
                coupon-id="{{$coupon->id}}"
                coupon-code="{{$coupon->code}}"
                coupon-limit="{{$coupon->limit}}"
                coupon-start-date="{{$coupon->start_date}}"
                coupon-end-date="{{$coupon->end_date}}"
                coupon-discount="{{$coupon->discount_percentage}}"
                coupon-status="{{$coupon->is_active}}"><i class="la la-edit"></i>
                {{__('dashboard.edit')}}</button>

            <div class="dropdown-divider"></div>
            <button class="delete_btn dropdown-item" coupon-id="{{$coupon->id}}"><i class="la la-trash"></i>
                {{__('dashboard.delete')}}</button>
        </div>
    </div>
</div>
