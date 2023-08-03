<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the products
     */

    public function index()
    {
        $products = Product::latest()->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show  the form for creating a new product
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage
     */

    public function store(Request $request)
    {
        Product::create(array_merge($request->only('name', 'description', 'price', 'status'), [
            'user_id' => auth()->id()
        ]));

        return redirect()->route('products.index')->withSuccess(__('Product created successfully.'));
    }

    /**
     * Display the specified product
     */

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified product
     */
    public function edit(Product $product)
    {
        return view('Products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->only('name', 'description', 'price', 'status'));

        return redirect()->route('products.index')->withSuccess(__('Product updated successfully'));
    }
}
