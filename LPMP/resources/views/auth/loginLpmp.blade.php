@extends('auth/loginMaster')

@section('title', 'Login LPMP')
@section('content')
    <form action="{{ route('auth.checkLpmp') }}" class="login-form" method="post">
        @if (Session::get('failLpmp'))
            <div class="alert alert-danger">
                {{ Session::get('failLpmp') }}
            </div>
        @endif
        @csrf
        <div class="form-group">
            <input type="text" class="form-control rounded-left" name="username" placeholder="Username" value="{{ old('username') }}">
            <span class="text-danger">@error('username'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <input type="password" class="form-control rounded-left" name="password" placeholder="Password">
            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
    </form>
@endsection
