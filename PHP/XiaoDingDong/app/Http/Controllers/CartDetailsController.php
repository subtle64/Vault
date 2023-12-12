<?php

namespace App\Http\Controllers;

use App\Models\CartDetails;
use App\Models\CartHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartDetailsController extends Controller
{
    public function store(Request $request)
    {
        $cart_header = CartHeader::where('user_id', Auth::user()->id)->first();
        $cart_detail = CartDetails::where('cart_header_id', $cart_header->id)->where('menu_id', $request->id);

        if (!$cart_detail->get()->isEmpty()) {
            $cart_detail->increment('quantity');
        } else {
            $new_cart = CartDetails::create([
                'cart_header_id' => $cart_header->id,
                'menu_id' => $request->id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('info', 'Successfully added item to cart.');
    }

    public function patch(Request $request)
    {
        $cart_detail = CartDetails::where('id', $request->id);
        $quantity = $cart_detail->get()->first()->quantity;
        if ($request->type == 'increment') {
            $cart_detail->increment('quantity');
        } else if ($request->type == 'decrement' && $quantity > 1) {
            $cart_detail->decrement('quantity');
        }
        
        return redirect('/cart');
    }

    public function delete(Request $request)
    {
        $cart_detail = CartDetails::where('id', $request->id);
        $cart_detail->delete();
        return redirect('/cart')->with('info', 'Cart item deleted successfully.');
    }

    public function index()
    {
        $cart_header = CartHeader::where('user_id', Auth::user()->id)->first();
        $cart_detail = CartDetails::where('cart_header_id', $cart_header->id)->join('menus', 'menus.id', '=', 'cart_details.menu_id');
        $result = $cart_detail->get([
            'cart_details.id as id',
            'name',
            'quantity',
            'price',
        ]);
        $total = $result->sum(function ($col) {
            return $col->quantity * $col->price;
        });

        return view('carts.index', compact('result', 'total'));
    }
}
