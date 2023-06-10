@extends("layouts.master")


@section('title')

Item List

@endsection


@section('content')

@if (session("status"))

<div class=" alert alert-success">
    {{session("status")}}
</div>

@endif

<div class=" row justify-content-between mb-3">
    <div class="col-md-3">
        <a href="" class=" btn btn-primary px-3 rounded-1">Create</a>
    </div>
    <div class="col-md-4">
        <form action="{{route("item.index")}}" method="get">
            <div class=" input-group">
                <input
                type="text"
                name="keyword"
                class=" form-control"
                @if (request()->has("keyword"))
                value = "{{request()->keyword}}"
                @endif
                required>
                @if (request()->has("keyword"))
                <a href="{{route("item.index")}}" class=" btn btn-danger">Clear</a>
                @endif
                <button type="submit" class=" btn btn-primary">Search</button>
            </div>
        </form>
    </div>

</div>
<table class=" table table-bordered">
    <thead>
        <th>#</th>
        <th>
        Name
        <a class=" text-info text-decoration-none" href="{{route("item.index",["name"=>"ASC"])}}">ASC</a>
        <a class=" text-info text-decoration-none" href="{{route("item.index",["name"=>"DESC"])}}">DESC</a>
        <a class=" text-info text-decoration-none" href="{{route("item.index")}}">Clear</a>
        </th>
        <th>Price</th>
        <th>Stock</th>
        <th>Control</th>
    </thead>
    <tbody>
        @forelse ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->stock}}</td>
                <td>
                    <a href="{{route("item.show",$item->id)}}" class=" btn btn-sm btn-outline-primary">Detail</a>
                    <form class=" d-inline-block" action="{{route("item.destroy",$item->id)}}" method="post">
                        @method("delete")
                        @csrf
                        <button type="submit" class=" btn btn-sm btn-outline-danger">Del</button>
                    </form>
                    <a href="{{route("item.edit",$item->id)}}" class=" btn btn-sm btn-outline-info">Edit</a>
                </td>
            </tr>
        @empty
            <tr class=" text-center">
                <td colspan="5">
                    <h5>There is no records</h5>
                    <a href="{{route("item.create")}}" class=" btn btn-sm btn-primary">Create Item</a>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

{{$items->onEachSide(1)->links()}}

@endsection
