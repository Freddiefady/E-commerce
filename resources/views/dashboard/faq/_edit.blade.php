<!-- Modal -->
<div class="modal fade" id="editFaqModal{{ $faq->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.edit_faq')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Validation Error -->
                <div class="alert alert-danger" id="error_div_edit{{ $faq->id }}" style="display: none;">
                    <ul id="error_list_edit{{ $faq->id }}"></ul>
                </div>

                <form class="form edit_faq_form" action="" faq-id="{{ $faq->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eventRegInput1">{{__('dashboard.faq_question_en')}}</label>
                                        <input type="text" id="eventRegInput1" name="question[en]" class="form-control"
                                            value="{{ $faq->getTranslation('question', 'en') }}"
                                            placeholder="{{__("dashboard.faq_question_en")}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eventRegInput2">{{__('dashboard.faq_question_ar')}}</label>
                                        <input type="text" id="eventRegInput2" name="question[ar]" class="form-control"
                                            value="{{ $faq->getTranslation('question', 'ar') }}"
                                            placeholder="{{__("dashboard.faq_question_ar")}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eventRegInput3">{{__('dashboard.faq_answer_en')}}</label>
                                        <textarea name="answer[en]" id="eventRegInput3" class="form-control"
                                            placeholder="{{__("dashboard.faq_answer_en")}}">{{ $faq->getTranslation('answer', 'en') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eventRegInput4">{{__('dashboard.faq_answer_ar')}}</label>
                                        <textarea name="answer[ar]" id="eventRegInput4" class="form-control"
                                            placeholder="{{__("dashboard.faq_answer_ar")}}">{{ $faq->getTranslation('answer', 'ar') }}</textarea>
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
