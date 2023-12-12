@extends('layout.main')

@section('title')
    Xiao Ding Dong | Search
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/menu/details.css') }}">
@endsection

@section('main')
<main class="d-flex flex-column justify-content-center">
    @if(session()->get('info'))
    <div class="alert alert-success info" role="alert">
        {{ session()->get('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <h1 class = "yellow">食物细节 | Food Detail</h1>
    <div class="d-flex p-5 menu">
        <img class="img-detail" src={{ asset("assets/menu/$menu->img_path") }}>
        <div class="d-flex flex-column details">
            <h3 class = "yellow">{{ $menu->name }}</h3>

            <h4 class = "yellow">Food type:</h4>
            <p>{{ $menu->category }}</p>

            <h4 class = "yellow">Food price:</h4>
            <p>${{ $menu->price }}</p>

            <h4 class = "yellow">Brief description:</h4>
            <p>{{ $menu->brief }}</p>

            <h4 class = "yellow">About this food:</h4>
            <p>{{ $menu->description }}</p>

            @auth
            @if(Auth::user()->is_admin == 0)
            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="id" value={{ $menu->id }}>
                <button class="btn btn-primary" type="submit">Add to Cart</button>
            </form>
            @endif
            @endauth
        </div>
    </div>
</main>
@endsection