@extends("layouts.master")


@section('title')

Category List

@endsection


@section('content')

<table class=" table table-bordered">
    <thead>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th>Control</th>
    </thead>
    <tbody>
        @forelse ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{{Str::limit($category->description,20)}}</td>
                <td>
                    <a href="{{route("category.show",$category->id)}}" class=" btn btn-sm btn-outline-primary">Detail</a>
                    <form class=" d-inline-block" action="{{route("category.destroy",$category->id)}}" method="post">
                        @method("delete")
                        @csrf
                        <button type="submit" class=" btn btn-sm btn-outline-danger">Del</button>
                    </form>
                    <a href="{{route("category.edit",$category->id)}}" class=" btn btn-sm btn-outline-info">Edit</a>
                </td>
            </tr>
        @empty
            <tr class=" text-center">
                <td colspan="4">
                    <h5>There is no records</h5>
                    <a href="{{route("category.create")}}" class=" btn btn-sm btn-primary">Create Category</a>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
{{$categories->onEachSide(1)->links()}}

@endsection
