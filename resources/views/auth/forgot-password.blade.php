@extends("layouts.master")


@section('title')

Forgot Password

@endsection


@section('content')

<h3>Your Email</h3>

<div>
    <form action="{{route("auth.checkEmail")}}" method="POST">
        @csrf

        <div class=" my-3">
            <label for="" class=" form-label">Your Email</label>
            <input
            type="email"
            name="email"
            class=" form-control @error("email") is-invalid @enderror"\
            value="{{old("email")}}"
           >
            @error('email')
                <div class=" invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div>
            <button type="submit" class=" btn btn-primary">Verify</button>
        </div>
    </form>
</div>

@endsection
