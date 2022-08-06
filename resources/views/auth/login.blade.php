<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | SIMKO</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: "roboto" !important;

            src: url('/dist/font/Roboto-Black.ttf') format(truetype);
            color: white !important;

            /* background-image: url('/dist/img/Backgroun.png') !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            background-size: 100% !important;
            background-attachment: fixed !important; */
            background: linear-gradient(110deg, #312c51 60%, #48426d 60%);
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


        /* body {
            background-image: url('/dist/img/hmsibg.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 60%;
            background-attachment: fixed;

        } */
    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="container" style="margin-top: 60px;">

        <div class="card mb-3 mx-auto my-auto" style="max-width: 900px; height:500px; background-color: #273746 !important;">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" style="height: 500px; background-color:#273746;">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/dist/img/ig.png" class="d-block w-100" alt="carousel" style="height: 500px;">
                            </div>
                            <div class="carousel-item">
                                <img src="/dist/img/ig2.png" class="d-block w-100" alt="carousel" style="height: 500px;">
                            </div>
                            <div class="carousel-item">
                                <img src="/dist/img/ig3.png" class="d-block w-100" alt="carousel" style="height: 500px;">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="card-body" style="margin-top:-30px;">
                        <div class="row">
                            <img src="/dist/img/hmsi.png" alt="AdminLTE Logo" style="height: 75px; width:75px;" class="mx-auto">
                        </div>
                        <div class="row">
                            <h3 class="mx-auto">SIMKO</h3>
                        </div>
                        <div class="row">
                            <form action="{{ route('login') }}" method="POST" class="mt-2 mx-auto" style="width: 450px;">
                                @csrf
                                <div class="input-group mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row-15">

                                    <!-- /.col -->
                                    <div class="col-15">
                                        <button type="submit" class="btn btn-info btn-block ">Login</button>
                                    </div>
                                    <!-- /.col -->

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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