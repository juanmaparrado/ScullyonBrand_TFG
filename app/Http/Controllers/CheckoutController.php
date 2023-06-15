<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            return view('shop.checkout');
    }
    ///**
    // * Show the form for creating a new resource.
    // *
    // * EN DESARROLLO
    // */

    public function store(Request $request){

        $usuario = User::findOrFail($request->email);
        //crear order
        $order = Order::store([
            'user_id' => $usuario->id,
            'status' => 'processing',
            'total' => Cart::total(),
            'address' => $request->address,
            'city' => $request->city,
        ]);
        //traer los datos del carrito y recorrerlos para crear orderItems y order
        $cart = Cart::content();
        foreach($cart as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
                'price' => $item->model->price,
            ]);
        }
        dd($order);
        dd($cart);
        Cart::destroy();
        
    }

    
}
