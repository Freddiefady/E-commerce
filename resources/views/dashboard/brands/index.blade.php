@extends('layouts.dashboard.app')
@section('title', __('dashboard.brands'))
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Brands Table</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.Welcome')}}">{{__('dashboard.dashboard')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.brands.index')}}">{{__('dashboard.brands')}}</a>
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
                        <h4 class="card-title">{{__('dashboard.brands')}}</h4>
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
                            @include('components.tostar-success')
                            @include('components.tostar-error')
                            <p class="card-text">As well as being able to pass language information to DataTables
                                through the language initialization option, you can also store
                                the language information in a file, which DataTables can load
                                by Ajax using the language.url option.</p>
                            <table id="DatatableYajra" class="table table-striped table-bordered language-file">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('auth.name')}}</th>
                                        <th>{{__('dashboard.logo')}}</th>
                                        <th>{{__('dashboard.products_count')}}</th>
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
                                    <th>{{__('auth.name')}}</th>
                                    <th>{{__('dashboard.logo')}}</th>
                                    <th>{{__('dashboard.products_count')}}</th>
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
</div>
@endsection
@push('js')
    // INFO: DatatableYajra
    <script>
        var lang = "{{app()->getLocale()}}";
        $('#DatatableYajra').DataTable({
            processing: true,
            serverSide: true,
            colReorder: true,
            // rowReorder: true,
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
                            return 'Details for ' + data[0] + ' ' + data[1];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            ajax: "{{ route(name: 'dashboard.brands.all') }}",

            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false },
                { data: 'name', name: 'name' },
                { data: 'logo', name: 'logo' },
                { data: 'products_count', name: 'products_count' },
                { data: 'status', name: 'status' },
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
    </script>
    // INFO: script for swal
    <script>
let title = "{{__('dashboard.title_swal')}}";
let text = "{{__('dashboard.text_swal')}}";
let confirmText = "{{__('dashboard.confirm_text_swal')}}";
let CancelText = "{{__('dashboard.Cancel_text_swal')}}";
let deletedTitle = "{{__('dashboard.deleted_title_swal')}}";
let deletedText = "{{__('dashboard.deleted_text_swal')}}";
let cancelledTitle = "{{__('dashboard.cancelled_title_swal')}}";
let cancelledText = "{{__('dashboard.cancel_text_swal')}}";
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            form = $(this).closest('form');

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: true
            });
            swalWithBootstrapButtons.fire({
                title: title,
                text: text,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: confirmText,
                cancelButtonText: cancelledText,
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    swalWithBootstrapButtons.fire({
                        title: deletedTitle,
                        text: deletedText,
                        icon: "success"
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: cancelledTitle,
                        text: cancelledText,
                        icon: "error"
                    });
                }
            });
        });
    </script>
@endpush
