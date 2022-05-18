<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Develop Now Test</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}">

    <!-- page css -->
    
    <!-- Core css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    {{-- for third party scripts --}}
    @yield('third_party_stylesheets')

    {{-- for child page --}}
    @stack('page_css')

</head>

<body>
    <div class="app">
        <div class="layout">
            {{-- header --}}
            @include('backend.layouts.partials.header')

            {{-- sidebar --}}
            @include('backend.layouts.partials.side_nav')

            <!-- Page Container START -->
            <div class="page-container">
                <div class="main-content">
                                    {{-- flash message --}}

                    @include('backend.layouts.partials.flash_message')

                    @yield('content')
                </div>
                {{-- footer --}}
                @include('backend.layouts.partials.footer')
            </div>
            {{-- quick view --}}
            @include('backend.layouts.partials.quick_view')
        </div>
    </div>

    @include('backend.layouts.partials.script')

    @yield('third_party_scripts')

    @stack('page_scripts')
</body>

</html>
