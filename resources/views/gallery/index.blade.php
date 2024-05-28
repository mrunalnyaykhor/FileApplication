<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'File shared Application')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .gallery-img {
            width: 100%;
            height: auto;
        }

        .card {
            margin: 10px 0;
        }

        .navbar.navbar-white .nav-link {
            color: white;
        }

        .navbar-brand {
            color: white !important;
            /* Set the text color to white */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-black navbar-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">FileShareApplication</a>
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
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false"> Profile
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Reset Password</a></li>
                        <li><a class="dropdown-item" href="#">Editprofile</a></li>
                        <li><a class="dropdown-item" href="{{ url('/') }}">Logout</a></li>
                    </ul>
                </div>
            </ul>
        </div>
    </nav>
</body>


<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

</body>

</html>


<body>
    <div class="container mt-5">
        <h4>
            Gallery List
             <a href="{{ url('gallery/upload') }}" class="btn btn-primary float-end">Upload Images</a>
        </h4>


        {{$gallery}}
        <div class="card-body">
            <div class="row">
                @foreach ($gallery as $galImg)
                    <div class="col-md-2">
                        <div class="card border shadow p-2">
                            <img src="{{ asset($galImg->image) }}" class="gallery-img" alt="Img" />
                            {{-- <a href="{{ url('gallery/delete') }}" class="btn btn-danger mt-2">Delete</a> --}}
                          </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</body>

</html>
