@extends('auth/loginMaster')

@section('title',"Login Admin")
@section('content')
    <form action="{{ route('auth.check') }}" class="login-form" method="post">
        @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        @csrf
        <div class="form-group">
            <input type="text" class="form-control rounded-left" name="name" placeholder="Name"  value="{{ old('name') }}">
            <span class="text-danger">@error('name'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <input type="password" class="form-control rounded-left" name="password" placeholder="Password">
            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <button type="submit"
                class="form-control btn btn-primary rounded submit px-3">Login</button>
    </form>
@endsection