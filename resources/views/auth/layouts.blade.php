<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'File shared Application')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('http://127.0.0.1:8000/css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-black navbar-white">
        <div class="container-fluid">
            <!-- Heading name in the left corner -->
            <a class="navbar-brand" href="{{ url('register') }}">FileShareApplication</a>
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('homepage') }}">Homepage</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('about') }}">About_Us</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact') }}">Contact_Us</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('register') }}">SignUp</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('login') }}">Login</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">LogOut</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </ul>
        </div>
    </nav>
</body>
<style>
    .navbar.navbar-white .nav-link {
        color: white;
    }

    .navbar-brand {
        color: white !important;
        /* Set the text color to white */
    }
</style>

<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
