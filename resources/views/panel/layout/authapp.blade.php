<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Panal Giriş</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('panel') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('panel') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('panel') }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('panel') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('panel') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel') }}/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('panel') }}/css/vertical-layout-light/style.css">
    <link href="{{ asset('panel') }}/css/bootstrap-toggle.min.css" rel="stylesheet">
    {{--        <link rel="stylesheet" href="{{ asset('panel') }}/css/bootstrap.min.css"/>--}}
    <link rel="stylesheet" href="{{ asset('panel') }}/css/alertify.min.css"/>
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('panel') }}/images/favicon.png"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('customcss')
</head>
<body>
<div class="container-scroller">
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->


        <!-- partial -->
        <div class="main-panel">

            @yield('content')
            <!-- content-wrapper ends -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset('panel') }}/js/jquery.min.js"></script>
<script src="{{ asset('panel') }}/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('panel') }}/vendors/chart.js/Chart.min.js"></script>
<script src="{{ asset('panel') }}/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{ asset('panel') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="{{ asset('panel') }}/js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('panel') }}/js/off-canvas.js"></script>
<script src="{{ asset('panel') }}/js/hoverable-collapse.js"></script>
<script src="{{ asset('panel') }}/js/template.js"></script>
<script src="{{ asset('panel') }}/js/settings.js"></script>
<script src="{{ asset('panel') }}/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('panel') }}/js/dashboard.js"></script>
<script src="{{ asset('panel') }}/js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->

<!-- Custom js for this page-->
<script src="{{ asset('panel') }}/js/file-upload.js"></script>
<script src="{{ asset('panel') }}/js/bootstrap-toggle.min.js"></script>
<script src="{{ asset('panel') }}/js/alertify.min.js"></script>
@yield('customjs')
<!-- End custom js for this page-->
</body>

</html>

