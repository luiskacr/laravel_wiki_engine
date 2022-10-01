@extends('auth.auth_template')

@section('content')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="">
                <div class="text-center">
                    <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="logo" width="72" height="57">
                    <h1 class="h3 mb-3 fw-normal">Welcome</h1>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="text-center">
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" autofocus id="email" value="{{old('email',$request->email)}}" placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password">
                        <label for="password">Password</label>
                    </div>

                </div>
                <div class="">
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('error')}}
                        </div>
                    @endif
                </div>
                <div class="text-center">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Reset Password</button>
                    <br>
                    <a href="{{ route('login') }}">back to the Login</a>
                </div>

    </form>

@endsection
