<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class SellController extends Controller
{
    public function index()
    {
        return view('sell');
    }

    public function store(Request $request)
    {
        /*$this->validate($request,[
            'name' => 'required',
            'price' => ''
        ]);*/

        $files = $request->file('images');


        $product = Product::insertGetId([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'amount' => $request->amount,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);


        foreach ($files as $file) {

            $photo_name = sprintf('%s-%s', md5(microtime(true)), str_random(8) );
            $photo_type = sprintf('%s', $file->guessExtension());

            $file->storeAs('public', $photo_name.'.'.$photo_type);

            Photo::insert([
                'product_id' => $product,
                'photo_name' => $photo_name,
                'photo_type' => $photo_type,
            ]);
        }
        return redirect('/seller');
    }

}
