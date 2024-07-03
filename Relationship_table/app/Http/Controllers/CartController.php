<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->get();
        return view('cart.index', compact('cartItems'));
    }
    public function store(Request $request)
    {
        $cart = Cart::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);
        return redirect()->route('cart.index');
    }
}
