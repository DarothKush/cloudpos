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
        $response = Http::post('http://127.0.0.1:8000/api/products', $request->all());
        return $response->json();
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
        return $response->json();
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://127.0.0.1:8000/api/products/{$id}");
        return $response->json();
    }
}
