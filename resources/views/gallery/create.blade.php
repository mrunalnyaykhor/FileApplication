<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'File shared Application')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('http://127.0.0.1:8000/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/create.css') }}">
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
                        <li><a class="dropdown-item" href="{{ url('forget-password') }}">Reset Password</a></li>
                        <li><a class="dropdown-item" href="{{ url('edit') }}">Editprofile</a></li>
                        <li><a class="dropdown-item" href="/login">Logout</a></li>
                    </ul>
                </div>
            </ul>
        </div>
    </nav>
</body>

<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/create.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-18">
                <div class="card mb-8">
                    <div class="card-header11">
                        <a class="btn btn-primary float-end" href="/login">Home</a>
                        <a href="/homepage" class="btn btn-success float center">View Galary</a>

                     <div class="card-body">

                        <label>Drag and Drop Multiple files</label>
                        <form action="{{ url('gallery/upload') }}" method="POST" enctype="multipart/form-data"
                            class="dropzone" id="myDragAndDropUploader">
                            @csrf
                        </form>
                        <h4 id="fileNames" class="file-name"></h4>
                        <h5 id="message"></h5>
                    </div>
                </div>
                </div>
            </div>
        </div>

</body>


</html>
