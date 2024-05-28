@extends('auth.layouts')
@section('title','register')
@section('content')
{{-- @component('mail:message')

{{-- <p>hello{{$user->name}}</p>
@component('mail-button',['url'=>url('/verify/'.$user->remember_token)])
verify --}}


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
                @if(@session()->has("success"))
                <div class="alert alert-success">
                    {{session()->get("success")}}
                </div>
                @endif

                @if(@session()->has("error"))
                <div class="alert alert-success">
                    {{session()->get("error")}}
                </div>
                @endif
                <div class="card-body p-8 p-sm-6">
                  <p class="card-title text-center mb-5 fw-bold fs-5">Register Here...!!</p>
                  <form  action="{{ route('register.store') }}" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="name" placeholder="myusername" required >
                      @if ($errors->has('name'))
                      <span class="text-danger">
                        {{$errors->first('name')}}</span>

                        @endif
                      <label for="floatingInputUsername">Name</label>
                    </div>

                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" name="email" placeholder="name@example.com" required >
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                      @if($errors->has('email'))
                      <span class="text-danger">
                        {{$errors->first('email')}}</span>
                        @endif
                      <label for="floatingInputEmail">Email address</label>
                    </div>

                    <hr>

                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" name="password" placeholder="Password">
                      <label for="floatingPassword">Password</label>
                    </div>

                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" name="password" placeholder="Confirm Password">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                      <label for="floatingPasswordConfirm">Confirm Password</label>
                    </div>

                    <div class="d-grid mb-2">
                     <input type ="submit" class ="btn btn-info" value="Register">
                    </div>

                    <a class="d-block text-center mt-2 small" href="{{url('login')}}">Have an account? _login</a>

                    <hr class="my-4">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </body>
    <style>
        .card-title {
          color: #7c0080; /* Dark blue color */
        }
      </style>
@endsection

