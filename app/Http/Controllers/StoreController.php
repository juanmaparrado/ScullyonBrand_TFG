<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();

        return view('stores.index', compact('stores'));
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
        ]);

        $store = Store::create($validatedData);

        return redirect()->route('stores.index')
            ->with('success', 'Store created successfully!');
    }

    public function edit(Store $store)
    {
        return view('stores.edit', compact('store'));
    }

    public function update(Request $request, Store $store)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
        ]);

        $store->update($validatedData);

        return redirect()->route('stores.index')
            ->with('success', 'Store updated successfully!');
    }

    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->route('stores.index')
            ->with('success', 'Store deleted successfully!');
    }

    public function staff(Store $store)
    {
        $staff = $store->staff; // Obtener los trabajadores de la tienda utilizando la relación

        return view('stores.staff', compact('store', 'staff'));
    }

    public function inventory(Store $store)
    {
        $inventory = $store->inventories;
        return view('stores.stocktaking', compact('inventory'));
    }

}
