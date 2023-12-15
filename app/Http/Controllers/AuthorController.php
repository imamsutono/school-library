<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::select('id', 'name', 'about', 'photo')->paginate(20);
        return view('author.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        $data = $request->validated();

        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('author-photos');
        }

        Author::create($data);

        return redirect()->route('author.index')
            ->with('action_status', 'success')
            ->with('action_message', 'Author '. $data['name'] .' successfully added 🥳');
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
    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $data = $request->validated();

        if ($request->file('photo')) {
            if ($request->old_image) {
                Storage::delete($request->old_image);
            }

            $data['photo'] = $request->file('photo')->store('author-photos');
        }

        $name = $author->name;
        $author->update($data);

        return redirect()->route('author.index')
            ->with('action_status', 'success')
            ->with('action_message', "Author $name successfully edited ✏️");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        if ($author->photo) {
            Storage::delete($author->photo);
        }

        $name = $author->name;
        $author->delete();

        return redirect()->back()
            ->with('action_status', 'success')
            ->with('action_message', "Author $name successfully deleted 🗑️");
    }
}
