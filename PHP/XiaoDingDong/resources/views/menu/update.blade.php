@extends('layout.main')

@section('title')
Xiao Ding Dong | Update Food
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/menu/update.css')}}">
@endsection

@section('main')
<main class="d-flex flex-column gap-2">
    @if($errors->any())
    <div class="alert alert-danger info" role="alert">
        {{ $errors->first() }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <h1 class = "yellow">更新的食物 | Update Food</h1>
    <form class="form" action="/menu/patch" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Food Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $menu-> name }} ">
        </div>

        <div class="mb-3">
            <label for="brief" class="form-label">Brief Description</label>
            <textarea class="form-control"  name="brief" id="brief" rows = "2">{{ $menu->brief }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Full Description</label>
            <textarea class="form-control"  name="description" id="description" rows = "2">{{ $menu->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Food Name</label>
            <select class="form-control" name="category" id="category">
                <option value="Main Course" {{ $menu->category == 'Main Course' ? 'selected' : ''}}>Main Course</option>
                <option value="Desserts" {{ $menu->category == 'Desserts' ? 'selected' : ''}}>Desserts</option>
                <option value="Beverages" {{ $menu->category == 'Beverages' ? 'selected' : ''}}>Beverages</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label" for="price">Price</label>
            <input class="form-control" type="text" name="price" id="price" value="{{ $menu->price }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="image">Food Image</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>

        <input type="hidden" name="id" value="{{ $menu->id }}">

        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Update Food</button>
        </div>
    </form>
</main>
@endsection