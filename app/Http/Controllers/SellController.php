<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellController extends Controller
{
    public function index()
    {
        return view('sell');
    }

    public function store(Request $request){

       $product = Product::insertGetId([

            'name' =>$request->input('name'),
            'price' =>$request->input('price'),
            'category'=>$request->input('category'),
            'amount'=>$request->input('amount'),
            'description'=>$request->description,
            'user_id'=>Auth::id()
        ]);

       echo $request->image->path();

       foreach($request->image as $photo){
            echo $photo;
           $filename = $photo->store('photos');

           Photo::insert([

              'product_id' =>$product,
               'photo_name' =>$filename,
               'photo_type' =>'png'

           ]);


       }
        return redirect('/seller');
    }

}
