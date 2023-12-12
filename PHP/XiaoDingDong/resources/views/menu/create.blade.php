@extends('layout.main')

@section('title')
Xiao Ding Dong | Add Food
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/menu/create.css')}}">
@endsection

@section('main')
<main class="d-flex flex-column gap-2">
    @if($errors->any())
    <div class="alert alert-danger info" role="alert">
        {{ $errors->first() }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <h1 class = "yellow">添加新食物 | Add New Food</h1>
    <form class="form" action="/menu/add" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Food Name</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>

        <div class="mb-3">
            <label for="brief" class="form-label">Brief Description</label>
            <textarea class="form-control"  name="brief" id="brief" rows = "2"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Full Description</label>
            <textarea class="form-control"  name="description" id="description" rows = "2"></textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Food Category</label>
            <select class="form-control" name="category" id="category">
                <option value="Main Course">Main Course</option>
                <option value="Desserts">Desserts</option>
                <option value="Beverages">Beverages</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label" for="price">Price</label>
            <input class="form-control" type="text" name="price" id="price">
        </div>

        <div class="mb-3">
            <label class="form-label" for="image">Food Image</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a class = "btn btn-primary" href="{{ url()->previous() }}">Cancel</a>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</main>
@endsection