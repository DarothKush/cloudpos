<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

// 2|gkhAJzHgYZ1i9acTekNQZXNjxF7DkYubTdeuHXx29d0812ea

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['seller'])->paginate(10);
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        $data=$request->validated();
        $product=Product::create($data);
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        if(!$product){
            return response()->json(['message'=>'Product not found'],404);
        }
        return response()->json($product);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }
        $product->update($validatedData);

        // Return the updated product and a success response
        return response()->json([
            'message' => 'Product successfully updated.',
            'product' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(!$product){
            return response()->json(['message'=>'Product not found'],404);
        }
        $product->delete();
        return response()->json(['message' => 'Product successfully deleted.'], 200);
    }
}
