<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index(){
        return view('products',[
            'titlePage' => 'Products',
            'products' => Product::all()
        ]);
    }

    public function storeAddProduct(Request $request, $storeId, $categoryId){
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $product = new Product();

        (int) $price = $request->price;
        (int) $stock = $request->stock;

        $product->name = $request->name;
        $product->stock = $stock;
        $product->price = $price;
        $product->category_id = $categoryId;
        $product->store_id = $storeId;

        $product->save();

        return back()->with('success', 'Product was Added!');
    }

    public function deleteProduct ($productId) {
        $product = Product::findOrFail($productId);

        $product->delete();

        return Redirect::back()->with('success', 'Produk was deleted!.');
    }

    public function editProduct(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);

        // Perbarui atribut produk sesuai data input
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;

        // Simpan perubahan ke dalam database
        $product->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Produk was Updated!.');
    }

    public function getProductById ($productId) {
        $product = Product::findOrFail($productId);
        $store = Store::where('id', $product->store_id)
                            ->first();

        return view('product', [
            'titlePage' => $product->name,
            'product' => $product,
            'products' => $store->product
        ]);
        
    }
}
