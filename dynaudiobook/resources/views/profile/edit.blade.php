@extends('layouts.master')

@section('title')
    Edit Profile
@endsection

@section('content')
    <form action="/profile/{{$profile->id}}" method="POST">
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
        @method('PUT')
        <label for="age">Umur:</label><br>
        <input type="number" class="form-control" id="age" name="age" value="{{$profile->age}}" required><br><br>

        <label for="bio">Alamat:</label><br>
        <textarea id="address" class="form-control" name="address" rows="5" cols="40" required>{{$profile->address}}</textarea><br><br>

        <input type="submit" class="btn btn-primary" value="Update">
    </form>
@endsection
