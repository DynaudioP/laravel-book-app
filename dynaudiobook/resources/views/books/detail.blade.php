@extends('layouts.master')

@section('title')
    Detail Buku
@endsection

@section('content')
    
    <a href="/books" class="btn btn-success mb-3">Kembali</a>
    <div class="d-flex">
        <div class="px-5">
            <img src="{{asset('image/'.$book->image)}}" style="height: 500px" alt="">
        </div>
        <div class="px-3 py-2 d-flex flex-column">
            <h1>
                {{$book->title}}
            </h1>
            <h6 class="mb-5">
                {{$genre->name}}
            </h6>
            <h4>Summary:</h4>
            <h6>{{$book->summary}}</h6>
        </div>
    </div>
@endsection
