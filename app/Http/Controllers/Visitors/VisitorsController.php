<?php

namespace App\Http\Controllers\Visitors;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Brand;
use App\Models\MultiImages;
use App\Models\Slider;
use Illuminate\Http\Request;

class VisitorsController extends Controller
{
    public function home(){
        $sliders = Slider::latest()-> get();
        $brands = Brand::get();
         $about = About::get()->first();
        $images = MultiImages::latest()->get();
        return view('users.home', compact('brands','sliders','about','images'));
    }
    public function blog(){
        return view('users.pages.blog');
    }
    public function services(){
        return view('users.pages.services');
    }
    public function pricing(){
        return view('users.pages.pricing');
    }
    public function contact(){
        return view('users.pages.contact-us');
    }
    public function portfolio(){
        $images = MultiImages::latest()-> get();
        return view('users.pages.portfolio', compact('images'));
    }
    public function team(){
        return view('users.pages.team');
    }
}
