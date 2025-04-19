@extends('layouts.master')

@section('title')
    Detail Genre
@endsection

@section('content')
    <h1 class="text-success">{{$genre->name}}</h1>
    <p>{{$genre->description}}</p>
    <a href="/genre" class="btn btn-success mb-3">Kembali</a>

    <hr>
    <h4 class="mb-3">Daftar Buku dengan genre tersebut</h4>
    <div class="row">
        @forelse ($genre->book as $item)
            <div class="card mx-3" style="width: 18rem;">

                <img src="{{ asset('image/' . $item->image) }}" class="card-img-top" style="height: 400px;" alt="...">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $item->title }}</h5>
                    <p class="card-text">{{ Str::limit($item->summary, 100) }}</p>
                    <form action="/books/{{ $item->id }}" method="POST">
                        <a href="/books/{{ $item->id }}" class="btn btn-primary w-100 mb-1">Lihat Buku</a>
                    </form>
                </div>
            </div>
        @empty
            <h5>Tidak ada Buku</h5>
        @endforelse

    </div>
@endsection
