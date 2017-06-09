<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\File;
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
        $products = Product::where('user_id', Auth::id())
                    ->with('purchases')
                    ->get();
        return view('sell', compact('products'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'category' => 'required|integer|min:1|max:9',
            'amount' => 'required|integer|min:0',
            'images.*' => 'required|image',
        ]);

        $files = $request->file('images');

        /*foreach ($files as $image){
            $this->validate($image,['image' => 'required']);
        }*/


        $product = Product::create([
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

            Photo::create([
                'product_id' => $product->id,
                'photo_name' => $photo_name,
                'photo_type' => $photo_type,
            ]);
        }
        return redirect('/seller');
    }

    public function showDetails($product_id){
        $product = Product::findOrFail($product_id);

        $result = [];

        foreach ($product->photos as $photo)
        {
            $result[] = [
            ];
        }

        return response()->json(['response'=> Storage::get('public/ab6a15bf7f7d25194ab3a00682d90c4b-KZAmEjyh.jpeg')]);
    }

    public function update(Request $request){

        $this->validate($request,[

            'price' => 'required|integer|min:0',
            'amount' => 'required|integer|min:0',

        ]);

        $products = Product::find($request->productid);
        $products->price = $request->price;
        $products->amount = $request->amount;
        $products->description = $request->description;
        $products->save();

        return redirect('/seller');

    }

    public function destroy($pid){

        $products = Product::findOrFail($pid);
        $products->delete();

        return redirect('/seller');

    }

}
