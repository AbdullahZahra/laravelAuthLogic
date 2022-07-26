@extends('layout')

@section('title')
    Log In!
@endsection

@section('content')
    <h1>Log In!</h1>
    <form method="POST" action="/login">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        @error('email')
            <p style="color: red"> {{ $message }} </p>
        @enderror
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Log In!</button>
        </div>
    </form>
@endsection
