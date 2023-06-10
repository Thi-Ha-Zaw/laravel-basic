@extends("layouts.master")


@section('title')

Update Item

@endsection


@section('content')

    <div class=" ms-3 p-3 shadow rounded">
        <h4>Update Item</h4>
        <form action="{{route("item.update",$item->id)}}" method="post">
            @method("put")
            @csrf
            <div>
                <label for="" class=" form-label">Item Name</label>
                <input type="text" name="name" value="{{old("name",$item->name)}}" class=" form-control @error("name") is-invalid @enderror">
                @error('name')
                    <div class=" invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="" class=" form-label">Item Price</label>
                <input type="number" name="price" value="{{old("price",$item->price)}}" class=" form-control @error("price") is-invalid @enderror">
                @error('price')
                    <div class=" invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="" class=" form-label">Item Stock</label>
                <input type="number" name="stock" value="{{old("stock",$item->stock)}}" class=" form-control @error("stock") is-invalid @enderror">
                @error('stock')
                    <div class=" invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class=" btn btn-primary mt-3">Update Item</button>
        </form>
    </div>

@endsection
