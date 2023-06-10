@extends("layouts.master")


@section('title')

Category page

@endsection


@section('content')

<h4 class=" my-3">Category details</h4>
<table class=" table">
    <tr>
        <td>id</td>
        <td>{{$category->id}}</td>
    </tr>
    <tr>
        <td>Title</td>
        <td>{{$category->title}}</td>
    </tr>
    <tr>
        <td>Description</td>
        <td>{{$category->description}}</td>
    </tr>
    <tr>
        <td>created_at</td>
        <td>{{$category->created_at}}</td>
    </tr>
    <tr>
        <td>updated_at</td>
        <td>{{$category->updated_at}}</td>
    </tr>
</table>

@endsection
