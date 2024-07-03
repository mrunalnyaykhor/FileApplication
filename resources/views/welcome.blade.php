<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'File shared Application')</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">


        <link rel="stylesheet" type="text/css" href="{{ asset('http://127.0.0.1:8000/css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/welcome.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>

    <body>


        <nav class="navbar navbar-expand-sm bg-black navbar-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">FileShareApplication</a>
                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('about') }}">About_Us</a>
                    </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact') }}" title="click on contact us to get contact details">Contact_Us</a>
                    </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('register') }}"><b >SignUp</b></a>
                    </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('login') }}"><b>Login</b></a>
                    </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Select
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ url('register') }}">User Register</a></li>
                            <li><a class="dropdown-item" href="{{ url('login') }}">User Login</a></li>
                            <li><a class="dropdown-item" href="{{ url('admin/login') }}">Admin Login</a></li>
                            <li><a class="dropdown-item" href="{{ url('admin/register') }}">Admin Register</a></li>
                            <li><a class="dropdown-item" href="/">Logout</a></li>
                        </ul>
                    </li>
                </ul>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               </div>
        </nav>
    </body>

<body class="body1">
    <div class="nameplate-wrapper">
        <i><div class="nameplate">Welcome To File Share Web Application</div></i>
    </div>
    <b> <a href="https://laravel.com/docs/11.x">learn Laravel</a><br>
        <a href="https://laravel.com/">Learn Laravel Documentation:</a></b>

    <div>



            <div id="watch" class="position">


                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQGZpHvbZEhFGSR-USZpAJvfmMajFAJ-aktw&s" alt="Watch Image">
            </div>

        <script src="script.js"></script>
    </div>

</body>
</html>
