<?php

namespace App\Http\Controllers;

use App\Http\Requests\MultiRequest;
use App\Models\MultiImages;
use App\Traits\General;
use Illuminate\Http\Request;

class MultiController extends Controller
{
    use General;
    public function muim(){
         $images = MultiImages::get();
        return view('admin.multimage.index',compact('images'));
    }
    public function store(MultiRequest $request){
      // return $request;
       $images =  $request -> file('image');
         foreach($images as $image){
       // $photos = $this -> saveImage($image, 'images/multi-images');
          $photos = $this -> SaveImageResize($image,'images/multi-images','1600','1200');
        MultiImages::insert([
            'images' => $photos
        ]);
         }
        return redirect()->route('multi.images')-> with(['success'=> 'تم الحفظ بنجاح']);

    }
}
