<?php

namespace App\Http\Controllers;

use App\Product;
use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('product', ['products' => $products]);
    }

    public function purchase($pid, Request $request)
    {
        $exists = Purchase::where('user_id', Auth::id())
            ->where('product_id', $pid)
            ->get();


        if (count($exists) == 0) {

            Purchase::create([
                'user_id' => Auth::id(),
                'product_id' => $pid,
                'amount' => $request->amount,
            ]);
        } else {
            Purchase::where('user_id', Auth::id())
                ->where('product_id', $pid)
                ->increment('amount', $request->amount);
        }

        return redirect()->back();
    }


}
