<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::select('id', 'title', 'isbn', 'cover')->paginate(20);
        return view('book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::select('id', 'name')->get();

        return view('book.create', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $data = $request->validated();

        if ($request->file('cover')) {
            $data['cover'] = $request->file('cover')->store('book-cover');
        }

        Book::create($data);

        return redirect()->route('book.index')
            ->with('action_status', 'success')
            ->with('action_message', 'Book '. $data['title'] .' successfully added 🥳');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::select('id', 'name')->get();

        return view('book.edit', [
            'book'    => $book,
            'authors' => $authors
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();

        if ($request->file('cover')) {
            if ($request->old_image) {
                Storage::delete($request->old_image);
            }

            $data['cover'] = $request->file('cover')->store('book-cover');
        }

        $name = $book->name;
        $book->update($data);

        return redirect()->route('book.index')
            ->with('action_status', 'success')
            ->with('action_message', "Book $name successfully edited ✏️");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->photo) {
            Storage::delete($book->photo);
        }

        $title = $book->title;
        $book->delete();

        return redirect()->back()
            ->with('action_status', 'success')
            ->with('action_message', "Book $title successfully deleted 🗑️");
    }
}
