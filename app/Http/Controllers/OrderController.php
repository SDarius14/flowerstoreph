<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->status){
            $orders = Order::all();
            return view('orders.index', compact('orders'));
        }
            $orders = Order::where('user_id', Auth::id())->get();
            return view('orders.index', compact('orders'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Authenticate user
         if(Auth::user()){
            $id = $request->input('id');
            $product = Product::find($id);
            
            $order = new Order();
            $order->user_id = Auth::id();
            $order->product_id = $product->id;
            $order->price = $product->price; 
            $order->save();

            return redirect()->route('products.index')->with('success', 'Successfully added to orders.');

         }

        return redirect()->route('login');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
    
}