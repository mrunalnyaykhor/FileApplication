@extends('auth.layouts')
@section('title', 'login')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/register.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="col-lg-6 col-md-6">
        <div class="card my-5 border-0 shadow rounded-3">
            <div class="card-body p-4 p-sm-5">
                <p class="card-title text-center mb-5 fw-bold fs-5">Login Here...!!</p>
                @if (session('alert-success'))
                <p> <div style="color: hsl(119, 91%, 48%);" >
                     {{ session('alert-success') }}
                 </div>
                </p>
             @endif

             @if($errors->any())
        <div class="alert alert-danger" style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            placeholder="name@example.com"
                            @if(isset($_COOKIE["email"]))
                                value="{{ $_COOKIE['email'] }}"
                            @endif
                            required
                            autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="floatingInputEmail">Username :</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            placeholder="Password"
                            @if(isset($_COOKIE["password"]))
                                value="{{ $_COOKIE['password'] }}"
                            @endif
                            required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="floatingPassword">Password :</label>
                    </div>

                    <div class="form-check mb-3">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="remember"
                            id="remember"
                            @if(isset($_COOKIE["email"]) && isset($_COOKIE["password"]))
                                checked
                            @endif>
                        <label class="form-check-label" for="remember">
                            <b>Remember Me</b>
                        </label>
                    </div>

                    <div class="d-grid mb-2">
                        <input type="submit" class="btn btn-info" value="Login">

                    </div>

                    <div class="text-center" >
                       <i> <a class="small" href="{{ url('register') }}"><b>If no account? Sign-In<b></a></i><br>
                       <i > <a class="small" href="/forget-password"><b>Forget Password</b></a></i>

                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('success'))
                alert('{{ session('success') }}');
            @endif

            @if (session('error'))
                alert('{{ session('error') }}');
            @endif
        });
    </script>

</body>



@endsection
