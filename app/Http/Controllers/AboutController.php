<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about = About::latest()-> get();
        return view('admin.about.index', compact('about'));
    }

    public function create(){
        return view('admin.about.create');
    }

    public function store(AboutRequest $request){
       //  return $request;
        About::create([
            'title' => $request -> title,
            'shor_des' => $request -> shor_des,
            'lon_des' => $request -> lon_des,
        ]);
        return redirect()-> route('about.index')-> with(['success'=> 'تم الحفظ بنجاح']);
    }

    public function edit($id){
        $about = About::find($id);
        return view('admin.about.edit',compact('about'));
    }
    public function update(AboutRequest $request, $id){
        $about = About::find($id);
        $about->update([
            'title' => $request -> title,
            'shor_des' => $request -> shor_des,
            'lon_des' => $request -> lon_des,
            ]);

        return redirect()-> route('about.index')-> with(['success'=> 'تم الحفظ بنجاح']);
    }

    public function delete($id){
        $about = About::find($id);
        $about -> delete();
        return redirect()-> route('about.index')-> with(['success'=> 'تم الحذف بنجاح']);
    }
}
