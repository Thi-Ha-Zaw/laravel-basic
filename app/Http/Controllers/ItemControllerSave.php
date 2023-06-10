<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){

        return view("inventory.index",[
            "items" => Item::all()
        ]);
    }

    public function create(){
        return view("inventory.create");
    }


    public function store(Request $request){

        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->save();


        // $item = Item::create([
        //     "name" => $request->name,
        //     "price" => $request->price,
        //     "stock" => $request->stock
        // ]);

        // $item = Item::create($request->all());

       return redirect()->route("item.index");
    }

    public function show($id){
        return view("inventory.detail",[
            "item" => Item::findOrfail($id)
        ]);
    }

    public function destroy($id){
        $item = Item::findOrfail($id);
        $item->delete();
        return redirect()->back();
    }

    public function edit($id){
        return view("inventory.edit",[
            "item" => Item::findOrfail($id)
        ]);
    }

    public function update($id,Request $request){
        
        $item = Item::findOrfail($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->update();

        return redirect()->route("item.index");

    }
}
