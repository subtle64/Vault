@extends('layout.min')

@section('title')
Xiao Ding Dong | Login
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/users/auth.css')}}">
@endsection

@section('main')
@if($errors->any())
    <div class = "alert alert-danger info" role = "alert">
        {{ $errors->first() }}
        <button type="button" class = "btn-close" data-bs-dismiss = "alert"></button>
    </div>
    @endif
    <div class="main-bg">
        <div class="form-container">
            <form action="/login" method="POST">
                @csrf
                <h1 class = "text-center">Login</h1>
                <div class="mb-3">
                    <label class = "form-text text-reset" for="email">Email Address</label>
                    <input class = "form-control" type="text" name="email">
                </div>

                <div class="mb-3">
                    <label class = "form-text text-reset" for="password">Password</label>
                    <input class = "form-control" type="password" name="password">
                </div>

                <div class="mb-3">
                    <input class = "form-check-input" type="checkbox" name="remember_me" id="">
                    <label class = "form-check-text text-reset" for="remember_me">Remember Me</label>
                </div>
                <button class = "btn btn-primary" type="submit">Login</button>
            </form>
            <br>
            <span class = "text-center">Don't have an account? <a class = "text-warning" href="/register">Sign Up</a></span>
        </div>
    </div>
@endsection
