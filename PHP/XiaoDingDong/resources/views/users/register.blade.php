@extends('layout.min')

@section('title')
Xiao Ding Dong | Register
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/users/auth.css')}}">
@endsection

@section('main')
@if($errors->any())
<div class="alert alert-danger info" role="alert">
    {{ $errors->first() }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
<div class="main-bg">
    <div class="form-container">
        <form action="/register" method="POST">
            @csrf
            <h1 class = "text-center">Register</h1>
            <div class="mb-3">
                <label class="form-text text-reset" for="username">Username</label>
                <input class="form-control" type="text" name="username">
            </div>

            <div class="mb-3">
                <label class="form-text text-reset" for="email">Email Address</label>
                <input class="form-control" type="text" name="email">
            </div>

            <div class="mb-3">
                <label class="form-text text-reset" for="password">Password</label>
                <input class="form-control" type="password" name="password">
            </div>

            <div class="mb-3">
                <label class="form-text text-reset" for="password_confirmation">Confirm Password</label>
                <input class="form-control" type="password" name="password_confirmation">
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Register</button>
        </form>
        <br>
        <span class = "text-center">Already have an account? <a class = "text-warning" href="/login">Login</a></span>
    </div>
</div>
@endsection