@extends('auth.layouts')
{{-- @section('title', 'register') --}}
@section('content')

    <head>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/register.css') }}">

    </head>

    <body>
        <div class="col-lg-6 col-md-6">


                <div class="col-lg-20 col-xl-20 mx-auto">

                    <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">

                        @if (@session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if (@session()->has('error'))
                            <div class="alert alert-success">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <div class="card-body p-8 p-sm-6">

                                <p class="card-title text-center mb-2 fw-bold fs-2">Register Here...!!</p>
                                <form action="{{ route('register.store') }}" method="POST">
                                    @csrf

                                    <div class="form-floating mb-1">
                                        <input type="text" class="form-control" name="name" placeholder="myusername"
                                            required>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">
                                                {{ $errors->first('name') }}</span>
                                        @endif
                                        <label for="floatingInputUsername">Name</label>
                                    </div>

                                    <div class="form-floating mb-1">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="name@example.com" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @if ($errors->has('email'))
                                            <span class="text-danger">
                                                {{ $errors->first('email') }}</span>
                                        @endif
                                        <label for="floatingInputEmail">Email address</label>
                                    </div>
                                    <div class="form-floating mb-1">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>

                                    <div class="form-floating mb-1">
                                        <input type="password" class="form-control" name="password_confirmation"
                                            placeholder="Confirm Password">
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

                                    <a class="d-block text-center mt-2 small" href="{{ url('login') }}">Have an account?
                                        _login</a>


                                </form>
                        </div>
                </div>
            </div>
        </div>

    </body>
@endsection
