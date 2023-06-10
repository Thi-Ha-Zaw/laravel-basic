@extends("layouts.master")


@section('title')

Edit Category

@endsection


@section('content')

    <div class=" ms-3 p-3 shadow rounded">
        <h4>Edit Category</h4>
        <form action="{{route("category.update",$category->id)}}" method="post">
            @method("put")
            @csrf
            <div class=" my-3">
                <label for="" class=" form-label">Category Title</label>
                <input type="text" name="title" value="{{old("title",$category->title)}}" class=" form-control @error("title") is-invalid @enderror">
                @error('title')
                    <div class=" invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="" class=" form-label">Category Description</label>
                <textarea name="description" rows="5" class=" form-control @error("description") is-invalid @enderror">{{old("description",$category->description)}}</textarea>
                @error('description')
                    <div class=" invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class=" btn btn-primary mt-3">Edit Category</button>
        </form>
    </div>

@endsection
