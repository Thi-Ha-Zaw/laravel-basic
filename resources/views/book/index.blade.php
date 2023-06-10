@extends("layouts.master")


@section('title')

Book List

@endsection


@section('content')

@if (session("status"))

<div class=" alert alert-success">
    {{session("status")}}
</div>

@endif

<table class=" table table-bordered">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Author</th>
        <th>Control</th>
    </thead>
    <tbody>
        @forelse ($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->name}}</td>
                <td>{{$book->price}}</td>
                <td>{{$book->stock}}</td>
                <td>
                    <a href="{{route("book.show",$book->id)}}" class=" btn btn-sm btn-outline-primary">Detail</a>
                    <form class=" d-inline-block" action="{{route("book.destroy",$book->id)}}" method="post">
                        @method("delete")
                        @csrf
                        <button type="submit" class=" btn btn-sm btn-outline-danger">Del</button>
                    </form>
                    <a href="{{route("book.edit",$book->id)}}" class=" btn btn-sm btn-outline-info">Edit</a>
                </td>
            </tr>
        @empty
            <tr class=" text-center">
                <td colspan="5">
                    <h5>There is no records</h5>
                    <a href="{{route("book.create")}}" class=" btn btn-sm btn-primary">Create book</a>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

{{$books->onEachSide(1)->links()}}

@endsection
