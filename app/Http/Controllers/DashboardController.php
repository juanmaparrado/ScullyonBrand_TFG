<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Store;
use App\Models\Review;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener el ranking de productos más vendidos
        $topProducts = Product::withCount('orderItems')
            ->orderBy('order_items_count', 'desc')
            ->limit(10)
            ->get();

        // Obtener el total de dinero generado
        $totalRevenue = Order::sum('total');

        // Obtener las tiendas con menos inventario
        $storesWithLowInventory = Store::withCount('inventories')
            ->orderBy('inventories_count')
            ->limit(5)
            ->get();

        // Obtener los productos con más reviews
        $topReviewedProducts = Product::withCount('reviews')
            ->orderBy('reviews_count', 'desc')
            ->limit(10)
            ->get();

        // Obtener el número de pedidos completados
        $completedOrders = Order::where('status', 'completed')->count();
        $totalUsers = User::count();

        return view('dashboard', compact('topProducts', 'totalRevenue', 'storesWithLowInventory', 'topReviewedProducts', 'completedOrders', 'totalUsers'));
    }
}
