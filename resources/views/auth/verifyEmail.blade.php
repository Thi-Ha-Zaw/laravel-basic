@extends("layouts.master")


@section('title')

Verify Email

@endsection


@section('content')

<h3>Verify Email</h3>

<div>
    <form action="{{route("auth.saveVerifyEmail")}}" method="POST">
        @csrf

        <div class=" my-3">
            <label for="" class=" form-label">Verify Code</label>
            <input
            type="number"
            name="verify_code"
            class=" form-control @error("verify_code") is-invalid @enderror"
           >
            @error('verify_code')
                <div class=" invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div>
            <button type="submit" class=" btn btn-primary">Verify</button>
        </div>
    </form>
</div>

@endsection
