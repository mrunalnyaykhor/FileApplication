@extends('auth.layouts')
@section('title', 'login')
@section('content')

    <head>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/register.css') }}">
    </head>
    <body>
        <div class="col-lg-6 col-md-6">
            <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
               <div class="card-body p-8 p-sm-6">
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
                               <div class="d-grid mb-8">
                                <input type ="password" name ="password" placeholder="new password">
                              </div>
                                <br><br>
                                <div class="d-grid mb-8">
                                <input type= "password" name = "password_confirmation" placeholder ="confirm password">
                            </div>
                                <br>
                                <div class="d-grid mb-8">
                                    <input type ="submit" class ="btn btn-info" value="Reset password">
                                </div>


                            </form>
            </div>
        </div>
    </div>


    </body>

@endsection



{{-- ll --}}
