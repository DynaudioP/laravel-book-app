<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Http\Middleware\isAdmin;

class BooksController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(['auth', isAdmin::class], except: ['index', 'show'])
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return view('books.tampil', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();

        return view('books.tambah', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'image' => 'required|mimes:jpg,png|max:2048',
            'stok' => 'required',
            'genre_id' => 'required',
        ]);

        // buat nama gambar unique
        $imageUniqueName = time() . '.' . $request->image->extension();

        // tempat simpan gambar
        $request->image->move(public_path('image'), $imageUniqueName);

        // Insert database
        $book = new Book;

        $book->title = $request->input('title');
        $book->summary = $request->input('summary');
        $book->stok = $request->input('stok');
        $book->genre_id = $request->input('genre_id');
        $book->image = $imageUniqueName;

        $book->save();

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        $genre = Genre::find($book->genre_id);

        return view('books.detail', ['book' => $book, 'genre' => $genre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        $genres = Genre::all();

        return view('books.edit', ['book' => $book, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'image' => 'mimes:jpg,png|max:2048',
            'stok' => 'required',
            'genre_id' => 'required',
        ]);

        $book = Book::find($id);

        if ($request->has('image')) {
            File::delete('image/' . $book->image);

            $newImage = time() . '.' . $request->image->extension();

            // tempat simpan gambar
            $request->image->move(public_path('image'), $newImage);

            $book->image = $newImage;
        }

        $book->title = $request->input('title');
        $book->summary = $request->input('summary');
        $book->stok = $request->input('stok');
        $book->genre_id = $request->input('genre_id');

        $book->save();

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        $book->delete();

        File::delete('image/' . $book->image);

        return redirect('/books');
    }
}
