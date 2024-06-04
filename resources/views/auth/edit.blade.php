 @extends('auth.layouts')
 @section('title', 'register')
 @section('content')

     <head>
         <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">

     </head>

     <body>
         <div class="container">
             <div class="row">
                 <div class="col-lg-10 col-xl-9 mx-auto">
                     @if (session('alert-success'))
                        <h1> <div style="color: #f9f5f8;" >
                             {{ session('alert-success') }}
                         </div>
                        </h1>

                     @endif

                     @if ($errors->any())
                         <div style="color: red;">
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                     @endif
                     <p class="card-title text-center mb-5 fw-bold fs-5">Edit your Profile here...!!</p>
                     <hr class="my-4">
                     <form action="{{ route('edit.updateName', $user->id) }}" method="POST">
                         @csrf

                         <div class="city">
                             <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                 value="{{ old('name', $user->name) }}" required>
                             @if ($errors->has('name'))
                                 <span class="text-danger">
                                     {{ $errors->first('name') }}</span>

                             @endif

                         </div><br>

                         <hr>
                         <div class="d-grid mb-10">
                             <input type ="submit" class="btn btn-info btn-black-white" value="Edit">
                         </div>
                         <hr class="my-4">
                         <a class="btn btn-info btn-black-white" href="{{ url('login') }}">Back</a>


                     </form>

                 </div>
             </div>
         </div>
         </div>
     </body>
     <style>
         .card-title {
             color: #7c0080;
             /* Dark blue color */
         }
         .btn-black-white {
    background-color: black;
    color: white;
    border: none; /* Optional: Remove default borders if any */
}

.btn-black-white:hover {
    background-color: darkgray; /* Optional: Change background color on hover */
}
     </style>
 @endsection
