@extends('auth.layouts')

@section('content')
<head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('/css/admin.css') }}">
</head>

<body>

        <div class="row justify-content-left">
            <div class="col-lg-6 col-md-6">
                <div class="card  my-3 border-1  ">
                    <div class="card-body p-8 p-sm-6">


                        @if (session('alert-success'))
                            <div style="color: hsl(119, 91%, 48%);">
                                {{ session('alert-success') }}
                            </div>
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

                        <form action="{{ route('admin.store') }}" method="POST">
                            @csrf

                            <div class="formbody">
                                <p><b>  Admin Registration form...!!</b></p>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="firstName" id="firstName" class="form-control form-control-lg" />
                                        <label class="form-label" for="firstName">Your Firstname</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="lastName" id="lastName" class="form-control form-control-lg" />
                                        <label class="form-label" for="lastName"> Lastname</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <input type="text" name="username" id="username" class="form-control form-control-lg" />
                                    <label class="form-label" for="username">Username</label>
                                </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="mobile" id="mobile" class="form-control form-control-lg" />
                                        <label class="form-label" for="mobile"> MobileNumber</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <input type="email" name="email" id="email" class="form-control form-control-lg" />
                                    <label class="form-label" for="email"> Email</label>
                                </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                    <label class="form-label" for="password"> Password</label>
                                </div>

                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="address">Address</label>
                                <div class="form-outline">
                                    <input type="text" name="address" id="address" class="form-control form-control-lg" />

                                </div>
                            </div>

                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                            </div>

                            <b class="text-center text-muted mt-10 mb-10  gradient-custom-4 text-body">Have already an account? <a href="{{ url('admin/login') }}" class="fw-bold text-body"><u>Login here</u></a></b>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
@endsection
