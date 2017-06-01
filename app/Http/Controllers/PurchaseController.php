<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Purchase;


class PurchaseController extends Controller
{
    public function index()
    {

        $purchases = DB::table('purchases')
                ->join('products','purchases.product_id','=','products.id')
                ->join('users','users.id','=','products.user_id')
                ->where('purchases.user_id',Auth::id())
                ->select('products.price','products.name','purchases.amount','users.facebook_id')
                ->get();
        return view('purchase',compact('purchases'));
    }


}
