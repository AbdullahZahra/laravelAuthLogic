@extends('layout')

@section('title')
    Register
@endsection

@section('content')
    <h1>Register</h1>

    <main>
        <form method="POST" action="/register">
            @csrf
            <div class="form-group">
                <label for="name">USERNAME</label>
                <input name="name" type="name" class="form-control" id="name" value="{{ old('name') }}" required>
                @error('name')
                    <p style="color: red"> {{ $message }} </p>
                @enderror
                <label for="email">EMAIL</label>
                <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}"
                    required>
                @error('email')
                    <p style="color: red"> {{ $message }} </p>
                @enderror
                <label for="password">PASSWORD</label>
                <input name="password" type="password" class="form-control" id="password" required>
                @error('password')
                    <p style="color: red"> {{ $message }} </p>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </main>
@endsection
