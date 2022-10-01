@extends('auth.auth_template')

@section('content')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="text-centered">
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" autofocus id="email" value="{{old('email')}}" placeholder="name@example.com">
                    <label for="email">Email address</label>
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

            </div>

        </div>



    </form>
@endsection
