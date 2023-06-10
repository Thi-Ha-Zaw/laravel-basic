<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResoure;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemApiController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware("checkApi")->except("index");
    // }
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

        // return response()->json($items);
        return ItemResoure::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name" => "required|unique:items,name|min:3",
            "price" => "required",
            "stock" => "required"
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(),422);
        }
        $item = Item::create([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock
        ]);

        // return response()->json($item);
        return new ItemResoure($item);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        if(is_null($item)){
            return response()->json([
                "message" => "404 Not Found"
            ],404);
        }

        // return response()->json($item);
        return new ItemResoure($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            "name" => "required|min:3",
            "price" => "required",
            "stock" => "required"
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(),422);
        }

        $item = Item::find($id);
        if(is_null($item)){
            return response()->json([
                "message" => "404 Not Found"
            ],404);
        }

        $item->update([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock
        ]);

        // return response()->json($item);
        return new ItemResoure($item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
        if(is_null($item)){
            return response()->json([
                "message" => "404 Not Found"
            ],404);
        }

        $item->delete();

        return response()->json([],204);
    }
}
