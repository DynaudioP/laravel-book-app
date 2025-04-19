@extends('layouts.master')

@section('title')
    Register
@endsection

@section('content')
    <h1>Buat Account Baru</h1>
    <h2>Sign Up Form</h2>

    <form action="/welcome" method="POST">
        @csrf
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname" value=""><br><br>

        <label for="lname">Last Name:</label><br>
        <input type="text" id="lname" name="lname" value=""><br><br>

        <label>Gender:</label><br>
        <input type="radio" id="man" name="gender" value="Man">
        <label for="man">Man</label><br>
        <input type="radio" id="woman" name="gender" value="Woman">
        <label for="woman">Woman</label><br>
        <input type="radio" id="other" name="gender" value="Other">
        <label for="other">Other</label><br><br>

        <label for="nationality">Nationality:</label><br>
        <select id="nationality" name="nationality">
            <option value="indonesia" selected>Indonesia</option>
            <option value="other">Other</option>
        </select><br><br>

        <label>Language Spoken:</label><br>
        <input type="checkbox" id="bahasa" name="language" value="Bahasa Indonesia">
        <label for="bahasa">Bahasa Indonesia</label><br>
        <input type="checkbox" id="english" name="language" value="English">
        <label for="english">English</label><br>
        <input type="checkbox" id="arabic" name="language" value="Arabic">
        <label for="arabic">Arabic</label><br>
        <input type="checkbox" id="japanese" name="language" value="Japanese">
        <label for="japanese">Japanese</label><br><br>

        <label for="bio">Bio:</label><br>
        <textarea id="bio" name="bio" rows="5" cols="40"></textarea><br><br>

        <input type="submit" value="Sign Up">
    </form>
@endsection
