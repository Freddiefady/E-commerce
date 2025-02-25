@extends('layouts.dashboard.app')
@section('title', __('dashboard.settings'))
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{__('dashboard.settings_table')}}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{route('dashboard.Welcome')}}">{{__('dashboard.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('dashboard.settings.index')}}">{{__('dashboard.settings')}}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Tables start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{__('dashboard.settings')}}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('dashboard.settings.update', $settings->id) }}" method="post"
                                    enctype="multipart/form-data" class="form  form-horizontal row-separator setting_form">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <!-- Basic -->
                                        <h4 class="form-section"><i class="la la-eye"></i>
                                            {{__('dashboard.basic_settings')}}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput1">{{__('dashboard.site_name_ar')}}</label>
                                                        <div class="col-md-9">
                                                            <input readonly type="text" id="userInput1" class="form-control"
                                                                placeholder="{{__('dashboard.site_name_ar')}}" name="site_name[ar]"
                                                                value="{{ $settings->getTranslation('site_name', 'ar') }}">
                                                            </div>
                                                    @error('site_name.ar')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput2">{{__('dashboard.site_name_en')}}</label>
                                                        <div class="col-md-9">
                                                            <input readonly type="text" id="userInput2" class="form-control"
                                                                placeholder="{{__('dashboard.site_name_en')}}" name="site_name[en]"
                                                                value="{{ $settings->getTranslation('site_name', 'en') }}">
                                                        </div>
                                                    @error('site_name.en')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput3">{{__('dashboard.site_description_ar')}}</label>
                                                        <div class="col-md-9">
                                                            <textarea readonly id="userInput3" class="form-control"
                                                                placeholder="{{__('dashboard.site_description_ar')}}" name="site_description[ar]">
                                                                {{ $settings->getTranslation('site_description', 'ar') }}
                                                            </textarea>
                                                        </div>
                                                    @error('site_description.ar')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput4">{{__('dashboard.site_description_en')}}</label>
                                                        <div class="col-md-9">
                                                            <textarea readonly id="userInput4" class="form-control"
                                                                placeholder="{{__('dashboard.site_description_en')}}" name="site_description[en]">
                                                                {{ $settings->getTranslation('site_description', 'en') }}
                                                            </textarea>
                                                        </div>
                                                    @error('site_description.en')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput5">{{__('dashboard.meta_description_ar')}}</label>
                                                        <div class="col-md-9">
                                                            <textarea readonly id="userInput5" class="form-control"
                                                                placeholder="{{__('dashboard.meta_description_ar')}}"
                                                                name="meta_description[ar]">{{ $settings->getTranslation('meta_description', 'ar') }}
                                                            </textarea>
                                                        </div>
                                                    @error('meta_description.ar')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput6">{{__('dashboard.meta_description_en')}}</label>
                                                        <div class="col-md-9">
                                                            <textarea readonly id="userInput6" class="form-control"
                                                                placeholder="{{__('dashboard.meta_description_en')}}"
                                                                name="meta_description[en]">{{ $settings->getTranslation('meta_description', 'en') }}
                                                            </textarea>
                                                        </div>
                                                    @error('meta_description.en')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput7">{{__('dashboard.site_address_ar')}}</label>
                                                        <div class="col-md-9">
                                                            <input readonly type="text" id="userInput7" class="form-control"
                                                                placeholder="{{__('dashboard.site_address_ar')}}" name="address[ar]"
                                                                value="{{ $settings->getTranslation('address', 'ar') }}">
                                                        </div>
                                                    @error('address.ar')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput7">{{__('dashboard.site_address_en')}}</label>
                                                        <div class="col-md-9">
                                                            <input readonly type="text" id="userInput7" class="form-control"
                                                                placeholder="{{__('dashboard.site_address_en')}}" name="address[en]"
                                                                value="{{ $settings->getTranslation('address', 'en') }}">
                                                        </div>
                                                    @error('address.en')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput8">{{__('dashboard.site_copyright')}}</label>
                                                        <div class="col-md-9">
                                                            <input readonly type="text" id="userInput8" class="form-control"
                                                                placeholder="{{__('dashboard.site_copyright')}}"
                                                                name="site_copyright" value="{{ $settings->site_copyright }}">
                                                        </div>
                                                    @error('site_copyright')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput8">{{__('dashboard.site_phone')}}</label>
                                                        <div class="col-md-9">
                                                            <input readonly type="number" id="userInput8" class="form-control"
                                                                placeholder="{{__('dashboard.site_phone')}}"
                                                                name="phone" value="{{ $settings->phone }}">
                                                        </div>
                                                    @error('phone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- contact -->
                                        <h4 class="form-section"><i class="la la-envelope"></i>
                                            {{__('dashboard.contact_info')}}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput9">{{__('dashboard.site_email')}}</label>
                                                        <div class="col-md-9">
                                                            <input readonly type="text" id="userInput9" class="form-control"
                                                                placeholder="{{__('dashboard.site_email')}}" name="email"
                                                                value="{{ $settings->email }}">
                                                        </div>
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput10">{{__('dashboard.site_email_support')}}</label>
                                                        <div class="col-md-9">
                                                            <input readonly type="text" id="userInput10" class="form-control"
                                                                placeholder="{{__('dashboard.site_email_support')}}"
                                                                name="email_support" value="{{ $settings->email_support }}">
                                                        </div>
                                                    @error('email_support')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- social -->
                                        <h4 class="form-section"><i class="la la-connectdevelop"></i>
                                            {{__('dashboard.social_media')}}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput9">{{__('dashboard.facebook_url')}}</label>
                                                        <div class="col-md-9">
                                                            <input readonly type="text" id="userInput9" class="form-control"
                                                                placeholder="{{__('dashboard.facebook_url')}}" name="facebook_url"
                                                                value="{{ $settings->facebook_url }}">
                                                        </div>
                                                    @error('facebook_url')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput10">{{__('dashboard.youtube_url')}}</label>
                                                        <div class="col-md-9">
                                                            <input readonly type="text" id="userInput10" class="form-control"
                                                                placeholder="{{__('dashboard.youtube_url')}}" name="youtube_url"
                                                                value="{{ $settings->youtube_url }}">
                                                        </div>
                                                    @error('youtube_url')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput10">{{__('dashboard.twitter_url')}}</label>
                                                        <div class="col-md-9">
                                                            <input readonly type="text" id="userInput10" class="form-control"
                                                                placeholder="{{__('dashboard.twitter_url')}}" name="twitter_url"
                                                                value="{{ $settings->twitter_url }}">
                                                        </div>
                                                    @error('twitter_url')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="form-section"><i class="la la-envelope"></i>
                                            {{__('dashboard.media')}}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput9">{{__('dashboard.logo')}}</label>
                                                        <div class="col-md-9">
                                                            <input type="file" id="logo-image" class="form-control"
                                                                placeholder="{{__('dashboard.logo')}}" name="logo"
                                                                value="{{ asset($settings->logo) }}">
                                                        </div>
                                                    @error('logo')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userInput10">{{__('dashboard.favicon')}}</label>
                                                        <div class="col-md-9">
                                                            <input type="file" id="favicon-image" class="form-control"
                                                                placeholder="{{__('dashboard.favicon')}}" name="favicon"
                                                                value="{{ asset($settings->favicon) }}">
                                                        </div>
                                                    @error('favicon')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="promotion_video_url-image">{{__('dashboard.promotion_video_url')}}</label>
                                                        <div class="col-md-9">
                                                            <input readonly type="text" id="promotion_video_url-image" class="form-control"
                                                                placeholder="{{__('dashboard.promotion_video_url')}}" name="promotion_video_url"
                                                                value="{{ asset($settings->promotion_video_url) }}">
                                                            </div>
                                                    @error('promotion_video_url')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer mt-1">
                                            <button type="button" hidden id="btn_cancel" class="btn btn-warning"
                                                data-dismiss="modal"><i class="ft-x"></i>
                                                {{__('dashboard.cancel')}}</button>
                                            <button type="submit" hidden id="btn_submit" class="btn btn-primary"><i
                                                    class="la la-check-square-o"></i>
                                                {{__('dashboard.save')}}
                                            </button>
                                            <button type="button" id="btn_edit" class="btn btn-info" data-dismiss="modal"><i class="ft-x"></i>
                                                {{__('dashboard.edit')}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        var lang = "{{ app()->getLocale() }}";
        $(function () {
            $('#logo-image').fileinput({
                theme: 'fa5',
                language: lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                enableResumableUpload: false,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                    "{{ asset($settings->logo) }}",
                ]
            });
        });
        $(function () {
            $('#favicon-image').fileinput({
                theme: 'fa5',
                language: lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                enableResumableUpload: false,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                    "{{ asset($settings->favicon) }}",
                ]
            });
        });
        //! Toggle button and remove readonly attribute
        var originalValues = {};
        $(document).on('click', '#btn_edit', function () {
            $('#btn_edit').attr('hidden', true);
            $('#btn_submit').removeAttr('hidden');
            $('#btn_cancel').removeAttr('hidden');
            $('.setting_form input').prop('readonly', false);
            $('.setting_form textarea').prop('readonly', false);
            $('.setting_form input, .setting_form textarea').addClass('border-primary');
            // Store the original values
            $('.setting_form input, .setting_form textarea').each(function () {
                originalValues[$(this).attr('name')] = $(this).val();
            });
        });

        $(document).on('click', '#btn_cancel', function () {
            $('#btn_edit').removeAttr('hidden');
            $('#btn_submit').attr('hidden', true);
            $('#btn_cancel').attr('hidden', true);
            $('.setting_form input').prop('readonly', true);
            $('.setting_form textarea').prop('readonly', true);
            $('.setting_form input, .setting_form textarea').removeClass('border-primary');
            // Restore the original values
            $('.setting_form input, .setting_form textarea').each(function () {
                $(this).val(originalValues[$(this).attr('name')]);
            });
        });
    </script>
@endpush