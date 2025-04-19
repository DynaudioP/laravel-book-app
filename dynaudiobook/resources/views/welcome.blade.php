@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@if (session('success'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            hai
        </div>
    
    @endif
    <h1>Selamat Datang {{ $fname }} {{ $lname }}</h1>
    <br>
    <h3>Terimakasih telah bergabung di SanberBook. Social Media kita bersama!</h3>
@endsection
