<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function addCategory(Request $request) : RedirectResponse {
            $data = $request->validate([
                'name' => 'required|unique:categories,name,NULL,id,store_id,' . auth()->user()->store->id
            ]);
            
            $category = new Category();
            $category->name = $request->name;
            $category->store_id = auth()->user()->store->id;
            $category->save();
    
            return redirect('/storeProfile')->with('success', 'Create Category was Successfull!!');
    }

    public function index() {
        return view('categories', [
            'titlePage' => "Categories",
            'categories' => Category::select('name')->distinct()->get()
        ]);
    }

    public function productByCategory($name) {
        $category = Category::where('name',$name)->first();
        $products = $category->product->load('category','store');

        return view('products', [
            'titlePage' => 'Products by '. $category->name ,
            'products' => $products
        ]);
        
    }

    public function productByIdStore($storeId, $categoryId) {
        $category = Category::where('store_id',$storeId)
                            -> where('id', $categoryId)
                            ->first();
        $products = $category->product()->where('store_id', $storeId)->get();
                       
        return view('category_store', [
            'titlePage' => 'Products by '. $category->store->name .' Store Category of '. $category->name,
            'products' => $products,
            'category' => $category
        ]);
        
    }
}
