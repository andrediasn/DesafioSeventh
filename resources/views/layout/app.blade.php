<!DOCTYPE html>
    <?php $user = Auth::user(); ?>
    <html lang="{{ config('app.locale') }}" class="loading loaded  {{ (Auth::user()->theme == 'd' ? 'dark-layout' : 'light-layout' ) }}">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sistema EAD">
    <meta name="keywords" content="Sistema EAD">
    <meta name="author" content="MoovEAD">
    <link rel="apple-touch-icon" href="{{ url('/storage/images/ico.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/storage/images/ico.png') }}">
    <link rel="icon" type="image/png" href="{{ url('/storage/images/ico.png') }}">
    <title>{{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/font-awesome/css/font-awesome.min.css') }}">

    @yield('vendor')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">

    @yield('styles')

    {{-- BEGIN: Custom CSS  --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}"> --}}
    {{-- END: Custom CSS --}}

</head>

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    @yield('menu')

    <!-- BEGIN: Content-->
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        {{-- Mensagem padrão de Erro --}}
        @if ($errors->any())
            <div class="content-wrapper container-xxl p-0">
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Atenção</h4>
                    <div class="alert-body">
                        <ul style="list-style-type:none;margin-bottom: 0px;">
                            @foreach ($errors->all() as $error)
                                <li style="font-size: 12px;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        {{-- Mensagem personalizada --}}
        @if(session()->has('message'))
            <div class="content-wrapper container-xxl p-0">
                <div class="@if(session()->get('message')->error){{'alert alert-success'}}@else{{'alert alert-warning'}}@endif" role="alert">
                    <h4 class="alert-heading">{{ session()->get('message')->title }}</h4>
                    <div class="alert-body">
                        <ul style="list-style-type:none;margin-bottom: 0px;">
                            {{session()->get('message')->message}}
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        {{-- Conteúdo --}}
        @yield('content')

    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @yield('footer')

    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>

    {{-- BEGIN: Page Vendor JS --}}
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
    {{-- END: Page Vendor JS --}}

    {{-- BEGIN Vendor JS --}}
    @yield('scripts_vendor')
    {{-- END: Theme JS --}}

    {{-- BEGIN: Theme JS --}}
    <script src="{{ asset('app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/customizer.min.js') }}"></script>
    {{-- END: Theme JS --}}

    {{-- Jquery --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/extensions/ext-component-toastr.js') }}"></script>
    <script src="{{ asset('js/helpers.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-validation.js') }}"></script>
    <!-- END: Page JS-->

    <script src="{{ asset('js/script.js') }}"></script>

    {{-- include default scripts --}}
    @yield('scripts')

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <input type="hidden" id="aux-url" value="{{ url('/') }}">
</body>

</html>
