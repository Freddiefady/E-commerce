@extends('layouts.dashboard.app')
@section('title', __('dashboard.edit_admin'))
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
                                    href="{{route('dashboard.admins.index')}}">{{__('dashboard.admin')}}</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">{{__('dashboard.edit_admin')}}</a>
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
                    <h4 class="card-title" id="basic-layout-colored-form-control">{{__('dashboard.admins')}}</h4>
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
                        <form class="form" action="{{route('dashboard.admins.update', $admin->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$admin->id}}">
                            <div class="form-body">
                                <h4 class="form-section"><i class="la la-eye"></i> {{__('dashboard.edit_admin')}}</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="userinput1">{{__('dashboard.admin_name')}}</label>
                                            <input type="text" id="userinput1" class="form-control border-primary" value="{{$admin->name}}"
                                                placeholder="{{__('dashboard.admin_name')}}" name="name">
                                            @error('admin.en')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="userinput2">{{__('dashboard.admin_email')}}</label>
                                            <input type="text" id="userinput2" class="form-control border-primary" value="{{$admin->email}}"
                                                placeholder="{{__('dashboard.admin_email')}}" name="email">
                                            @error('admin.ar')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="userinput1">{{__('dashboard.admin_password')}}</label>
                                            <input type="text" id="userinput1" class="form-control border-primary"
                                                placeholder="{{__('dashboard.admin_password')}}" name="password">
                                            @error('password')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="userinput2">{{__('dashboard.admin_password_confirmation')}}</label>
                                            <input type="text" id="userinput2" class="form-control border-primary"
                                                placeholder="{{__('dashboard.admin_password_confirmation')}}" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-1">
                                        <label for="userinput3">{{__('dashboard.select_roles')}}</label>
                                        <select class="form-control" name="role_id">
                                            <optgroup>
                                                @foreach($roles as $role)
                                                <option value="{{$role->id}}"  @selected($admin->role_id == $role->id)>{{$role->role}}</option>
                                                @endforeach
                                        </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-1">
                                        <label for="userinput3">{{__('dashboard.select_status')}}</label>
                                        <select class="form-control" name="status">
                                            <optgroup>
                                                <option value="1"  @selected($admin->status == 'Active')>{{__('dashboard.active')}}</option>
                                                <option value="0"  @selected($admin->status == 'Inactive')>{{__('dashboard.inactive')}}</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="form-actions right">
                                    <a href="{{route('dashboard.admins.index')}}" type="button" class="btn btn-warning mr-1">
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
