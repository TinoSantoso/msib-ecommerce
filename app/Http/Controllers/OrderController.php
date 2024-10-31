<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        // Product -> cartItem -> Checkout -> Order

        $orders = Order::where('user_id', Auth::id())->get();

        return view('orders.index', compact('orders'));
    }

    public function show($id){

        $data = Order::with('orderItems.product')->findOrFail($id);

        return view('orders.show', compact('data'));
    }
}
