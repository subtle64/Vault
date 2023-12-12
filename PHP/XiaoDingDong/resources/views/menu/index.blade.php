@extends('layout.main')

@section('title')
Xiao Ding Dong | Home
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/menu/home.css')}}">
@endsection

@section('main')
<main class="d-flex flex-column gap-2">
    @if(session()->get('info'))
    <div class="alert alert-success info" role="alert">
        {{ session()->get('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <h1 class = "yellow">菜单 | Menu</h1>
    <form action="/home" , method="GET">
        <button class="btn btn-primary" name="category" value="Main Course" type="submit" {{ $category == 'Main Course' ? 'disabled' : '' }}>主菜 | Main Course</button>
        <button class="btn btn-primary" name="category" value="Beverages" type="submit" {{ $category == 'Beverages' ? 'disabled' : '' }}>饮料 | Beverages</button>
        <button class="btn btn-primary" name="category" value="Desserts" type="submit" {{ $category == 'Desserts' ? 'disabled' : '' }}>甜点 | Desserts</button>
    </form>
    <div class="w-100 bg-black text-center text-white p-1 tag">
        {{ $category }}
    </div>
    <div class="grid-container">
        @foreach($menus as $i)
        <a class="card" href={{"/menu/show/$i->id"}}>
            <img class="card-img-top" src={{ asset("assets/menu/$i->img_path") }}>
            <div class="card-body">
                <p class="card-text">{{ $i->name }}</p>
            </div>
        </a>
        @endforeach
    </div>
    <div class = "d-flex justify-content-center mt-4">
        {{ $menus->withQueryString()->links() }}
    </div>
</main>
@endsection