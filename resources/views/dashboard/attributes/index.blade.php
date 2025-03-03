@extends('layouts.dashboard.app')
@section('title', __('dashboard.attributes'))
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.attribute_table') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.Welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.attributes.index') }}">{{ __('dashboard.attributes') }}</a>
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
                            <h4 class="card-title">{{ __('dashboard.attributes') }}</h4>
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
                                    data-target="#attributeModal">
                                    {{ __('dashboard.create_attribute') }}
                                </button>
                                @include('dashboard.attributes._create')
                                @include('dashboard.attributes._edit')
                                <table id="DatatableYajra" class="table table-striped table-bordered language-file">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('dashboard.attribute_name') }}</th>
                                            <th>{{ __('dashboard.attribute_value') }}</th>
                                            <th>{{ __('dashboard.created_at') }}</th>
                                            <th>{{ __('dashboard.operations') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- body content table -->
                                    </tbody>
                                    <tfoot>
                                        <th>#</th>
                                        <th>{{ __('dashboard.attribute_name') }}</th>
                                        <th>{{ __('dashboard.attribute_value') }}</th>
                                        <th>{{ __('dashboard.created_at') }}</th>
                                        <th>{{ __('dashboard.operations') }}</th>
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
        var lang = "{{ app()->getLocale() }}";
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
                        header: function(row) {
                            var data = row.data();
                            return 'Details for coupon : ' + data['name'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            ajax: "{{ route('dashboard.attributes.all') }}",

            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'attributeValues',
                    name: 'attributeValues'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    searchable: false,
                    orderable: false
                }
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
        $('table').on('mousedown', 'button', function(e) {
            table.rowReorder.disable();
        });
        $('table').on('mouseup', 'button', function(e) {
            table.rowReorder.enable();
        });

        // Add new values to attribute in case create
        $(document).ready(function(e) {
            let valueIndex = 2;

            $('#add_more').on('click', function(e) {
                e.preventDefault();

                let newRow = `<div class="row attribute_value_row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="eventRegInput3${valueIndex}">{{ __('dashboard.attribute_value_en') }}</label>
                                <input type="text" id="eventRegInput3${valueIndex}" name="value[${valueIndex}][en]" class="form-control"
                                    placeholder="{{ __('dashboard.attribute_value_en') }}">
                                <div class="text-danger" id="error_code"></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="eventRegInput4${valueIndex}">{{ __('dashboard.attribute_value_ar') }}</label>
                                <input type="text" id="eventRegInput4${valueIndex}" name="value[${valueIndex}][ar]" class="form-control"
                                    placeholder="{{ __('dashboard.attribute_value_ar') }}">
                                <div class="text-danger" id="error_code"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove">&times;</button>
                        </div>
                    </div>`;

                //? append the new row to the form
                $('.attribute_value_row:last').after(newRow);

                valueIndex++; //Increment the counter for the next row
            });
        });
        //? remove the last row
        $(document).on('click', '.remove', function() {
            $(this).closest('.attribute_value_row').remove();
            $(this).closest('.edit_attribute_values_row').remove();
            valueIndex--; //Decrement the counter for the previous row
        });

        // Create attributes using ajax request
        $('#createAttribute').on('submit', function(e) {
            e.preventDefault();
            var currentPage = $('#DatatableYajra').DataTable().page();
            $.ajax({
                url: "{{ route('dashboard.attributes.store') }}",
                method: 'post',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 'success') {
                        $('#createAttribute')[0].reset();
                        $('#DatatableYajra').DataTable().page(currentPage).draw(false);
                        $('#attributeModal').modal('hide');
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
                error: function(data) {
                    if (data.responseJSON.errors) {
                        $('#error_list').empty();
                        $.each(data.responseJSON.errors, function(key, value) {
                            $('#error_list').append('<li>' + value[0] + '</li>');
                            $('#error_div').show();
                        });
                        Swal.fire({
                            position: "top-center",
                            icon: "error",
                            title: data.errors,
                            showConfirmButton: false,
                            timer: 2500
                        });
                    }
                }
            });
        });

        // Add new values to attribute in case edit
        $(document).on('click', '.attribute_edit', function() {
            let id = $(this).data('id');
            let nameAr = $(this).data('name-ar');
            let nameEn = $(this).data('name-en');
            let values = $(this).data('values');

            $('.edit_attribute_values_row').empty(); // Remove old rows

            // Populate name fields
            $('#attributeId').val(id);
            $('#name_ar').val(nameAr);
            $('#name_en').val(nameEn);

            // Clear and populate values container
            let valuesContainer = $('.edit_attribute_values_row:last');
            valuesContainer.empty();

            values.forEach(value => {
                valuesContainer.after(`
                    <div class="row edit_attribute_values_row">
                            <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name">{{ __('dashboard.attribute_value_en') }}</label>
                                        <input type="text" name="value[${value.id}][en]" class="form-control" id="code"
                                            value="${value.value_en}" placeholder="{{ __('dashboard.attribute_value_en') }}">
                                    </div>
                            </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name">{{ __('dashboard.attribute_value_ar') }}</label>
                                        <input type="text" name="value[${value.id}][ar]" class="form-control" id="code"
                                            value="${value.value_ar}" placeholder="{{ __('dashboard.attribute_value_ar') }}">
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <button  type="button" class="btn btn-danger remove"><i class="ft-x"></i></button>
                                </div>
                        </div>`);
            });

            // delete validation error on click
            $('#error_list_edit').empty();
            $('#error_div_edit').hide();
            // Show the modal
            $('#editAttributeModal').modal('show');
        });
        // Add new values to attribute in case UPdate
        $(document).ready(function(e) {
            let valueIndex = 100;

            $('#add_more_edit').on('click', function(e) {
                e.preventDefault();
                let newRow = `
                <div class="row edit_attribute_values_row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="eventRegInput3${valueIndex}">{{ __('dashboard.attribute_value_en') }}</label>
                                <input type="text" id="eventRegInput3${valueIndex}" name="value[${valueIndex}][en]" class="form-control"
                                    placeholder="{{ __('dashboard.attribute_value_en') }}">
                                <div class="text-danger" id="error_code"></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="eventRegInput4${valueIndex}">{{ __('dashboard.attribute_value_ar') }}</label>
                                <input type="text" id="eventRegInput4${valueIndex}" name="value[${valueIndex}][ar]" class="form-control"
                                    placeholder="{{ __('dashboard.attribute_value_ar') }}">
                                <div class="text-danger" id="error_code"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove">&times;</button>
                        </div>
                    </div>`;

                //? append the new row to the form
                $('.edit_attribute_values_row:last').after(newRow);

                valueIndex++; //Increment the counter for the next row
            });
        });
        // update with ajax attributes
        $('#updateAttribute').on('submit', function(e) {
            e.preventDefault();
            var attribute_id = $('#attributeId').val();
            var currentPage = $('#DatatableYajra').DataTable().page();
            $.ajax({
                url: "{{ route('dashboard.attributes.update', 'id') }}".replace('id', attribute_id),
                method: 'post',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 'success') {
                        $('#DatatableYajra').DataTable().page(currentPage).draw(false);
                        $('#editAttributeModal').modal('hide');
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
                error: function(data) {
                    if (data.responseJSON.errors) {
                        $.each(data.responseJSON.errors, function(key, value) {
                            $('#error_list_edit').empty();
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
        //! Delete with ajax attributes
        $(document).on('click', '.delete_btn', function(e) {
            e.preventDefault();
            var id = $(this).attr('attribute-id');

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
                        url: "{{ route('dashboard.attributes.destroy', ':id') }}".replace(':id',
                            id),
                        type: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
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
