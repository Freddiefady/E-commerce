<!-- Modal -->
<div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.create_faq')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Validation Error -->
                <div class="alert alert-danger" id="error_div" style="display: none;">
                    <ul id="error_list"></ul>
                </div>

                <form class="form" action="" id="createFaq" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eventRegInput1">{{__('dashboard.faq_question_en')}}</label>
                                        <input type="text" id="eventRegInput1" name="question[en]" class="form-control"
                                            placeholder="{{__("dashboard.faq_question_en")}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eventRegInput2">{{__('dashboard.faq_question_ar')}}</label>
                                        <input type="text" id="eventRegInput2" name="question[ar]" class="form-control"
                                            placeholder="{{__("dashboard.faq_question_ar")}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eventRegInput3">{{__('dashboard.faq_answer_en')}}</label>
                                        <input type="text" id="eventRegInput3" name="answer[en]" class="form-control"
                                            placeholder="{{__("dashboard.faq_answer_en")}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eventRegInput4">{{__('dashboard.faq_answer_ar')}}</label>
                                        <input type="text" id="eventRegInput4" name="answer[ar]" class="form-control"
                                            placeholder="{{__("dashboard.faq_answer_ar")}}">
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
