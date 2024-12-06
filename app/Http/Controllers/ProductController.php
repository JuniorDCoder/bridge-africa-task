<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Products/NewProduct', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'required|string',
            'price' => 'required|numeric',
            'giveaway_price' => 'nullable|numeric|lt:price',
            'in_stock' => 'required|boolean',
            'image' => 'required|file|image|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'file|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        // Handle main image upload and store in public/storage/products
        $data['image'] = $request->file('image')->store('products', 'public');

        // Handle additional images
        $data['images'] = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $data['images'][] = $file->store('products', 'public'); // Store in public/storage/products
            }
        }

        // Create product
        $product = Product::create([
            'name' => $data['name'],
            'user_id' => auth()->id(),
            'description' => $data['description'],
            'details' => $data['details'],
            'price' => $data['price'],
            'giveaway_price' => $data['giveaway_price'] ?? null,
            'in_stock' => $data['in_stock'],
            'image' => $data['image'],
            'category_id' => $data['category_id'],
        ]);

        // Save additional images if uploaded
        foreach ($data['images'] as $path) {
            $product->images()->create(['image_path' => $path]);
        }

        return redirect()->route('my-products')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $categories = Category::all();

        return inertia('Products/EditProduct', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'giveaway_price' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);

        // Update product details
        $product->update($request->only('name', 'description', 'price', 'giveaway_price', 'category_id'));

        return redirect()->route('my-products', $product->id)->with('success', 'Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(Product $product)
    {
        // Check if the authenticated user is the owner of the product
        if ($product->user_id !== auth()->id()) {
            return redirect()->route('products.index')->with('error', 'You are not authorized to delete this product.');
        }

        // Delete the product image
        if (Storage::exists('public/storage/products/' . $product->image)) {
            Storage::delete('public/storage/products/' . $product->image);
        }

        // Delete additional images
        foreach ($product->images as $image) {
            if (Storage::exists('public/storage/products/' . $image->image_path)) {
                Storage::delete('public/storage/products/' . $image->image_path);
            }
        }

        // Delete the product record and its associated images
        $product->images()->delete();
        $product->delete();

        return redirect()->route('my-products')->with('success', 'Product deleted successfully!');
    }

}
