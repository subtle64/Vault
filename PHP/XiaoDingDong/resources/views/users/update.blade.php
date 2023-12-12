@extends('layout.main')

@section('title')
Xiao Ding Dong | Home
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/users/update.css')}}">
@endsection

@section('main')
<main class="d-flex flex-column gap-2">
    @if(session()->get('info'))
    <div class="alert alert-success info" role="alert">
        {{ session()->get('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    @if($errors->any())
    <div class = "alert alert-danger info" role = "alert">
        {{ $errors->first() }}
        <button type="button" class = "btn-close" data-bs-dismiss = "alert"></button>
    </div>
    @endif
    <h1 class = "yellow">编辑个人资料 | Edit Profile</h1>
    <form class="" action="/profile" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email">
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="email" name="phone_number" class="form-control" id="phone_number">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="email" name="address" class="form-control" id="address">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">New Profile Image</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
        </div>

        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" name="current_password" class="form-control" id="current_password">
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Update Profile</button>
        </div>
    </form>
</main>
@endsection