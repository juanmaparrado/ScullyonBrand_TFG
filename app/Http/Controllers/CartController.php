<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('shop.cart');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart')->with('success_message', 'Item is already in your cart!');
        }
        
        if($request->size == null){
            Cart::add($request->id, $request->name, 1, $request->price , ['size' => 'L'])
            ->associate('App\Models\Product');
        }
        else{
            Cart::add($request->id, $request->name, 1, $request->price , ['size' => $request->size])
            ->associate('App\Models\Product');
        }
        //dd(Cart::content());
        return redirect()->route('cart')->with('success_message', 'Item was added to your cart!');
    }

    public function empty()
    {
        Cart::destroy();

        return redirect()->route('cart')->with('success_message', 'Your cart has been cleared!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Item has been removed!');
    }
}
