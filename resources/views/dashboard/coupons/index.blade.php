@extends('layouts.dashboard.app')
@section('title', __('dashboard.coupons'))
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">coupons Table</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.Welcome')}}">{{__('dashboard.dashboard')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.coupons.index')}}">{{__('dashboard.coupons')}}</a>
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
                        <h4 class="card-title">{{__('dashboard.coupons')}}</h4>
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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#couponModal">
                                {{__('dashboard.create_coupon')}}
                            </button>
                            @include('dashboard.coupons._create')
                            @include('dashboard.coupons._edit')

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
@push('js')
    <script>
        var lang = "{{app()->getLocale()}}";
        const table = $('#DatatableYajra').DataTable({
            processing: true,
            serverSide: true,
            colReorder: true,
            rowReorder: {
                update: false,
                selector: 'tr',
            },
            fixedHeader: true,
            // scroller:       true,
            // deferRender:    true,
            // scrollY:        400,
            select: true,
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details for coupon : ' + data['code'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            ajax: "{{ route('dashboard.coupons.all') }}",

            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false },
                { data: 'code', name: 'code' },
                { data: 'discount_percentage', name: 'discount_percentage' },
                { data: 'start_date', name: 'start_date' },
                { data: 'end_date', name: 'end_date' },
                { data: 'limit', name: 'limit' },
                { data: 'time_used', name: 'time_used' },
                { data: 'is_active', name: 'is_active' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', searchable: false, orderable: false }
            ],
            language: lang === 'ar' ? {
                url: '//cdn.datatables.net/plug-ins/2.2.1/i18n/ar.json',
            } : {},
            layout: {
                topStart: {
                    buttons: [
                        'colvis', 'copy', 'excel', 'pdf', 'print'
                    ]
                }
            }
        });
        $('table').on('mousedown', 'button', function (e) {
            table.rowReorder.disable();
        });
        $('table').on('mouseup', 'button', function (e) {
            table.rowReorder.enable();
        });
        //! Create with ajax Coupons
        $('#createCoupon').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{route('dashboard.coupons.store')}}",
                method: 'post',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status == 'success') {
                        $('#createCoupon')[0].reset();
                        $('#DatatableYajra').DataTable().ajax.reload();
                        $('#couponModal').modal('hide');
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2500
                        });
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
                        $.each(data.responseJSON.errors, function (key, value) {
                            $('#error_list').append('<li>' + value[0] + '</li>');
                            $('#error_div').show();
                        });
                    }
                    Swal.fire({
                        position: "top-center",
                        icon: "error",
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            });
        });
        //! Edit with ajax Coupons
        $(document).on('click', '.coupon_edit', function (e) {
            e.preventDefault();

            $('#coupon_id').val($(this).attr('coupon-id'));
            $('#coupon_code').val($(this).attr('coupon-code'));
            $('#coupon_limit').val($(this).attr('coupon-limit'));
            $('#coupon_start_date').val($(this).attr('coupon-start-date'));
            $('#coupon_end_date').val($(this).attr('coupon-end-date'));
            $('#coupon_discount').val($(this).attr('coupon-discount'));
            var status = $(this).attr('coupon-status');
            if (status == 1) {
                $('#coupon_active').prop('checked', true);
            } else {
                $('#coupon_inactive').prop('checked', true);
            }
            $('#EditCouponModal').modal('show');
        });
        // update with ajax Coupons
        $('#updateCoupon').on('submit', function (e) {
            e.preventDefault();
            var coupon_id = $('#coupon_id').val();
            $.ajax({
                url: "{{route('dashboard.coupons.update', 'id')}}".replace('id', coupon_id),
                method: 'post',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status == 'success') {
                        $('#DatatableYajra').DataTable().ajax.reload();
                        $('#EditCouponModal').modal('hide');
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2500
                        });
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
                        $.each(data.responseJSON.errors, function (key, value) {
                            $('#error_list_edit').append('<li>' + value[0] + '</li>');
                            $('#error_div_edit').show();
                        });
                    }
                    Swal.fire({
                        position: "top-center",
                        icon: "error",
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            });
        });
        //! Delete with ajax Coupons
        $(document).on('click', '.delete_btn', function (e) {
            e.preventDefault();
            var id = $(this).attr('coupon-id');

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
                        url: "{{ route('dashboard.coupons.destroy', 'id') }}".replace('id', id),
                        type: "DELETE",
                        data: {
                            _token: '{{csrf_token()}}',
                        },
                        success: function (response) {
                            if (response.status == 'success') {
                                Swal.fire({
                                    title: response.status,
                                    text: response.message,
                                    icon: "success"
                                });
                                $('#DatatableYajra').DataTable().ajax.reload();
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
