    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('assets/dashboard')}}/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('assets/dashboard')}}/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard')}}/vendors/js/charts/chartist-plugin-tooltip.min.js"
        type="text/javascript"></script>
    <script src="{{asset('assets/dashboard')}}/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard')}}/vendors/js/charts/morris.min.js" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard')}}/vendors/js/timeline/horizontal-timeline.js"
        type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{asset('assets/dashboard')}}/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard')}}/js/core/app.js" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard')}}/js/scripts/customizer.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('assets/dashboard')}}/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- DataTables CDN -->
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
    <!-- responsive CDN -->
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.min.js" type="text/javascript"></script>
    <!-- colReorder AND RowRecorder CDN -->
    <script src="https://cdn.datatables.net/colreorder/2.0.4/js/dataTables.colReorder.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/colreorder/2.0.4/js/colReorder.bootstrap5.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.bootstrap5.min.js" type="text/javascript"></script>
    <!-- fixedHeader CDN -->
    <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/fixedHeader.bootstrap5.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.min.js"
        type="text/javascript"></script>
    <!-- colReorder AND RowRecorder CDN -->
    <script src="https://cdn.datatables.net/colreorder/2.0.4/js/dataTables.colReorder.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.datatables.net/colreorder/2.0.4/js/colReorder.bootstrap5.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.bootstrap5.min.js"
        type="text/javascript"></script>
    <!-- fixedHeader CDN -->
    <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/dataTables.fixedHeader.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/fixedHeader.bootstrap5.min.js"
        type="text/javascript"></script>
    <!-- Scroller CDN -->
    <script src="https://cdn.datatables.net/scroller/2.4.3/js/dataTables.scroller.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/scroller/2.4.3/js/scroller.bootstrap5.min.js" type="text/javascript"></script>
    <!-- Select CDN -->
    <script src="https://cdn.datatables.net/select/3.0.0/js/dataTables.select.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/select/3.0.0/js/select.bootstrap5.min.js" type="text/javascript"></script>
    <!-- The Buttons extension for DataTables  -->
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.bootstrap5.min.js" type="text/javascript"></script>
    <!-- Column visibility control: -->
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.colVis.min.js" type="text/javascript"></script>
    <!-- Print button: -->
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js" type="text/javascript"></script>
    <!-- pdf button: -->
    <script src="{{asset('assets/dashboard/vendors/js/tables/pdfmake.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/vendors/js/tables/vfs_fonts.js')}}" type="text/javascript"></script>
    <!-- HTML5 export buttons: -->
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js" type="text/javascript"></script>
    <!-- excel Sheet -->
    <script src="{{asset('assets/dashboard/vendors/js/tables/jszip.min.js')}}" type="text/javascript"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let title = "{{__('dashboard.title_swal')}}";
        let text = "{{__('dashboard.text_swal')}}";
        let confirmText = "{{__('dashboard.confirm_text_swal')}}";
        let CancelText = "{{__('dashboard.Cancel_text_swal')}}";
        let deletedTitle = "{{__('dashboard.deleted_title_swal')}}";
        let deletedText = "{{__('dashboard.deleted_text_swal')}}";
        let cancelledTitle = "{{__('dashboard.cancelled_text_swal')}}";
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

    <!-- fileinput -->
    <script src="{{asset('vendor/fileinput/js/fileinput.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/fileinput/themes/fa5/theme.min.js')}}" type="text/javascript"></script>
    @if (config('app.locale') == 'ar')
    <script src="{{asset('vendor/fileinput/js/locales/LANG.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/fileinput/js/locales/ar.js')}}" type="text/javascript"></script>
    @endif
    <script>
        var lang = "{{app()->getLocale()}}";
    $(function() {
            $('#singleImage').fileinput({
                theme: 'fa5',
                language: lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                showUpload:false,
            });
        });
    </script>
