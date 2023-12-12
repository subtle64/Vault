@extends('layout.main')

@section('title')
Xiao Ding Dong | Cart
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/cart/index.css')}}">
@endsection

@section('main')
<main>
    @if(session()->get('info'))
    <div class="alert alert-success info" role="alert">
        {{ session()->get('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <h1 class = "yellow">你的购物车 | Your Cart</h1>
    <br>
    @if(count($result) != 0)
    <table class="table text-center">
        <thead class = "table-dark">
            <tr>
                <th>Food</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($result as $i)
            <tr>
                <th>{{ $i->name }}</th>
                <th>{{ $i->price }}</th>
                <th>
                    <form action="/cart/update" method="POST">
                        @csrf
                        <input type="hidden" name="id" value={{ $i->id }}>
                        <button class = "btn btn-primary operator" type="submit" name="type" value="increment">+</button>
                        <span>{{ $i->quantity }}</span>
                        <button class = "btn btn-primary operator" type="submit" name="type" value="decrement" {{ $i->quantity == 1 ? 'disabled' : ''}}>-</button>
                    </form>
                </th>
                <th>${{ $i->price * $i->quantity }}</th>
                <th>
                    <form action="/cart/delete" method="POST">
                        @csrf
                        <input type="hidden" name="id" value={{ $i->id }}>
                        <button class = "btn btn-danger" type="submit">Remove</button>
                    </form>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex w-100 pt-5 flex-column align-items-end">
        <h2 class = "yellow">Total Price: ${{$total}}</h2>
        <a class="btn btn-primary" href="/checkout">Proceed to checkout</a>
    </div>
    @else
    <div class = "d-flex flex-column text-center message">
        <h1>Your cart is empty...</h1>
        <p>Add more food now!</p>
    </div>
    @endif
</main>
@endsection