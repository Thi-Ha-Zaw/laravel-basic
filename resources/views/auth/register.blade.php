@extends("layouts.master")


@section('title')

Register page

@endsection


@section('content')

<h3>Register</h3>

<div>
    <form action="{{route("auth.store")}}" method="POST">
        @csrf
        <div class=" my-3">
            <label for="" class=" form-label">Your Name</label>
            <input
            type="text"
            name="name"
            class=" form-control @error("name") is-invalid @enderror"
            value="{{old("name")}}">
            @error('name')
                <div class=" invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class=" my-3">
            <label for="" class=" form-label">Your Email</label>
            <input
            type="email"
            name="email"
            class=" form-control @error("email") is-invalid @enderror"
            value="{{old("email")}}">
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
        <div class=" my-3">
            <label for="" class=" form-label">Confrim Password</label>
            <input
            type="password"
            name="password_confirmation"
            class=" form-control @error("password_confirmation") is-invalid @enderror"
            >
            @error('password_confirmation')
                <div class=" invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div>
            <button type="submit" class=" btn btn-primary">Register</button>
        </div>
    </form>
</div>

@endsection
