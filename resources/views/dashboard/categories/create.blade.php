@extends('layouts.dashboard.app')
@section('title', __('dashboard.create_category'))
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">{{__('dashboard.create_category')}}</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.Welcome')}}">{{__('dashboard.dashboard')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.categories.index')}}">{{__('dashboard.categories')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="">{{__('dashboard.create_category')}}</a>
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
                        <h4 class="card-title">{{__('dashboard.categories')}}</h4>
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
                            <form class="form" action="{{route('dashboard.categories.store')}}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="eventRegInput1">{{__('auth.name_en')}}</label>
                                        <input type="text" id="eventRegInput1" name="name[en]" class="form-control"
                                            value="{{old('name[en]')}}" placeholder="{{__("auth.name_en")}}" >
                                            @error('name[en]')
                                                <strong>{{$message}}</strong>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="eventRegInput1">{{__('auth.name_ar')}}</label>
                                        <input type="text" id="eventRegInput1" name="name[ar]" class="form-control"
                                            value="{{old('name[ar]')}}" placeholder="{{__("auth.name_ar")}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="eventRegInput1">{{__('dashboard.select_parent')}}</label>
                                        <select name="parent" id="eventRegInput1" class="form-control">
                                            <option value="0">{{__('dashboard.select_parent')}}</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('dashboard.status')}}</label>
                                        <div class="input-group">
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" value="1" name="status" class="custom-control-input" id="yes1">
                                                <label for="yes1" class="custom-control-label">{{__('dashboard.active')}}</label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio">
                                                <input type="radio" value="0" name="status" class="custom-control-input" id="no1">
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
