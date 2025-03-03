<!-- Modal -->
<div class="modal fade" id="editAttributeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.edit_attribute')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Validation Error -->
                <div class="alert alert-danger" id="error_div_edit" style="display: none">
                        <ul id="error_list_edit"></ul>
                    </div>

                <form class="form" action="" id="updateAttribute" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="attributeId">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_en">{{__('dashboard.attribute_name_en')}}</label>
                                <input type="text" id="name_en" name="name[en]" class="form-control"
                                    placeholder="{{__("dashboard.attribute_name_en")}}">
                                <div class="text-danger" id="error_code"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_ar">{{__('dashboard.attribute_name_ar')}}</label>
                                <input type="text" id="name_ar" name="name[ar]" class="form-control"
                                    placeholder="{{__("dashboard.attribute_name_ar")}}">
                                <div class="text-danger" id="error_code"></div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="row edit_attribute_values_row">

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary" id="add_more_edit"><i class="ft-plus"></i></button>
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
