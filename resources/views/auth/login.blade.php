@extends('layouts.app')

@section('content')
    <h2>Login</h2>
    @if($errors->any())
        <div style="padding:10px;background:#fef2f2;color:#991b1b;border-radius:6px;margin-bottom:12px">
            <ul class="mb-0" style="margin:0; padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
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

