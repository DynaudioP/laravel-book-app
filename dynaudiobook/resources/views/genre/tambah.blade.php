
@extends('layouts.master')

@section('title')
    Tambah Genre
@endsection

@section('content')
    <form action="/genre" method="POST">
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
        <label for="fname">Nama:</label><br>
        <input type="text" class="form-control" id="name" name="name" value="" required><br><br>

        <label for="bio">Deskripsi:</label><br>
        <textarea id="description" class="form-control" name="description" rows="5" cols="40" required></textarea><br><br>

        <input type="submit" value="Tambah">
    </form>
@endsection
