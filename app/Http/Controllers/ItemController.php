<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $items = Item::when(request()->has("keyword"),function($query){
        $searchKey = request()->keyword;
        $query->where("name","like","%$searchKey%");
       })
       ->when(request()->has("name"),function($query){
        $sortKey = request()->name ?? "asc";
        $query->orderBy("name",$sortKey);
       })
       ->paginate(7)->withQueryString();

       return view("inventory.index",compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("inventory.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {

        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->save();

       return redirect()->route("item.index")->with("status","Item Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view("inventory.detail", compact("item"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view("inventory.edit", compact("item"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->update();

        return redirect()->route("item.index")->with("status","Item Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->back()->with("status","Item Deleted");
    }
}
