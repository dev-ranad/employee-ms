<!DOCTYPE html>
<html lang="en">

<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Employee Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('src/public/admin/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('src/public/admin/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('src/public/admin/css/custom.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('src/public/admin/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('src/public/admin/bundles/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('src/public/admin/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/public/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/public/admin/bundles/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('src/public/admin/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/public/admin/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('src/public/admin/bundles/dropzonejs/dropzone.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('src/public/admin/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('src/public/admin/img/favicon.ico') }}" />

    @stack('style')
    {{-- @notifyCss --}}
    <link rel="stylesheet" href="{{ asset('src/vendor/mckenziearts/laravel-notify/public/css/notify.css') }}">
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('employee_module.panel_lib.includes.topbar')
            @include('employee_module.panel_lib.includes.sidebar')
            @yield('content')
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
    {{-- <script src="{{ asset('src/public/admin/js/page/geodata.js') }}"></script> --}}
    <!-- General JS Scripts -->
    <script src="{{ asset('src/public/admin/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
  <script src="{{ asset('src/public/admin/bundles/dropzonejs/min/dropzone.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('src/public/admin/js/page/multiple-upload.js') }}"></script>
    <!-- Page Specific JS File -->
    <!-- Table JS File -->
    <script src="{{ asset('src/public/admin/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/datatables/export-tables/jszip.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/js/page/datatables.js') }}"></script>
    <!-- Input JS File -->
    <script src="{{ asset('src/public/admin/bundles/cleave-js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/cleave-js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('src/public/admin/js/page/forms-advanced-forms.js') }}"></script>

    <script src="{{ asset('src/public/admin/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('src/public/admin/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('src/public/admin/js/custom.js') }}"></script>

    <script src="{{ asset('src/vendor/mckenziearts/laravel-notify/public/js/notify.js') }}"></script>

  @include('notify::components.notify')
    @stack('script')
    {{-- @notifyJs --}}
    {{-- <x:notify-messages /> --}}
</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

</html>
