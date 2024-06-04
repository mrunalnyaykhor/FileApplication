@extends('auth.layouts')
@section('title', 'login')
@section('content')

    <head>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">

    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if (Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a
                                        href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                    </div>
                    <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-img-left d-none d-md-flex">
                        </div>
                        <div class="card-body p-4 p-sm-5">
                            <p class="card-title text-center mb-5 fw-bold fs-5">Reset Password...!!</p>


                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <p style="color:red;">{{ $error }}
                                    </li>
                                @endforeach
                            @endif


                            <form action="{{ route('resetPassword') }}" method="POST">
                                @csrf
                                <input type ="hidden" name="id" value="{{ $user[0]['id'] }}">

                                <input type ="password" name ="password" placeholder="new password">
                                <br><br>
                                <input type= "password" name = "password_confirmation" placeholder ="confirm password">
                                <br><br>

                                <div class="d-grid mb-2">
                                    <input type ="submit" class ="btn btn-info" value="Reset password">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

@endsection



{{-- ll --}}
