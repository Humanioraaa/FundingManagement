@extends('layouts.master')

@section('content')
<div style="text-align: center;">
    <h1 style="font-weight: bold;">Login Admin</h1>
    <form action="/login" method="post">
        @csrf
        <div style="margin-bottom: 10px;">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username">
        </div>
        <div style="margin-bottom: 10px;">
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password">
        </div>
        <input type="submit" value="Login">
    </form>
</div>
@endsection
