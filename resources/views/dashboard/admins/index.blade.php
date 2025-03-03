@extends('layouts.dashboard.app')
@section('title', __('dashboard.admin'))
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
                        <h4 class="card-title">{{__('dashboard.admin')}}</h4>
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
                                        <th>{{__('auth.name')}}</th>
                                        <th>{{__('auth.email')}}</th>
                                        <th>{{__('dashboard.role')}}</th>
                                        <th>{{__('dashboard.status')}}</th>
                                        <th>{{__('dashboard.created_at')}}</th>
                                        <th>{{__('dashboard.operations')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($admins as $admin)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->role->role}}</td>
                                        <td>{{$admin->status()}}</td>
                                        <td>{{$admin->created_at->format('Y-m-d')}}</td>
                                        <td>
                                            <div class="dropdown float-md-left">
                                                <button class="btn btn-danger dropdown-toggle round btn-glow px-2"
                                                    id="dropdownBreadcrumbButton" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false">{{__('dashboard.operations')}}</button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton">
                                                    <a class="dropdown-item"
                                                        href="{{route('dashboard.admins.edit', $admin->id)}}">
                                                        <i class="la la-edit"></i>
                                                        {{__('dashboard.edit')}}</a>
                                                    <a class="dropdown-item"
                                                        href="{{route('dashboard.admins.status', $admin->id)}}">
                                                        <i class="la @if ($admin->status() == "Active") la-toggle-off @else la-toggle-on @endif"></i>
                                                        @if ($admin->status() == "Active") {{__('dashboard.inactive')}}
                                                        @else {{__('dashboard.active')}} @endif </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="javascript:void(0)"
                                                        onclick="if(confirm('Do you want delete the post'))
                                                        {document.getElementById('delete-id-{{$admin->id}}').submit()} return false">
                                                        <i class="la la-trash"></i>
                                                        {{__('dashboard.delete')}}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <form action="{{route('dashboard.admins.destroy', $admin->id)}}" method="POST"
                                        id="delete-id-{{$admin->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @empty
                                    <td colspan="4">{{__('dashboard.no_data')}}</td>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $admins->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Tables end -->
    </div>
</div>
@endsection