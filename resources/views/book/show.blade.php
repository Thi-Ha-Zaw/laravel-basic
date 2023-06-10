@extends("layouts.master")


@section('title')

detail page

@endsection


@section('content')

<h4 class=" my-3">Book details</h4>
<table class=" table">
    <tr>
        <td>id</td>
        <td>{{$book->id}}</td>
    </tr>
    <tr>
        <td>Name</td>
        <td>{{$book->name}}</td>
    </tr>
    <tr>
        <td>Price</td>
        <td>{{$book->price}}</td>
    </tr>
    <tr>
        <td>Author</td>
        <td>{{$book->author}}</td>
    </tr>
    <tr>
        <td>created_at</td>
        <td>{{$book->created_at}}</td>
    </tr>
    <tr>
        <td>updated_at</td>
        <td>{{$book->updated_at}}</td>
    </tr>
</table>

@endsection
