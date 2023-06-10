@extends("layouts.master")


@section('title')

Create Item

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
        <h4>Create Item</h4>
        <form action="{{route("item.store")}}" method="post">
            @csrf
            <div>
                <label for="" class=" form-label">Item Name</label>
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
                <label for="" class=" form-label">Item Price</label>
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
                <label for="" class=" form-label">Item Stock</label>
                <input
                type="number"
                name="stock"
                class=" form-control @error("stock") is-invalid @enderror"
                value="{{old("stock")}}">
                @error('stock')
                <div class=" invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class=" btn btn-primary mt-3">Create Item</button>
        </form>
    </div>

@endsection
