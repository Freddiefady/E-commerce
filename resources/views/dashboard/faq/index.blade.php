@extends('layouts.dashboard.app')
@section('title', __('dashboard.faqs'))
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.faq_table') }}
                </h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.Welcome') }}">{{ __('dashboard.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.faqs.index') }}">{{ __('dashboard.faqs') }}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Collapse -->
        <div class="row">
            <!-- Button trigger modal -->
            @include('dashboard.faq._create')
            <div class="col-xl-12 col-lg-12">
                <div class="mb-1">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#faqModal">
                        {{ __('dashboard.create_faq') }}
                    </button>
                </div>
                <div class="card faq_row" id="headingCollapse1">
                    @forelse($faqs as $faq)
                    <div id="rm_both{{ $faq->id }}">
                        <div role="tabpanel" class="card-header">
                            <a data-toggle="collapse" id="question{{ $faq->id }}" href="#collapse1_{{ $faq->id }}" aria-expanded="true"
                                aria-controls="collapse1" class="font-medium-1">{{ $loop->iteration }}#
                                {{ $faq->question }}</a>
                            <div class="float-right red"><a class="faq_delete_btn" faq-id="{{ $faq->id }}"><i class="la la-trash"></i></a></div>
                            <div class="float-right">
                                <a data-target="#editFaqModal{{ $faq->id }}" data-toggle="modal"><i class="la la-edit"></i></a>
                            </div>
                        </div>
                        <div id="collapse1_{{ $faq->id }}" role="tabpanel" aria-labelledby="headingCollapse1"
                            class="card-collapse collapse @if ($loop->index == 0) show @endif" aria-expanded="true">
                            <div id="answer{{ $faq->id }}" class="card-body">{{ $faq->answer }}</div>
                        </div>
                    </div>
                    @include('dashboard.faq._edit')
                    @empty
                        <div class="text-danger">No Data Yet.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        //Create with Ajax
        $(document).on('submit', '#createFaq', function (e) {
            e.preventDefault();
            var locale = "{{ app()->getLocale() }}";
            var iteration = 0; $('.faq_row').each(function() { iteration++;  });
            $.ajax({
                url: "{{ route('dashboard.faqs.store') }}",
                type: "POST",
                data: new FormData($(this)[0]),
                processData: false,
                contentType: false,
                success: function (data) {
                    var Question = locale == 'ar' ? data.faq.question.ar : data.faq.question.en;
                    var Answer =  locale == 'ar' ? data.faq.answer.ar : data.faq.answer.en;
                    if (data.status == 'success') {
                        $('#createFaq')[0].reset();
                        $('.faq_row').prepend(`<div role="tabpanel" class="card-header">
                                    <a data-toggle="collapse" href="#collapse1_${ data.faq.id }" aria-expanded="true"
                                        aria-controls="collapse1" class="font-medium-1">${ iteration }#
                                        ${ Question }</a>
                                    <div class="float-right red"><i class="la la-trash"></i></div>
                                    <div class="float-right"><i class="la la-edit"></i></div>
                                </div>
                                <div id="collapse1_${data.faq.id }" role="tabpanel" aria-labelledby="headingCollapse1"
                                    class="card-collapse collapse show" aria-expanded="true">
                                    <div class="card-body">${ Answer }</div>
                                </div>`);
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2500
                        });
                        $('#faqModal').modal('hide');
                    } else {
                        Swal.fire({
                            position: "top-center",
                            icon: "error",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2500
                        });
                    }
                },
                error: function (data) {
                    if (data.responseJSON.errors) {
                        $('#error_list').empty();
                        $.each(data.responseJSON.errors, function (key, value) {
                            $('#error_list').append('<li>' + value[0] + '</li>');
                            $('#error_div').show();
                        });
                        Swal.fire({
                            position: "top-center",
                            icon: "error",
                            title: data.responseJSON.message,
                            showConfirmButton: false,
                            timer: 5500
                        });
                    }
                }
            });
        });
        //Update with Ajax
        $(document).on('submit', '.edit_faq_form', function (e) {
            e.preventDefault();
            var locale = "{{ app()->getLocale() }}";
            var id = $(this).attr('faq-id');
                $.ajax({
                    url: "{{ route('dashboard.faqs.update', ':id') }}".replace(':id', id),
                    type: "POST",
                    data: new FormData($(this)[0]),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        var Question = locale == 'ar' ? data.faq.question.ar : data.faq.question.en;
                        var Answer =  locale == 'ar' ? data.faq.answer.ar : data.faq.answer.en;
                        if (data.status == 'success') {
                            $('#editFaqModal'+id).modal('hide');
                            $('#question'+id).empty().text(Question);
                            $('#answer'+id).empty().text(Answer);
                            Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 5500
                        });
                        } else {
                            Swal.fire({
                            position: "top-center",
                            icon: "error",
                            title: data.faq.message,
                            showConfirmButton: false,
                            timer: 5500
                        });
                        }
                    },
                    error: function (data) {
                    if (data.responseJSON.errors) {
                        $('#error_list_edit'+id).empty();
                        $.each(data.responseJSON.errors, function (key, value) {
                            $('#error_list_edit'+id).append('<li>' + value[0] + '</li>');
                            $('#error_div_edit'+id).show();
                        });
                        Swal.fire({
                            position: "top-center",
                            icon: "error",
                            title: data.responseJSON.message,
                            showConfirmButton: false,
                            timer: 5500
                        });
                    }
                }
            });
        });
        //Delete with Ajax
        $(document).on('click', '.faq_delete_btn', function (e) {
            e.preventDefault();
            var id = $(this).attr('faq-id');

            Swal.fire({
                title: title,
                text: text,
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: cancelledTitle,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: confirmText
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('dashboard.faqs.destroy', 'id') }}".replace('id', id),
                        type: "DELETE",
                        data: {
                            _token: '{{csrf_token()}}',
                        },
                        success: function (response) {
                            if (response.status == 'success') {
                                $('#rm_both'+id).remove();
                                Swal.fire({
                                    title: response.status,
                                    text: response.message,
                                    icon: "success"
                                });
                            } else {
                                Swal.fire({
                                    title: response.status,
                                    text: response.message,
                                    icon: "error"
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endpush
