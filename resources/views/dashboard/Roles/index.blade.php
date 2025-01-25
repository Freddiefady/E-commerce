@extends('layouts.dashboard.app')
@section('title', __('dashboard.roles'))
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
                        </ol>
                    </div>
                </div>
            </div>
            @include('components.button-actions')
        </div>
        <!-- Basic Tables start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('dashboard.role')}}</h4>
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
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('dashboard.role')}}</th>
                                        <th>{{__('dashboard.permissions')}}</th>
                                        <th>{{__('dashboard.operations')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$role->role}}</td>
                                            <td>
                                                @if (config('app.locale') == 'ar')
                                                    @foreach (json_decode($role->permissions) as $permission)
                                                        @foreach (config('permissions_ar') as $key => $value)
                                                            {{ $key == $permission ? $value . ', ' : '' }}
                                                        @endforeach
                                                    @endforeach
                                                @else
                                                    @foreach (json_decode($role->permissions) as $permission)
                                                        {{ $permission }},
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown float-md-left">
                                                    <button class="btn btn-danger dropdown-toggle round btn-glow px-2"
                                                        id="dropdownBreadcrumbButton" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">{{__('dashboard.operations')}}</button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton">
                                                        <a class="dropdown-item"
                                                            href="{{route('dashboard.roles.edit', $role->id)}}">
                                                            <i class="la la-edit"></i>
                                                            {{__('dashboard.edit')}}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            onclick="if(confirm('Do you want delete the post')){document.getElementById('delete-id-{{$role->id}}').submit()} return false">
                                                            <i class="la la-trash"></i>
                                                            {{__('dashboard.delete')}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <form action="{{route('dashboard.roles.destroy', $role->id)}}" method="POST"
                                                id="delete-id-{{$role->id}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                    @empty
                                        <td colspan="4">{{__('dashboard.no_data')}}</td>
                                    @endforelse
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Tables end -->
    </div>
</div>
@endsection
