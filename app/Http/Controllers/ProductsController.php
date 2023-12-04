<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function ProductView() {
        // $allDataUser=User::all();
        $data['allDataPr']=products::all();
        return view('backend.products.view_products', $data);
    }

    public function ProductAdd() {
        // $allDataUser=User::all();
        // $data['allDataUser']=User::all();
        return view('backend.products.add_products');
    }

    public function ProductStore(Request $request) {

        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
            'product_code' => 'required|string|unique:products,product_code',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
    
        $data = new products();
        $data->product_name = $validatedData['product_name'];
        $data->category_id = $validatedData['category_id'];
        $data->product_code = $validatedData['product_code'];
        $data->description = $validatedData['description'] ?? null;
        $data->price = $validatedData['price'];
        $data->stock = $validatedData['stock'];
        $data->save();

        return redirect()->route('products.view')->with('info', 'Tambah Product berhasil');
    }

    public function ProductEdit($id) {
        // dd('berhasil masuk ke controller edit');

        $editData= products::find($id);
        return view('backend.products.edit_products', compact('editData'));
    }

    public function ProductUpdate(Request $request, $id) {

        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
            'product_code' => 'required|string|unique:products,product_code,'.$id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
    
        $data = products::find($id);
        $data->product_name = $validatedData['product_name'];
        $data->category_id = $validatedData['category_id'];
        $data->product_code = $validatedData['product_code'];
        $data->description = $validatedData['description'] ?? null;
        $data->price = $validatedData['price'];
        $data->stock = $validatedData['stock'];
        $data->save();

        return redirect()->route('products.view')->with('info', 'Update Product berhasil');
    }

    public function ProductDelete($id) {
        // dd('berhasil masuk ke controller edit');

        $deleteData= products::find($id);
        $deleteData->delete();

        return redirect()->route('products.view')->with('info', 'Delete Product berhasil');
    }

    public function chart() {
        $productCategories = DB::table('products')
        ->select('category_id', DB::raw('count(*) AS total_products'), DB::raw('SUM(price) AS total_price'),
        DB::raw('SUM(stock) AS total_stock'))
        ->groupBy('category_id')
        ->get();

    $categories = $productCategories->pluck('category_id')->toArray();
    $totalProducts = $productCategories->pluck('total_products')->toArray();
    $totalPrice = $productCategories->pluck('total_price')->toArray();
    $totalStock = $productCategories->pluck('total_stock')->toArray();

    return view('backend.products.products_grafis', compact('categories', 'totalProducts', 'totalPrice', 'totalStock'));
    }
}