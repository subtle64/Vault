<?php

namespace App\Http\Controllers;

use App\Models\CartDetails;
use App\Models\CartHeader;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionDetailsController extends Controller
{
    public function index() {
        $transaction_header = TransactionHeader::with('transaction_details')->where('user_id', Auth::user()->id)->get();
        $result = $transaction_header;
        return view('transactions.index', compact('result'));
    }
}
