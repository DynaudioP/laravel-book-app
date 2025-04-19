<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function daftar() {
        return view('register');
    }
    public function welcome(Request $request) {
        $first = $request->input('fname');
        $last = $request->input('lname');

        return view('welcome', ['fname' => $first, 'lname' => $last]);
        
    }
}
