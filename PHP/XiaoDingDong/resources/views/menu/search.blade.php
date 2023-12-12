@extends('layout.main')

@section('title')
Xiao Ding Dong | Search
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/menu/search.css')}}">
@endsection

@section('main')
<main>
    @if(session()->get('info'))
    <div class="alert alert-success info" role="alert">
        {{ session()->get('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <h1 class = "yellow">{{Auth::user()->is_admin == 0 ? "搜索食物 | Search Foods" : "管理食物 | Manage Foods"}}</h1>
    <form class="d-flex flex-column gap-1" action="/search">
        <div class="d-flex gap-1">
            <input name="search" type="search" class="form-control" placeholder="Search" value={{ $name }}>
            <button class="btn btn-dark" type="submit">Search</button>
        </div>
        <div class="d-flex gap-1 align-items-center bg-black p-1 text-white filter-choices">
            <div class="tag">Filter by category:</div>
            <input id="main-course" class="form-check-input" type="checkbox" name="filter[]" value="Main Course" {{ in_array('Main Course', $categories) ? 'checked' : '' }}>
            <label for="main-course" class="form-check-label">Main Course</label>

            <input id="desserts" class="form-check-input" type="checkbox" name="filter[]" value="Desserts" {{ in_array('Desserts', $categories) ? 'checked' : '' }}>
            <label for="desserts" class="form-check-label">Desserts</label>

            <input id="beverages" class="form-check-input" type="checkbox" name="filter[]" value="Beverages" {{ in_array('Beverages', $categories) ? 'checked' : '' }}>
            <label for="beverages" class="form-check-label">Beverages</label>
        </div>
        <br>
    </form>
    @if(count($result) != 0)
    <div class="grid-container">
        @foreach($result as $i)
        <div class="d-flex result gap-3">
            <a href="{{"/menu/show/$i->id"}}"><img src="{{ asset("assets/menu/$i->img_path") }}"></a>
            <div class="d-flex flex-grow-1 flex-column">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="d-flex me-auto">{{ $i->name }}</h5>
                    @if(Auth::user()->is_admin == 1)
                    <div class="d-flex gap-1">
                        <a class="btn btn-secondary" href="/menu/update/{{ $i->id }}">Update</a>
                        <form action="/menu/delete" method="POST">
                            @csrf
                            <input type="hidden" name="id" value={{$i->id}}>
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                    @endif
                </div>

                <h6>Category:</h6>
                <p>{{ $i->category }}</p>

                <h6>Description:</h6>
                <p>{{ $i->brief }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="p-3 message text-center">
        <h6>No items matched your search.</h6>
    </div>
    @endif
    <div class = "d-flex justify-content-center mt-4">
        {{ $result->withQueryString()->links() }}
    </div>
</main>
@endsection