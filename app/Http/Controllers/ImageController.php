<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('photos.index', compact('images'));
    }

    public function create()
    {
        $products = Product::all();
        return view('photos.create',compact('products'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {

            $image = $request->file('photo')->store('public');
            $photo = Storage::url($image);
            Image::create([
                'product_id' => $request->product_id,
                'url_image' => $photo
            ]);
        }
        return redirect()->route('photos.index');
    }
}


