@extends('layouts.master')

@section('title')
    Login
@endsection

@section('content')
    <form action="/login" method="POST">
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

        <label for="email">Email:</label><br>
        <input type="email" class="form-control" id="email" name="email" value="" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" class="form-control" id="password" name="password" value="" required><br><br>

        <input type="submit" class="btn btn-primary mb-3" value="Login"> <br>
        <h6>Belum punya akun? <a href="/register">Register disini</a></h6>
    </form>
@endsection
