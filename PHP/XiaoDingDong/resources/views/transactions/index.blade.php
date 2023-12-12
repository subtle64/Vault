@extends('layout.main')

@section('title')
Xiao Ding Dong | Cart
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/transactions/index.css')}}">
@endsection

@section('main')
<main>
    <h1 class = "yellow">交易记录 | Transaction History</h1>
    <br>
    @if(count($result) != 0)
    <table class="table">
        <thead class ="table-dark">
            <tr>
                <th>Transaction ID</th>
                <th>Purchase Date</th>
                <th>Food Name</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($result as $i)
            @php
                $total = 0;
            @endphp
            <tr>
                <th>TR{{ $i->id }}</th>
                <th>{{ $i->created_at }}</th>
                <th>
                    @foreach($i->transaction_details as $j)
                        <p>{{$j->menu->name}} {{ "[x$j->quantity]" }}</p>
                        @php
                            $total += $j->quantity + $j->menu->price;
                        @endphp
                    @endforeach
                </th>
                <th>
                    ${{ $total }}
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="d-flex flex-column text-center message">
        <h1>Your transaction history is empty...</h1>
        <p>Buy food now and fill your belly!</p>
    </div>
    @endif
</main>
@endsection

