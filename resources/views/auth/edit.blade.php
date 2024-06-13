 @extends('auth.layouts')
 @section('title', 'register')
 @section('content')

     <head>
         <link rel="stylesheet" type="text/css" href="{{ url('/css/edit.css') }}">
     </head>
     <body>
        <br>
        <div class="col-lg-6 col-md-6">
            <div class="card my-50 border-0 shadow rounded-30">
              <div class="container">
                     @if (session('alert-success'))
                        <h1> <div style="color: #12acaa;" >
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
                     <p class="card-title text-center mb-2 fw-bold fs-2">Edit your Profile here...!!</p>
                     <hr class="my-2">
                     <form action="{{ route('edit.updateName', $user->id) }}" method="POST">
                         @csrf
                           <div  class="city ">
                                <div class="col">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Name" value="{{ old('name', $user->name) }}" required>
                                    @if ($errors->has('name'))
                                      <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                      </div>
                                    @endif
                                </div>
                         </div><br>
                         <hr>
                         <div  class="city3 ">
                            <input type="submit" class="form-control"
                                value="Edit">
                        </div>
                         <hr class="center1">
                        <a class="btn btn-info btn-black-white " href="{{ url('login') }}">Back</a>
                     </form>
             </div>
         </div>
    </div>
    </div>
     </body>


 @endsection


