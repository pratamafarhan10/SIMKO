<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>

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

        .crd {
            background-color: #00AAAA !important;
        }

        body {
            background-image: url('/dist/img/hmsibg.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 60%;
            background-attachment: fixed;

        }
    </style>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <img src="/dist/img/hmsi.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light"><b>SIMKO</b></span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item{{ request()->is('/') ? ' active' : '' }}">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item{{ request()->is('kasbiro') ? ' active' : '' }}">
                            <a href="/kasbiro" class="nav-link">Uang Kas Anggota</a>
                        </li>
                        <li class="nav-item{{ request()->is('anggotabiro') ? ' active' : '' }}">
                            <a href="/anggotabiro" class="nav-link">Anggota</a>
                        </li>
                        <li class="nav-item{{ request()->is('pendapatanbiro') ? ' active' : '' }}">
                            <a href="/pendapatanbiro" class="nav-link">Pendapatan Lain</a>
                        </li>
                        <li class="nav-item{{ request()->is('pengeluaranbiro') ? ' active' : '' }}">
                            <a href="/pengeluaranbiro" class="nav-link">Pengeluaran</a>
                        </li>
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown ">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->fullname }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item bg-dark" href="/profilebiro">
                                Profile
                            </a>
                            <a class="dropdown-item bg-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                        @endguest
                    </li>
                </ul>
            </div>
        </nav>

        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        @endif

        <div class="bg">
            @yield('container')

        </div>



        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
        </script>

</body>

</html>