<!doctype html>
<html lang="en">
  <head>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','File shared Application')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="{{ asset('http://127.0.0.1:8000/css/app.css') }}">

  </head>
  <body>

      <nav class="navbar navbar-expand-sm bg-black navbar-white">
         <div class="container-fluid">
        <!-- Heading name in the left corner -->
        <a class="navbar-brand" href="#">FileShareApplication</a>
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link active" href="{{url('homepage')}}">Homepage</a>
      </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="{{url('about')}}">About_Us</a>
      </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="{{url('contact')}}">Contact_Us</a>
      </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      {{-- <li class="nav-item">
        <a class="nav-link disabled" href="url('')">Disabled</a>
      </li> --}}
    </ul>
    <ul class="nav navbar-nav navbar-right">
        {{-- <li class="nav-item">
            <a class="nav-link active" href="{{url('register')}}">SignUp</a>
          </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <li class="nav-item">
            <a class="nav-link active" href="{{url('login')}}">Login</a>
          </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}

          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              Profile
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Reset Password</a></li>
              <li><a class="dropdown-item" href="#">Editprofile</a></li>
              <li><a class="dropdown-item" href="{{url('/')}}">Logout</a></li>
            </ul>
          </div>
    </ul>
    </div>
  </nav>
  </body>
  <style>
  .navbar.navbar-white .nav-link {
    color: white;
  }
  .navbar-brand {
    color: white !important; /* Set the text color to white */
  }
  </style>

  <body>
@yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>

    <body>
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
              <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                <div class="card-img-left d-none d-md-flex">
                </div>
                <div class="card-body p-4 p-sm-5">
                    {{-- <h1 class="title">Upload file</h1> --}}
                    @if ($errors->any())
                    <div class="notification is-danger is-light">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">upload File</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple>
                            {{-- <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color"> --}}
                          </div>
                        {{-- <input type="file" name="file_upload"> --}}
                        <button type="submit">Upload</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </body>
    <div>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Table with Actions</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .action-btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-15">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">FileName</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Otto</td>

                    <td>
                        <a href="download.php?file=@mdo" class="btn btn-primary action-btn">Download</a>
                        <button class="btn btn-danger action-btn" onclick="deleteFile('@mdo')">Delete</button>
                    </td>
                </tr>
                <!-- Additional rows can be added here -->
            </tbody>
        </table>
    </div>

    <script>
        function deleteFile(filePath) {
            if (confirm("Are you sure you want to delete this file?")) {
                // Perform the delete operation (AJAX call or form submission)
                console.log("File deleted:", filePath);
                // Example AJAX request (uncomment and modify according to your backend logic)
                /*
                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: { file: filePath },
                    success: function(response) {
                        alert('File deleted successfully');
                        // Optionally, remove the row from the table
                        // $(this).closest('tr').remove();
                    },
                    error: function(err) {
                        alert('Error deleting file');
                    }
                });
                */
            }
        }
    </script>
</body>
</html>

    </div>
</html>
{{-- @endsection --}}


