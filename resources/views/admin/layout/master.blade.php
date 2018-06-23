<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="network marketing">
    <title>Admin</title>
    <link rel="apple-touch-icon" href="{{asset('admin-asset/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-asset/app-assets/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-asset/app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-asset/app-assets/vendors/css/forms/icheck/custom.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-asset/app-assets/css/app.min.css')}}">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-asset/app-assets/css/core/menu/menu-types/horizontal-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-asset/app-assets/css/pages/login-register.min.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-asset/app-assets/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-asset/assets/css/style.css')}}">
    <!-- END Custom CSS-->
</head>

@yield('body')


<!-- BEGIN VENDOR JS-->
<script src="{{asset('admin-asset/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="{{asset('admin-asset/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-asset/app-assets/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('admin-asset/app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-asset/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="{{asset('admin-asset/app-assets/js/core/app-menu.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-asset/app-assets/js/core/app.min.js')}}" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="{{asset('admin-asset/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
<script src="{{asset('admin-asset/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script type="text/javascript" src="{{asset('admin-asset/app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js')}}"></script>
<script src="{{asset('admin-asset/app-assets/js/scripts/forms/form-login-register.min.js')}}" type="text/javascript"></script>

{{--External Plugins--}}
<script src="{{asset('admin-asset/app-assets/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>

@if (\Illuminate\Support\Facades\Session::has('message'))
    <script type="text/javascript">
        toastr.success("{{$error}}","Progress Bar",{progressBar:!0});
    </script>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script type="text/javascript">
            toastr.warning("{{$error}}","Alert",{progressBar:!0});
        </script>
    @endforeach
@endif

<script>
    $(document).ready(function () {
        $(".zero-configuration").DataTable()
    });
</script>

@yield('custom_js')

<!-- END PAGE LEVEL JS-->
</body>

</html>