@extends('layouts.dashboard.app')
@section('title', __('dashboard.edit_brand'))
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">{{__('dashboard.create_brand')}}</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard.Welcome')}}">{{__('dashboard.dashboard')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard.brands.index')}}">{{__('dashboard.brands')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="">{{__('dashboard.edit_brand')}}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- @include('components.button-actions') -->
        </div>
        <!-- Basic Tables start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('dashboard.edit_brand')}}</h4>
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
                            @include('components.validation-error')
                            <p class="card-text">As well as being able to pass language information to DataTables
                                through the language initialization option, you can also store
                                the language information in a file, which DataTables can load
                                by Ajax using the language.url option.</p>
                            <form class="form" action="{{route('dashboard.brands.update', $brand->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="eventRegInput1">{{__('auth.name_en')}}</label>
                                        <input type="text" id="eventRegInput1" name="name[en]" class="form-control"
                                            value="{{$brand->getTranslation('name', 'en')}}" placeholder="{{__("auth.name_en")}}">
                                    <div class="form-group">
                                        <label for="eventRegInput1">{{__('auth.name_ar')}}</label>
                                        <input type="text" id="eventRegInput1" name="name[ar]" class="form-control"
                                            value="{{$brand->getTranslation('name', 'ar')}}" placeholder="{{__("auth.name_ar")}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventRegInput1">{{__('dashboard.logo')}}</label>
                                        <input type="file" class="form-control" name="logo" id="singleImageEdit">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('dashboard.status')}}</label>
                                        <div class="input-group">
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" value="1" @checked($brand->status == 1) name="status" class="custom-control-input" id="yes1">
                                                <label for="yes1" class="custom-control-label">{{__('dashboard.active')}}</label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio">
                                                <input type="radio" value="0" @checked($brand->status == 0) name="status" class="custom-control-input" id="no1">
                                                <label for="no1" class="custom-control-label">{{__('dashboard.inactive')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions center">
                                        <a href="{{url()->previous()}}" type="button" class="btn btn-warning mr-1"><i class="ft-x"></i> {{__('dashboard.cancel')}}</a>
                                        <button type="submit" class="btn btn-primary mr-1"><i class="la la-check-square-o"></i> {{__('dashboard.save')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
</div>
</div>
@endsection
@push('js')
<script>
        var lang = "{{app()->getLocale()}}";
    $(function() {
            $('#singleImageEdit').fileinput({
                theme: 'fa5',
                language: lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                showUpload:false,
                initialPreviewAsData: true,
                initialPreview:[
                    "{{ asset($brand->logo) }}"
                ],
            });
        });
    </script>
@endpush
