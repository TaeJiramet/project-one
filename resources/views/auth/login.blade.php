@extends('layouts.app')

@section('content')
    <h2>Login</h2>
    @if($errors->any())
        <div style="color:#b91c1c">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf
        <div class="form-row">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-row">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>
        <div>
            <button class="btn" type="submit">Login</button>
        </div>
    </form>
@endsection

