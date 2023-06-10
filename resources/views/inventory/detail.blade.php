@extends("layouts.master")


@section('title')

detail page

@endsection


@section('content')

<h4 class=" my-3">Item details</h4>
<table class=" table">
    <tr>
        <td>id</td>
        <td>{{$item->id}}</td>
    </tr>
    <tr>
        <td>Name</td>
        <td>{{$item->name}}</td>
    </tr>
    <tr>
        <td>Price</td>
        <td>{{$item->price}}</td>
    </tr>
    <tr>
        <td>Stock</td>
        <td>{{$item->stock}}</td>
    </tr>
    <tr>
        <td>created_at</td>
        <td>{{$item->created_at}}</td>
    </tr>
    <tr>
        <td>updated_at</td>
        <td>{{$item->updated_at}}</td>
    </tr>
</table>

@endsection
