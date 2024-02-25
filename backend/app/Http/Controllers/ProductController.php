<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/products');

        $products = $response->json();

        return view('view', compact('products'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
    
        $response = Http::post('http://127.0.0.1:8000/api/products', $validated);
        return redirect('/')->with('message', 'Product added successfully!');
    }

    /**
     * Display the specified product.
     */
    public function show(string $id)
    {
        $response = Http::get("http://127.0.0.1:8000/api/products/{$id}");
        return $response->json();
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/products/{$id}", $request->all());
        if($response->successful()){
            return("Product update successfully");
        } else{
            return("error");
        }

        // return $response->json();
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://127.0.0.1:8000/api/products/{$id}");
        if($response->successful()){
            return("Product deleted successfully");
        } else{
            return("error");
        }
    }
    
    public function edit($id)
    {
        $response = Http::get("http://127.0.0.1:8000/api/products/{$id}");

        $product = $response->json();

        return view('edit', compact('product'));
    }
    
    public function viewForm(){
        return view('form');
    }
}
