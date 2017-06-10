<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($category)
    {
        if ($category==0) {
            $products = Product::latest()->paginate(18);
            return view('product', ['products' => $products]);
        } else {
            $products = Product::latest()->where('category', (int)$category)->paginate(10);
            return view('product', ['products' => $products]);
        }
    }

    public function detail($pid)
    {
        $product = Product::where('id', $pid )->first();
        return view('detail', compact('product'));
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

    public function comment($pid, Request $request)
    {
        $this->validate($request,[
            'comment' => 'required|string|max:200',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'product_id' => $pid,
            'comment' => $request->comment,
        ]);

        return redirect()->back();
    }


}
