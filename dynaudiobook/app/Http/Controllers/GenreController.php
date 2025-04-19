<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    //
    public function index()
    {
        $genres = DB::table('genres')->get();

        return view('genre.tampil', ["genres" => $genres]);
    }

    // Menampilkan view halaman tambah genre
    public function create()
    {
        return view('genre.tambah');
    }

    // Menyimpan data ke DB
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => ['required', 'min: 3'],
                'description' => ['required']
            ],
            [
                'required' => 'Inputan wajib diisi',
                'min' => 'Inputan nama minimal lebih dari 3',
            ]
        );

        $datenow = Carbon::now();

        DB::table('genres')->insert([
            'name' => $request->input("name"),
            'description' => $request->input("description"),
            'created_at' => $datenow,
            'updated_at' => $datenow,
        ]);

        return redirect('/genre');
    }

    public function show($id)
    {
        $genre = Genre::find($id);

        return view('genre.detail', ['genre' => $genre]);
    }

    public function edit($id)
    {
        $genre = DB::table('genres')->find($id);

        return view('genre.edit', ['genre' => $genre]);
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => ['required', 'min: 3'],
                'description' => ['required']
            ],
            [
                'required' => 'Inputan wajib diisi',
                'min' => 'Inputan nama minimal lebih dari 3',
            ]
        );

        $datenow = Carbon::now();

        DB::table('genres')->where('id', $id)->update(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'updated_at' => $datenow,
            ]
        );

        return redirect('/genre');
    }

    public function destroy($id) {
        DB::table('genres')->where('id', $id)->delete();

        return redirect('/genre');
    }
}
