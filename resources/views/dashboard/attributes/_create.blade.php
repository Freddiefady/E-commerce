<!-- Modal -->
<div class="modal fade" id="attributeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.create_attribute')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Validation Error  --}}
                    <div class="alert alert-danger" id="error_div" style="display: none">
                        <ul id="error_list"></ul>
                    </div>

                <form class="form" action="" id="createAttribute" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="eventRegInput1">{{__('dashboard.attribute_name_en')}}</label>
                                <input type="text" id="eventRegInput1" name="name[en]" class="form-control"
                                    placeholder="{{__("dashboard.attribute_name_en")}}">
                                @error ('name.en')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="eventRegInput2">{{__('dashboard.attribute_name_ar')}}</label>
                                <input type="text" id="eventRegInput2" name="name[ar]" class="form-control"
                                    placeholder="{{__("dashboard.attribute_name_ar")}}">
                                @error ('name.ar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="row attribute_value_row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-custom-control-label"
                                    for="eventRegInput3">{{__('dashboard.attribute_value_en')}}</label>
                                <input type="text" id="eventRegInput3" name="value[1][en]" class="form-control"
                                    placeholder="{{__("dashboard.attribute_value_en")}}">
                                @error ('value.*.en')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-custom-control-label"
                                    for="eventRegInput4">{{__('dashboard.attribute_value_ar')}}</label>
                                <input type="text" id="eventRegInput4" name="value[1][ar]" class="form-control"
                                    placeholder="{{__("dashboard.attribute_value_ar")}}">
                                @error ('value.*.ar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 mt-2">
                            <button disabled type="button" class="btn btn-danger remove">&times;</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary" id="add_more"><i
                                    class="ft-plus"></i></button>
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
