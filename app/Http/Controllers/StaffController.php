<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all();
        return view('staff.create' ,compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::all();
        return view('staff.create' ,compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'store_id' => 'required',
            'email' => 'required|email|unique:users',
            'salary' => 'required|numeric',
            'bank_account' => 'required',
        ]);

        $Staff = Staff::create($request->all());

        return redirect()->route('stores.index')->with('success', 'Worker created successfully.');
    }
}
