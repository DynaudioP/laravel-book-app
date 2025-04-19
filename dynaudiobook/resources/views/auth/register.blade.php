@extends('layouts.master')

@section('title')
    Register
@endsection

@section('content')
    <form action="/register" method="POST">
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
        <label for="name">Username:</label><br>
        <input type="text" class="form-control" id="name" name="name" value="" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" class="form-control" id="email" name="email" value="" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" class="form-control" id="password" name="password" value="" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" class="form-control" id="password" name="password_confirmation" value="" required><br><br>

        <input type="submit" class="btn btn-primary" value="Register Akun">
    </form>
@endsection
