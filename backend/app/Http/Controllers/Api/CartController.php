<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $sessionId = $request->header('X-Session-ID', 'guest');
        $carts = Cart::with('product')->where('session_id', $sessionId)->get();
        
        return response()->json($carts);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $sessionId = $request->header('X-Session-ID', 'guest');
        
        $cart = Cart::updateOrCreate(
            [
                'product_id' => $validated['product_id'],
                'session_id' => $sessionId
            ],
            [
                'quantity' => $validated['quantity']
            ]
        );

        return response()->json($cart->load('product'), 201);
    }

    public function update(Request $request, Cart $cart)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart->update($validated);
        return response()->json($cart->load('product'));
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response()->json(['message' => 'Cart item deleted successfully']);
    }
}