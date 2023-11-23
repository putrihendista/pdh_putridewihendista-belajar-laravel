<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
// use Auth;

class AuthController extends Controller
{
    public function createproducts(Request $request) {
        $Products = new Products();

        $Products->product_name=$request->input('product_name');
        $Products->category_id=$request->input('category_id');
        $Products->product_code=$request->input('product_code');
        $Products->description=$request->input('description');
        $Products->price=$request->input('price');
        $Products->stock=$request->input('stock');

        $Products->save();
        return response()->json($Products);
    }

    public function read() {
        $Products = Products::all();
        return response()->json($Products);
    }

    public function readbyId($id) {
        $Products = Products::find($id);
        return response()->json($Products);
    }

    public function updateproducts(Request $request, $id) {
        $Products = Products::find($id);

        $Products->product_name=$request->input('product_name');
        $Products->category_id=$request->input('category_id');
        $Products->product_code=$request->input('product_code');
        $Products->description=$request->input('description');
        $Products->price=$request->input('price');
        $Products->stock=$request->input('stock');

        $Products->save();
        return response()->json($Products);
    }

    public function deletebyId(Request $request, $id) {
        $Products = Products::find($id);
        $Products->delete();

        return response()->json($Products);
    }
}