@extends("layouts.master")


@section('title')

New Password page

@endsection


@section('content')

<h3>New Password</h3>

<div>
    <form action="{{route("auth.resetPassword")}}" method="POST">
        @csrf

        <input type="hidden" name="user_token" value="{{$user_token}}">
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
            <button type="submit" class=" btn btn-primary">Save</button>
        </div>
    </form>
</div>

@endsection
