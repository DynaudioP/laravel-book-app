@extends('layouts.master')

@section('title')
    Buat Profile
@endsection

@section('content')
    <form action="/profile" method="POST">
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
        <label for="age">Umur:</label><br>
        <input type="number" class="form-control" id="age" name="age" value="" required><br><br>

        <label for="bio">Alamat:</label><br>
        <textarea id="address" class="form-control" name="address" rows="5" cols="40" required></textarea><br><br>

        <input type="submit" class="btn btn-primary" value="Tambah">
    </form>
@endsection
