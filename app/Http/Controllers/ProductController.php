<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\CreateUserRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(['welcome' => 'this stupid world']);
    }

    public function store(CreateProductRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::user()->id;

        $product = Product::create($data);

        return response()->json($product);

    }

    public function show()
    {
        $product = Product::all();

        return response()->json($product);
    }

    public function showProd()
    {

        $product = Auth::user()->products;
//        dd($product);
        return response()->json($product);
    }

    public function update(CreateProductRequest $request, $id)
    {
        $data = $request->validated();

        $product = Product::find($id)->update($data);

        return response()->json($product);

    }

    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return response()->json(['success' => 'Product Successfully Deleted']);
    }

}
