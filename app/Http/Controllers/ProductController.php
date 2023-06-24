<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        if(Auth::user()->status){
            $products = Product::all();
            return view('products.adminindex', compact('products'));
        }
        
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->status) {
            return view('products.create');
        }

        return redirect('products');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:150',
            'product_description' => 'required|string|max:250',
            'product_image' => 'nullable|image|max:2048',
            'price' => 'required|integer|min:1',
            'quantity' => 'nullable|integer'
        ]);

        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->product_description = $request->input('product_description'); 
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $product->product_image = $filePath;
        }

        $product->save();
        
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(Auth::user()->status){
            $product = Product::find($id);
            return view('products.edit', compact('product'));
        }

        return redirect()->route('products.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        if(Auth::user()->status){
            $product = Product::find($id);
            $request->validate([
                'product_name' => 'required|string|max:150',
                'product_description' => 'required|string|max:250',
                'product_image' => 'nullable|image|max:2048',
                'price' => 'required|integer|min:1',
                'quantity' => 'nullable|integer'
            ]);

            $product->product_name = $request->input('product_name');
            $product->product_description = $request->input('product_description'); 
            $product->quantity = $request->input('quantity');
            $product->price = $request->input('price');

            if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');
                $product->product_image = $filePath;
            }

            $product->save();

        }

        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product =Product::find($id);
        if(Auth::user()->status){
            $product->delete();
        }

        return redirect()->route('products.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Toggle the status
        $product->status = !$product->status;

        // Save the changes
        $product->save();

        return redirect()->back()->with('success', 'Product status updated successfully.');
    }

}