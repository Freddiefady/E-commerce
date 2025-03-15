@extends('layouts.dashboard.app')
@section('title', __('dashboard.products'))
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">{{__('dashboard.product_table')}}</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.Welcome')}}">{{__('dashboard.dashboard')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.products.index')}}">{{__('dashboard.products')}}</a>
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
                        <h4 class="card-title">{{__('dashboard.products')}}</h4>
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

                            <table id="DatatableYajra" class="table table-striped table-bordered language-file">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('dashboard.coupon_code')}}</th>
                                        <th>{{__('dashboard.coupon_discount')}}</th>
                                        <th>{{__('dashboard.coupon_start_date')}}</th>
                                        <th>{{__('dashboard.coupon_start_date')}}</th>
                                        <th>{{__('dashboard.coupon_limit')}}</th>
                                        <th>{{__('dashboard.coupon_time_used')}}</th>
                                        <th>{{__('dashboard.status')}}</th>
                                        <th>{{__('dashboard.created_at')}}</th>
                                        <th>{{__('dashboard.operations')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- body content table -->
                                </tbody>
                                <tfoot>
                                    <th>#</th>
                                    <th>{{__('dashboard.coupon_code')}}</th>
                                    <th>{{__('dashboard.coupon_discount')}}</th>
                                    <th>{{__('dashboard.coupon_start_date')}}</th>
                                    <th>{{__('dashboard.coupon_start_date')}}</th>
                                    <th>{{__('dashboard.coupon_limit')}}</th>
                                    <th>{{__('dashboard.coupon_time_used')}}</th>
                                    <th>{{__('dashboard.status')}}</th>
                                    <th>{{__('dashboard.created_at')}}</th>
                                    <th>{{__('dashboard.operations')}}</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
</div>
@endsection
