<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin | {{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App css -->
    <link href="{{url('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{url('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style">
    <link href="{{url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" >
    <!-- Datatables css -->
    <link href="{{ url('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="leftside-menu">
        <!-- LOGO -->
        @include('admin.partials.sidebar_logo')
        <!-- End LOGO -->
        <div class="h-100" id="leftside-menu-container" data-simplebar="">
            <!--- Sidemenu -->
            <ul class="side-nav">
                @include('admin.partials.sidebar')
            </ul>
            <!-- End Sidebar -->
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- ========== Left Sidebar End ========== -->

    <div class="content-page">

        <div class="content">
            <!-- Navbar Start -->
            <div class="navbar-custom">
                @include('admin.partials.navbar')

                <button class="button-menu-mobile open-left">
                    <i class="mdi mdi-menu"></i>
                </button>

            </div>
            <!-- end Navbar -->

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- Breadcrumbs-->
                @include('admin.partials.breadcrumbs')
                <!-- End Breadcrumbs-->

                <!-- Start Page Content -->
                <main class="">
                    <!-- ============================================================== -->
                    <!-- Start Page Content here -->
                    <!-- ============================================================== -->
                    <div class="page-holder bg-gray-100">
                        @yield('content')
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Page content -->
                    <!-- ============================================================== -->

                </main>
                <!-- End Page Content -->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        @include('admin.partials.footer')
        <!-- end Footer -->
    </div>

</div>
<!-- END wrapper -->

<!-- App Js -->
<script src="{{ url('assets/js/vendor.min.js') }}"></script>
<script src="{{ url('assets/js/app.min.js') }}"></script>
<!-- Datatables js -->
<script src="{{ url('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
<script src="{{ url('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ url('assets/js/pages/demo.datatable-init.js') }}"></script>
<!-- Toast js -->
<script src="{{ url('assets/js/pages/demo.toastr.js') }}"></script>
<!-- plugin js -->
<script src="{{url('assets/js/vendor/dropzone.min.js')}}"></script>
<!-- init js -->
<script src="{{ url('assets/js/ui/component.fileupload.js') }}"></script>

<!-- Alerts-->
@include('admin.partials.alerts')
</body>
</html>
