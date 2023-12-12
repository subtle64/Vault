@extends('layout.main')

@section('title')
Xiao Ding Dong | Home
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/transactions/create.css')}}">
@endsection

@section('main')
<main class="d-flex flex-column gap-2">
    @if($errors->any())
    <div class="alert alert-danger info" role="alert">
        {{ $errors->first() }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <h1 class = "yellow">查看 | Checkout</h1>
    <form class="" action="/checkout" method="POST">
        @csrf
        <h3 class = "text-white">Billing Address</h3>
        <div class="mb-3 d-flex">
            <div class="container-fluid">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="container-fluid">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" id="phone">
            </div>
        </div>

        <div class="mb-3 d-flex">
            <div class="container-fluid">
                <label for="country" class="form-label">Country</label>
                <select class = "form-select" name="country" id="country">
                    @foreach($countries as $c)
                        <option value="{{$c}}">{{$c}}</option>
                    @endforeach
                </select>
            </div>

            <div class="container-fluid">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" class="form-control" id="city">
            </div>
        </div>

        <div class="mb-3 d-flex">
            <div class="container-fluid">
                <label for="card_holder" class="form-label">Card Holder</label>
                <input type="text" name="card_holder" class="form-control" id="card_holder">
            </div>
            <div class="container-fluid">
                <label for="card_number" class="form-label">Card Number</label>
                <input type="text" name="card_number" class="form-control" id="card_number">
            </div>
        </div>

        <h3 class = "text-white">Additional Information</h3>
        <div class="mb-3 container-fluid">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" name="address" id="address" rows="2"></textarea>
        </div>

        <div class="mb-3 container-fluid">
            <label for="zip" class="form-label">ZIP/Postal Code</label>
            <input type="text" name="zip" class="form-control" id="zip">
        </div>
        <div class="d-flex justify-content-end gap-3">
            <a class="btn btn-primary" href="{{ url()->previous() }}">Cancel</a>
            <button class="btn btn-primary" type="submit">Place Order</button>
        </div>
    </form>
</main>
@endsection



<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XiaoDingDong | Checkout</title>
</head>

<body>
    <form action="/checkout" method = "POST">
        @csrf
        <input type="text" name="name">Name
        <input type="text" name="phone" id="">Phone
        <input type="text" name="address" id="">Address
        <input type="text" name="city" id="">City
        <input type="text" name="card_holder" id="">Cardholder
        <input type="text" name="card_number" id="">Cardnumber
        <select name="country" id="">
            <option value="Indonesia">Indonesia</option>
            <option value="America">America</option>
        </select>
        <input type="text" name="zip" id="">
        <input type="submit" value="">
    </form>
    @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
</body>

</html> -->