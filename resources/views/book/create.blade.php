@extends("layouts.master")


@section('title')

Create Book

@endsection


@section('content')

    {{-- @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)

                <li>
                    {{$error}}
                </li>

            @endforeach
        </ul>
    @endif --}}

    <div class=" ms-3 p-3 shadow rounded">
        <h4>Create Book</h4>
        <form action="{{route("book.store")}}" method="post">
            @csrf
            <div>
                <label for="" class=" form-label">book Name</label>
                <input
                type="text"
                name="name"
                class=" form-control @error("name") is-invalid @enderror"
                value="{{old("name")}}">
                @error('name')
                    <div class=" invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="" class=" form-label">book Price</label>
                <input
                type="number"
                name="price"
                class=" form-control @error("price") is-invalid @enderror"
                value="{{old("price")}}">
                @error('price')
                <div class=" invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="" class=" form-label">Book Author</label>
                <input
                type="text"
                name="author"
                class=" form-control @error("author") is-invalid @enderror"
                value="{{old("author")}}">
                @error('author')
                <div class=" invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class=" btn btn-primary mt-3">Create book</button>
        </form>
    </div>

@endsection
