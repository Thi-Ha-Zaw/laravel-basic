@extends("layouts.master")


@section('title')

Login page

@endsection


@section('content')

<h3>Login</h3>

@if (session('message'))
    <div class=" alert alert-info">{{session('message')}}</div>
@endif

<div>

    <form action="{{route("auth.check")}}" method="POST">
        @csrf
        <div class=" my-3">
            <label for="" class=" form-label">Your Email</label>
            <input
            type="email"
            name="email"
            class=" form-control @error("email") is-invalid @enderror"
            value="{{ old('email') }}">
            @error('email')
                <div class=" invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class=" my-3">
            <label for="" class=" form-label">Password</label>
            <input
            type="password"
            name="password"
            class=" form-control @error("password") is-invalid @enderror"
           >
            @error('password')
                <div class=" invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div>
            <button type="submit" class=" btn btn-primary">Login</button>
            <a href="{{route("auth.forgot")}}">Forgot Password</a>
        </div>
    </form>
</div>

@endsection
