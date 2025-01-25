<!-- Modal -->
<div class="modal fade" id="change_price_{{$governorate->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.change_price')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="alert alert-danger" style="display: none;" id="errors_{{$governorate->id}}"></div>
            <form action="" method="POST" class="update_shipping_price" gov-id="{{$governorate->id}}">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <p>{{__('dashboard.select_shipping_price')}}</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">{{__('dashboard.change_price')}}</label>
                                <input type="number" name="price" value="{{$governorate->shippingGoverno->price}}"
                                    class="form-control">
                                <input type="hidden" name="governorate_id" value="{{$governorate->id}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.cancel')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('dashboard.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
