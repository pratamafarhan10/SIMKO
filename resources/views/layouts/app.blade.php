<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>
        body {
            background-color: #222831 !important;
            font-family: "roboto" !important;

            src: url('/dist/font/Roboto-Black.ttf') format(truetype);
            color: white !important;
        }

        .navbar {
            border: none !important;
        }

        .bgwhite {
            color: black !important;
        }

        nav {
            background-color: #393e46 !important;
        }

        a {
            color: white !important;
        }

        body {
            background-image: url('/dist/img/hmsibg.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 60%;
            background-attachment: fixed;

        }

    </style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIMKO</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <img src="/dist/img/hmsi.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;height:40px;width:40px">
                    <span class="brand-text font-weight-light"><b>SIMKO</b></span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>


                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>