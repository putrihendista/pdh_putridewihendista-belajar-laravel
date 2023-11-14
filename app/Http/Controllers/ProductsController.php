<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

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

        $data=new products();
        $data->product_name=$request->product_name;
        $data->category_id=$request->category_id;
        $data->product_code=$request->product_code;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->stock=$request->stock;
        $data->save();

        return redirect()->route('products.view')->with('info', 'Tambah Product berhasil');
    }

    public function ProductEdit($id) {
        // dd('berhasil masuk ke controller edit');

        $editData= products::find($id);
        return view('backend.products.edit_products', compact('editData'));
    }

    public function ProductUpdate(Request $request, $id) {

        $data=products::find($id);
        $data->product_name=$request->product_name;
        $data->category_id=$request->category_id;
        $data->product_code=$request->product_code;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->stock=$request->stock;
        $data->save();

        return redirect()->route('products.view')->with('info', 'Update Product berhasil');
    }

    public function ProductDelete($id) {
        // dd('berhasil masuk ke controller edit');

        $deleteData= products::find($id);
        $deleteData->delete();

        return redirect()->route('products.view')->with('info', 'Delete Product berhasil');
    }
}
