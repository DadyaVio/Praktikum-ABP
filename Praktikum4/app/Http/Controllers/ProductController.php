<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Berhasil tambah');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Berhasil update');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Berhasil hapus');
    }
}