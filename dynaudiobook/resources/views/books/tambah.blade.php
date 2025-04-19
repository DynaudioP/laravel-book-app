@extends('layouts.master')

@section('title')
    Tambah Buku
@endsection

@section('content')
    <form action="/books" method="POST" enctype="multipart/form-data">
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
        <label for="genre">Genre:</label><br>
        <select name="genre_id" id="" class="form-control mb-3">
            <option value="">--Select Genre--</option>
            @forelse ($genres as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @empty
                <option value="">Tidak ada genre</option>
            @endforelse
        </select>

        <label for="title">Title:</label><br>
        <input type="text" class="form-control" id="title" name="title" value="" required><br><br>

        <label for="stok">Stok:</label><br>
        <input type="number" class="form-control" id="stok" name="stok" value="" required><br><br>

        <label for="bio">Summary:</label><br>
        <textarea id="summary" class="form-control" name="summary" rows="5" cols="40" required></textarea><br><br>

        <label for="image">Image:</label><br>
        <input type="file" class="form-control" id="image" name="image" value="" required><br><br>

        <input type="submit" value="Tambah">
    </form>
@endsection
