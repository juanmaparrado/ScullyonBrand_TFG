<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Obtener una lista de todos los pedidos con los datos del usuario
        $orders = Order::with('user')->get();
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        // Crear un nuevo pedido y asociarlo al usuario
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:processing,shipping,completed,declined,cancelled',
            'payment_method' => 'required|in:credit_card,paypal',
            'total' => 'required|numeric',
            'address' => 'required|string',
            'city' => 'required|string',
        ]);

        $order = Order::create($data);

        return redirect()->route('orders.show', $order->id);
    }

    public function show($id)
    {
        $order = Order::with('user', 'orderItems.product')->findOrFail($id);
        
        return view('orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        // Actualizar un pedido específico por su ID
        $data = $request->validate([
            'user_id' => 'exists:users,id',
            'status' => 'in:processing,shipping,completed,declined,cancelled',
            'payment_method' => 'in:credit_card,paypal',
            'total' => 'numeric',
            'address' => 'string',
            'city' => 'string',
        ]);

        $order = Order::findOrFail($id);
        $order->update($data);

        return redirect()->route('orders.show', $order->id);
    }

    public function destroy($id)
    {
        // Eliminar un pedido específico por su ID
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index');
    }
}

