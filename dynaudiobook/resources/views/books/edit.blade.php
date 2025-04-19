@extends('layouts.master')

@section('title')
    Edit Buku
@endsection

@section('content')
    <form action="/books/{{$book->id}}" method="POST" enctype="multipart/form-data">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        @method('put')
        <label for="genre">Genre:</label><br>
        <select name="genre_id" id="" class="form-control mb-3">
            <option value="">--Select Genre--</option>
            @forelse ($genres as $item)
                @if ($item->id === $book->genre_id)
                    <option value="{{ $item->id }}"selected>{{ $item->name }}</option>
                @else
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endif
            @empty
                <option value="">Tidak ada genre</option>
            @endforelse
        </select>

        <label for="title">Title:</label><br>
        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}"
            required><br><br>

        <label for="stok">Stok:</label><br>
        <input type="number" class="form-control" id="stok" name="stok" value="{{ $book->stok }}"
            required><br><br>

        <label for="bio">Summary:</label><br>
        <textarea id="summary" class="form-control" name="summary" rows="5" cols="40" required>{{ $book->summary }}</textarea><br><br>

        <label for="image">Image:</label><br>
        <input type="file" class="form-control" id="image" name="image" value=""><br><br>

        <input type="submit" value="Tambah">
    </form>
@endsection
