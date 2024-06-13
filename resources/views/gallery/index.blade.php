<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'File shared Application')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/index.css') }}">


</head>

<body class="indexbladebody">
    <nav class="navbar navbar-expand-sm bg-black navbar-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">FileShareApplication</a>
            <ul class="navbar-nav mx-auto">
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('about') }}">About_Us</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact') }}">Contact_Us</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('gallery/upload') }}" class="btn btn-primary float-end">Upload file</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false"> Profile
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{url('forget-password')}}">Reset Password</a></li>
                        <li><a class="dropdown-item" href="{{ url('edit') }}">Editprofile</a></li>
                        <li><a class="dropdown-item" href="/login">Logout</a></li>
                    </ul>
                </div>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h4>File List</h4>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="city1">
                        <tr>
                            <th>Index</th>
                            <th>File Name</th>
                            <th>File Download</th>
                            <th>File Share</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallery as $galImg)
                            <tr>
                                <td>{{ $galImg->id }}</td> <!-- Assuming 'id' is the serial number -->
                                <td>{{ $galImg->fileName }}</td>
                                <td><a href="{{ asset('uploads/gallery/' . $galImg->fileName) }}" download>Download</a></td>
                                <td>
                                    <button type="button" class="btn btn-primary share-btn" data-file-url="{{ asset('uploads/gallery/' . $galImg->fileName) }}">Share</button>
                                </td>
                                <td>
                                    <form action="{{ route('gallery.delete', $galImg->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.share-btn').click(function() {
                var fileUrl = $(this).data('file-url');
                var email = ''; // Enter recipient's email address here
                var subject = 'Sharing a file with you';
                var body = `Hi,\n\nI wanted to share this file with you: ${fileUrl}\n\nYou can download the file by clicking the link below:\n${fileUrl}\n\nBest regards,\n[Mrunal \n Php Developer]`;
                var mailtoLink = `mailto:${email}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
                window.location.href = mailtoLink;
            });
        });
    </script>
</body>
</html>
