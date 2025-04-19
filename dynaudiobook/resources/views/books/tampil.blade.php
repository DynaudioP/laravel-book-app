@extends('layouts.master')

@section('title')
    List Buku
@endsection

@section('content')
    @auth
        @if (Auth()->user()->role === 'admin')
            <a href="/books/create" class="btn btn-success mb-3">Tambah Buku</a>
        @endif
    @endauth

    <div class="row">
        @forelse ($books as $item)
            <div class="card mx-3" style="width: 18rem;">

                <img src="{{ asset('image/' . $item->image) }}" class="card-img-top" style="height: 400px;" alt="...">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $item->title }}</h5>
                    <span class="badge bg-secondary mb-2">{{$item->genre->name}}</span>
                    <p class="card-text">{{ Str::limit($item->summary, 100) }}</p>
                    <form action="/books/{{ $item->id }}" method="POST">
                        <a href="/books/{{ $item->id }}" class="btn btn-primary w-100 mb-1">Lihat Buku</a>
                        @auth
                            @if (Auth()->user()->role === 'admin')
                                <a href="/books/{{ $item->id }}/edit" class="btn btn-warning">Edit Buku</a>
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="" id="" class="btn btn-danger" value="Hapus Buku">
                            @endif
                        @endauth
                    </form>
                </div>
            </div>
        @empty
            <h5>Tidak ada Buku</h5>
        @endforelse

    </div>
@endsection
