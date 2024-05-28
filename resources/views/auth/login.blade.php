@extends('auth.layouts')
@section('title','login')
@section('content')
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title> --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">

</head>
    <body>
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div>
              <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                <div class="card-img-left d-none d-md-flex">
                </div>
                <div class="card-body p-4 p-sm-5">
                    <p class="card-title text-center mb-5 fw-bold fs-5">Login Here...!!</p>
                  <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" name="email" placeholder="name@example.com" required autofocus>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                      @if($errors->has('email'))
                      <span class="text-danger">
                        {{$errors->first('email')}}</span>
                        @endif
                      <label for="floatingInputEmail">Username :</label>
                    </div>

                    <hr>

                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" name="password" placeholder="Password" required>
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                      @if ($errors->has('password'))
                      <span class="text-danger">
                        {{$errors->first('password')}}</span>
                        @endif
                      <label for="floatingPassword">Password :</label>

                    </div>
                    <div class="d-grid mb-2">
                     <input type ="submit" class ="btn btn-info" value="Login">
                    </div>
                    {{-- <a class="nav-link active" href="{{url('register')}}">SignUp</a> --}}
                    <a class="d-block text-center mt-2 small " text-align="center" href="{{url('register')}}" id="sign-in-link">if no account? Sign-In</a>
                    <hr class="my-4">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </body>

@endsection

