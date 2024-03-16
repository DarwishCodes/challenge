<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(['status' => 'success', 'data' => Product::all()], 200);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['status' => 'fail','message' => 'Product not found'], 404);
        }
        return response()->json(['status' => 'success', 'data' => $product], 200);
    }

    public function store(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'name' => 'required|unique:products',
                'price' => 'required|numeric|min:0',
                'quantity' => 'required|integer|min:0',
            ]);

        } catch (ValidationException $e) {
            return response()->json(['status' => 'fail','errors' => $e->errors()], 422);
        }

        $data = new Product;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->save();
        return response()->json(['status' => 'success', 'data' => $data], 200);
    }
}
