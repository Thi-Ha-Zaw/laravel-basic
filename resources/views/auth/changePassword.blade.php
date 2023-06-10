@extends("layouts.master")


@section('title')

Change Password page

@endsection


@section('content')

<h3>Change Password</h3>

<div>
    <form action="{{route("auth.savePassword")}}" method="POST">
        @csrf

        <div class=" my-3">
            <label for="" class=" form-label">Current Password</label>
            <input
            type="password"
            name="current_password"
            class=" form-control @error("current_password") is-invalid @enderror"
           >
            @error('current_password')
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
            <label for="" class=" form-label">Confirm Password</label>
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
            <button type="submit" class=" btn btn-primary">Change Now</button>
        </div>
    </form>
</div>

@endsection
