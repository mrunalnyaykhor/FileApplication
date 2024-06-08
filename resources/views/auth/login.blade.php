@extends('auth.layouts')
@section('title', 'login')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/register.css') }}">
</head>

<body>

            <div class="col-lg-6 col-md-6">
                <div class="card my-5 border-0 shadow rounded-3">
                    <div class="card-body p-4 p-sm-5">
                        <p class="card-title text-center mb-5 fw-bold fs-5">Login Here...!!</p>
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" placeholder="name@example.com"
                                    required autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="floatingInputEmail">Username :</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="floatingPassword">Password :</label>
                            </div>

                            <div class="d-grid mb-2">
                                <input type="submit" class="btn btn-info" value="Login">
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ url('register') }}">if no account? Sign-In</a><br>
                                <a class="small" href="/forget-password">Forget Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

</body>

@endsection
