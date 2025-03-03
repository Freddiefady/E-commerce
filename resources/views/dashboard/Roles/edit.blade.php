@extends('layouts.dashboard.app')
@section('title', __('dashboard.edit_role'))
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Basic Forms</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.Welcome')}}">{{__('dashboard.dashboard')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.roles.index')}}">{{__('dashboard.role')}}</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">{{__('dashboard.edit_role')}}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            @include('components.button-actions')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-colored-form-control">{{__('dashboard.roles')}}</h4>
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
                <div class="card-content collapse show">
                    <div class="card-body">
                        @include('components.validation-error')
                        <form class="form" action="{{route('dashboard.roles.update', $role->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <h4 class="form-section"><i class="la la-eye"></i> {{__('dashboard.edit_role')}}</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="userinput1">{{__('dashboard.role_name_en')}}</label>
                                            <input type="text" id="userinput1" class="form-control border-primary" value="{{$role->getTranslation('role', 'en') }}"
                                                placeholder="{{__('dashboard.role_name_en')}}" name="role[en]">
                                            @error('role.en')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="userinput2">{{__('dashboard.role_name_ar')}}</label>
                                            <input type="text" id="userinput2" class="form-control border-primary" value="{{$role->getTranslation('role', 'ar') }}"
                                                placeholder="{{__('dashboard.role_name_en')}}" name="role[ar]">
                                            @error('role.ar')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                @if (config('app.locale') == 'ar')
                                @foreach (config('permissions_ar') as $key => $value)
                                    <div class="col-md-2">
                                        <input type="checkbox" value="{{$key}}" name="permissions[]" class="checkbox" id="checkbox1{{ $key }}"
                                        @checked(in_array($key,json_decode($role->permissions)))>
                                        <label class="form-check-label" for="checkbox1{{ $key }}">{{ $value }}</label>
                                    </div>
                                @endforeach
                                @else
                                @foreach (config('permissions_en') as $key=>$value)
                                    <div class="col-md-2">
                                        <input type="checkbox" value="{{$key}}" name="permissions[]" class="checkbox" id="checkbox1{{ $key }}"
                                        @checked(in_array($key, json_decode($role->permissions)))>
                                        <label class="form-check-label" for="checkbox1{{ $key }}">{{ $value }}</label>
                                    </div>
                                @endforeach
                                @endif
                                    @error('permissions')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-actions right">
                                    <a href="{{route('dashboard.roles.index')}}" type="button" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> {{__('dashboard.cancel')}}
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> {{__('dashboard.save')}}
                                    </button>
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
