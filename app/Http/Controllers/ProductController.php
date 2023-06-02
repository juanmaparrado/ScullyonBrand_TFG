<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all(); 
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'url_image' => 'required',
            'category_id' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all(); 
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => ['required','numeric'],
            'stock' => 'required',
            'url_image' => 'required',
            'category_id' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function showReviews($productId)
    {
        $product = Product::findOrFail($productId);
        $reviews = Review::where('product_id', $productId)->get();

        $reviewsWithUser = $reviews->map(function ($review) {
            $user = User::findOrFail($review->user_id);
            $review->user_name = $user->name;
            return $review;
        });

        return view('products.reviews', [
            'product' => $product,
            'reviews' => $reviewsWithUser,
        ]);
    }

}
