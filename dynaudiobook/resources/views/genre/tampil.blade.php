@extends('layouts.master')

@section('title')
    List Genre
@endsection

@section('content')
    @auth
        @if (Auth()->user()->role === 'admin')
            <a href="/genre/create" class="btn btn-success mb-3">Tambah Genre</a>
        @endif
    @endauth

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($genres as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>
                        <form action="/genre/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/genre/{{ $item->id }}" class="btn btn-info">Detail</a>
                            @auth
                                @if (Auth()->user()->role === 'admin')
                                    <a href="/genre/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                @endif
                            @endauth
                        </form>
                    </td>
                </tr>
            @empty
                <p class="flex justify-center">Genre Kosong</p>
            @endforelse

        </tbody>
    </table>
@endsection
