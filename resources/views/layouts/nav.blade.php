<div class=" list-group">
    <a href="{{route("page.home")}}" class=" list-group-item list-group-item-action">Home</a>
</div>

@notUser


<div class=" list-group mt-3">
    <a href="{{route("auth.login")}}" class=" list-group-item list-group-item-action">Login</a>
    <a href="{{route("auth.register")}}" class=" list-group-item list-group-item-action">Register</a>
</div>

@endnotUser

@user

<p class=" mt-3">Manage Inventory</p>

<div class=" list-group">
    <a href="{{route("item.create")}}" class=" list-group-item list-group-item-action">Create Item</a>
    <a href="{{route("item.index")}}" class=" list-group-item list-group-item-action">Item Lists</a>
</div>

<p class=" mt-3">Manage Category</p>

<div class=" list-group">
    <a href="{{route("category.create")}}" class=" list-group-item list-group-item-action">Create Category</a>
    <a href="{{route("category.index")}}" class=" list-group-item list-group-item-action">Category Lists</a>
</div>

<p class=" mt-3">Manage Books</p>

<div class=" list-group">
    <a href="{{route("book.create")}}" class=" list-group-item list-group-item-action">Create book</a>
    <a href="{{route("book.index")}}" class=" list-group-item list-group-item-action">Book Lists</a>
</div>

<p class=" mt-3">Your Profile</p>

<div class=" list-group">
    <a href="{{route("dashboard.home")}}" class=" list-group-item list-group-item-action">Your Profile</a>
    <a href="{{route("auth.changePassword")}}" class=" list-group-item list-group-item-action">Change Your Password</a>
</div>
<form action="{{route("auth.logout")}}" method="POST" class=" mt-3">
    @csrf
    <button type="submit" class=" btn btn-primary w-100">Logout</button>
</form>

@enduser
