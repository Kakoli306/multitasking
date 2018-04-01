<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('public/admin')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('public/admin')}}/css/heroic-features.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Multiauth</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guide') }}">User Guide </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->

@yield('content')


        @include('frontEnd.layouts.search')


        @yield('features')

        @yield('message')


    <!-- /.container -->

        <!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">

        <a href="{{route('admin.login')}}"class="col-sm-12 text-center  text-white">Login with Admin</a>
    </div>
    <!-- /.container -->
</footer>

        <!-- Bootstrap core JavaScript -->
        <script src="{{asset('public/admin')}}/vendor/jquery/jquery.min.js"></script>
        <script src="{{asset('public/admin')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </div>
</div>
</body>

</html>
