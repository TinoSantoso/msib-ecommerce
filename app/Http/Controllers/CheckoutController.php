<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(){
        // Product -> cartItem -> Checkout -> Order

        $cartItems = CartItem::where('user_id', Auth::id())->get();
        $total = $cartItems->sum(function($item){
            return $item->product->price * $item->quantity;
        });

        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function process(Request $request){
        $cartItems = CartItem::where('user_id', Auth::id())->get();

        try {
            // 'user_id', 'total_amount', 'status'

            DB::beginTransaction();
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'total_amount' => $cartItems->sum(function($item){
                        return $item->product->price * $item->quantity;
                    }),
                    'status' => 'pending',
                ]);

                foreach ($cartItems as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $item->product->price
                    ]);
                }
                CartItem::where('user_id', Auth::id())->delete();
            DB::commit();

            return redirect()->route('orders.index')->with('success', 'Order placed successfully');
        
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
        
    }
}
