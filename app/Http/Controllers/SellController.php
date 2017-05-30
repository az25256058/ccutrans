<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;

class SellController extends Controller
{
    public function index()
    {
        return view('sell');
    }

    public function store(UploadRequest $request){



       foreach($request->image as $photo){

           $filename = $photo->store('photos');

           Photo::create([

              'product_id' =>$product
               'photo'

           ]);


       }
    }

}
