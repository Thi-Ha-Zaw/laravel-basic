<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("book.index",[
            "books" => Book::paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("book.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();
        return redirect()->route("book.index")->with("status","Item Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view("book.show",compact("book"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view("book.edit", compact("book"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;

        $book->update();

        return redirect()->route("book.index")->with("status","Item Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()->with("status","Item Deletedf");
    }
}
