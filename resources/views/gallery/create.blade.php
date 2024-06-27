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
                    <a class="nav-link" href="{{ url('contact') }}" title="click on contact us to get contact details">Contact_Us</a>
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
    {{-- <div id = "exampleCircle"> --}}
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-18">
                    <div class="card mb-8">
                        <div class="card-header11">
                            <a id = "exampleCircle" class="btn btn-primary float-end" href="/login"
                            title="click on Home  to Exit"><br><b>Home<b></a>
                            <a id = "exampleCircle" href="/homepage" class="btn btn-success float center"
                            title="click on Gallery  to view Files details and files Metadata"><br><b> Gallery<b></a>
                                <div class="nameplate-wrapper">
                                    <div class="nameplate">
                                        <i><b>Hello ,<q>{{ $gallery->first()->owner }}</q>&nbsp;if you want to upload files, please Drag and Drop Multiple files below section.</b></i>
                                    </div>
                                </div>
                         <div class="card-body">
                                 <i><b> <form action="{{ url('gallery/upload') }}" method="POST" enctype="multipart/form-data"
                                class="dropzone" id="myDragAndDropUploader">
                                @csrf
                            </form></b></i>
                            <h4 id="fileNames" class="file-name"></h4>
                            <h5 id="message"></h5>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                {{ $gallery->links() }} <!-- This will render the pagination links in the center -->
            </div>

</body>
<audio controls autoplay >
    <source src="https://nzt6ku-a.akamaihd.net/downloads/ringtones/files/mp3/loveo2o-0714d7fc4852681-0-1-62372.mp3" type="audio/mp3">
    </audio>
{{-- <iframe width="362" height="315"
src="https://www.youtube.com/embed/tgbNymZ7vqY" >
</iframe>&nbsp;
<iframe width="362" height="315"
src="https://www.youtube.com/embed/tgbNymZ7vqY" >
</iframe>&nbsp;
<iframe width="362" height="315"
src="https://www.youtube.com/embed/tgbNymZ7vqY">
</iframe> --}}

</html>
