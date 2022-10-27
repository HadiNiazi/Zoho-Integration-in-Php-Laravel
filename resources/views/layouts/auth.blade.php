<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>Admin Dashboard</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('assets/admin-assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin-assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin-assets/css/color_skins.css') }}">

<!-- Font cdns -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<!-- Toaster cdn -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@yield('styles')
<!-- jQuery loader -->
<style>
    .js-loading-overlay { background-color: #ffff !important;width: 100%;height: 100%;position: absolute;top: 0;left: 0; }
</style>
<link href="{{ asset('assets/admin-assets/plugins/loader/jquery-loading.css') }}" rel="stylesheet">
</head>
<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('assets/admin-assets/images/loader/page-loader.png') }}" width="48" height="48" alt="Home of winners"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar">
    <div class="col-12">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href=""><img src="{{ asset('assets/admin-assets/images/loader/page-loader.png') }}" width="30" alt="Compass"><span class="m-l-10">Home Of Winners</span></a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
            <li class="hidden-sm-down">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-addon">
                        <i class="zmdi zmdi-search"></i>
                    </span>
                </div>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="javascript:void(0);" class="fullscreen hidden-sm-down" data-provide="fullscreen" data-close="true"><i class="zmdi zmdi-fullscreen"></i></a>
            </li>
            <li><a href="" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a></li>
            {{-- <li class=""><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li> --}}
        </ul>
    </div>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="profile.html"><img src="{{ asset('assets/admin-assets/images/avatars/profile.png') }}" style="border-radius: 50%" alt="User"></a></div>
                    <div class="detail">
                        <h4>{{ Auth::check() ? Auth::user()->name: '' }}</h4>
                        <small>{{ Auth::check() ? Auth::user()->email: '' }}</small>
                    </div>
                </div>
            </li>
            <li class="active open"> <a href=""><i class="zmdi zmdi-home"></i><span> Customers </span></a>
            </li>

                    </ul>
                </div>
            </div>
        </div>

    </div>
</aside>


<!-- Main Content -->
@yield('content')
<!-- Jquery Core Js -->
<script src="{{ asset('assets/admin-assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('assets/admin-assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('assets/admin-assets/plugins/momentjs/moment.js') }}"></script> <!-- Moment Plugin Js -->
<script src="{{ asset('assets/admin-assets/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->
<script src="{{ asset('assets/admin-assets/js/pages/ui/notifications.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="{{ asset('assets/admin-assets/plugins/loader/jquery-loading.js') }}"></script>
@yield('scripts')
<style>
    /* dropdown default behavior */
    .bootstrap-select .btn-round{
    display: none !important;
    }
    .bootstrap-select{
        border: 0px solid white !important;
        padding: 0px !important;
    }
    .select-options{
        font-size: 14px !important;
        padding: 5px;
    }
    /* dropdown default behavior */
</style>
<!-- sweet alerts -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Global cdns -->
<script type="text/javascript">
    @if(Session::has('alert-success'))
    Toastify({ text: "{{ Session::get('alert-success') }}", duration: 3000,
        style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
     }).showToast();
     @endif

    //  @if(Session::has('alert-danger'))
     Toastify({ text: '4232343', duration: 3000,
        style: { background: "linear-gradient(to right, #E31D09, #E14130)" }
     }).showToast();
    // @endif
</script>

</body>
</html>
