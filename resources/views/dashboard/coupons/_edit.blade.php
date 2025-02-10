<!-- Modal -->
<div class="modal fade" id="EditCouponModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.edit_coupon')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Validation Error -->
                <div class="alert alert-danger" id="error_div_edit" style="display: none;">
                    <ul id="error_list_edit"></ul>
                </div>

                <form action="" class="form" id="updateCoupon" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="coupon_id" value="">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="coupon-code">{{__('dashboard.coupon_code')}}</label>
                                <input type="text" id="coupon_code" name="code" class="form-control"
                                    placeholder="{{__("dashboard.coupon_code")}}">
                            </div>
                            <div class="form-group">
                                <label for="coupon-discount">{{__('dashboard.coupon_discount')}}</label>
                                <input type="number" id="coupon_discount" name="discount_percentage" class="form-control"
                                    placeholder="{{__("dashboard.coupon_discount")}}">
                            </div>
                            <div class="form-group">
                                <label for="coupon-limit">{{__('dashboard.coupon_limit')}}</label>
                                <input type="number" id="coupon_limit" name="limit" class="form-control"
                                    placeholder="{{__("dashboard.coupon_limit")}}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="coupon-start-date">{{__('dashboard.coupon_start_date')}}</label>
                                        <input type="date" id="coupon_start_date" name="start_date" class="form-control"
                                            placeholder="{{__("dashboard.coupon_start_date")}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="coupon-end-date">{{__('dashboard.coupon_end_date')}}</label>
                                        <input type="date" id="coupon_end_date" name="end_date" class="form-control"
                                            placeholder="{{__("dashboard.coupon_end_date")}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{__('dashboard.status')}}</label>
                                <div class="input-group">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" value="1" name="is_active" class="custom-control-input"
                                            id="coupon_active">
                                        <label for="coupon_active"
                                            class="custom-control-label">{{__('dashboard.active')}}</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio">
                                        <input type="radio" value="0" name="is_active" class="custom-control-input"
                                            id="coupon_inactive">
                                        <label for="coupon_inactive"
                                            class="custom-control-label">{{__('dashboard.inactive')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="ft-x"></i>
                    {{__('dashboard.cancel')}}</button>
                    <button type="submit" class="btn btn-primary"><i class="la la-check-square-o"></i>
                    {{__('dashboard.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
