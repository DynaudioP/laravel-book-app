@extends('layouts.master')

@section('title')
    Home
@endsection



@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h1>SanberBook</h1>
    <h3>Social Media Developer Santai Berkualitas</h3>

    <div class="d-flex justify-content-center align-items-center mt-5">
        <a href="/books" class="icon-link icon-link-hover">
            <div class="border border-secondary-subtle rounded-3 mx-3 p-5">

                <h3>Lihat Buku</h3>

            </div>
        </a>
        <a href="/genre">
            <div class="border border-secondary-subtle rounded-3 mx-3 p-5">
                <h3>Lihat Kategori</h3>
            </div>
        </a>
    </div>
@endsection
