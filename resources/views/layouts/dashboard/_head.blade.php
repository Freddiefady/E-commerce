<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="apple-touch-icon" href="{{asset('assets/dashboard')}}/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset($settings->favicon)}}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/fonts/meteocons/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/vendors/css/charts/chartist-plugin-tooltip.css">
    <!-- END VENDOR CSS-->
    @if (config('app.locale') == 'ar')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/css-rtl/vendors.css">
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/css-rtl/app.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/css-rtl/custom-rtl.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/dashboard')}}/css-rtl/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/dashboard')}}/css-rtl/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/css-rtl/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/css-rtl/pages/timeline.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/css-rtl/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/style-rtl.css">
    <!-- END Custom CSS-->
    @else

    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/css/vendors.css">
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/css/app.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/css/custom.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/dashboard')}}/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/dashboard')}}/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/css/pages/timeline.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/css/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard')}}/style.css">
    <!-- END Custom CSS-->
    @endif
    <!-- DataTables CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.2.1/css/buttons.bootstrap5.min.css">
    <!-- responsive CDN -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.min.css">
    <!-- colReorder AND RowRecorder CDN -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/colreorder/2.0.4/css/colReorder.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.bootstrap5.min.css">
    <!-- fixedHeader CDN -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/fixedheader/4.0.1/css/fixedHeader.bootstrap5.min.css">
    <!-- Scroller CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.4.3/css/scroller.bootstrap5.min.css">
    <!-- Select CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/3.0.0/css/select.bootstrap5.min.css">
<<<<<<< HEAD
    <!-- Fileinput -->
    <link rel="stylesheet" href="{{asset('vendor/fileinput/css/fileinput.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous">
=======
>>>>>>> main
