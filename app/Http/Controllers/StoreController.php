<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index() {
        return view('create_store', [
            'titlePage' => 'Create Store'
        ]);
    }

    public function createStore(Request $request) : RedirectResponse {
        $data = $request->validate([
            'name' => ['required', 'unique:stores']
        ]);

        $store = new Store();
        $store->name = $request->name;
        $store->user_id = Auth::id();
        $store->save();

        return redirect('/home')->with('success', 'Create Store was Successfull!!');
    }

    public function viewStore(){
        $user = auth()->user();
        $store = $user->store;

        return view('store', [
            'titlePage' => $store->name,
            'store' => $store,
            'categories' => $store->category
        ]);
    }
}
