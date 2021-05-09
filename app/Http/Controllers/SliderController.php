<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Traits\General;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use General;
    public function index(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }
    public function store(SliderRequest $request){
        // return $request;
        $photo= $this -> SaveImageResize($request->file('image'),'frontend/assets/img/slide/',500,200);
        Slider::create([
            'title' => $request -> title,
            'description' => $request -> description,
            'image' => $photo
        ]);
        return redirect()-> route('slider.index')-> with(['success'=> 'تم الحفظ بنجاح']);
    }

    public function edit($id){
        $sliders = Slider::find($id);
        return view('admin.slider.edit',compact('sliders'));
    }
    public function update(SliderRequest $request, $id){
        $sliders = Slider::find($id);
        // photo update
        if($request -> has('image')) {
            $photo = $this -> SaveImageResize($request->file('image'),'frontend/assets/img/slide/',500,500);
            $this -> DeleteImage($sliders->image, 'slide','frontend/assets/img/slide/');
            $sliders->update([
                'image' => $photo
            ]);
        }

        // remain inputs update
        $sliders -> update([
            'title' => $request -> title,
            'description' => $request -> description
        ]);

        return redirect()-> route('slider.index')-> with(['success'=> 'تم الحفظ بنجاح']);
    }

    public function delete($id){
        $slider = Slider::find($id);
        $this -> DeleteImage($slider->image, 'slide','frontend/assets/img/slide/');
        $slider -> delete();
        return redirect()-> route('slider.index')-> with(['success'=> 'تم الحذف بنجاح']);
    }
}
