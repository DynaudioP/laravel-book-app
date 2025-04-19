@extends('layouts.master')

@section('title')
    Edit Genre
@endsection

@section('content')
    <form action="/genre/{{$genre->id}}" method="POST">
        @method('put')
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
        <input type="text" class="form-control" id="name" name="name" value="{{$genre->name}}" required><br><br>

        <label for="bio">Deskripsi:</label><br>
        <textarea id="description" class="form-control" name="description" rows="5" cols="40" required>{{$genre->description}}</textarea><br><br>

        <input type="submit" class="btn btn-primary" value="Tambah">
    </form>
@endsection
