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
        $purchases = Purchase::where('user_id',Auth::id())
                     ->with('product','user')
                    ->get();


        return view('purchase',compact('purchases'));
    }

    public function destroy($pid){

        DB::table('purchases')
            ->where([

                ['user_id',Auth::id()],
                ['product_id',$pid],

            ])->delete();


        return redirect('purchaser');

    }


}
