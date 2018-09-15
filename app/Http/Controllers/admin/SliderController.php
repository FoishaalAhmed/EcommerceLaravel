<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.show',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.slider.slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required',
        ]);
        if ($request->hasFile('image')){
            $image=$request->file('image');
            $slider_img_name=$image->getClientOriginalName();
            $ext1 = $request->image->getClientOriginalExtension();
            $slider_img_name=time().'.'.$ext1;
            $upload_path_for_slider_img='uploaded_files/slider-img/';
            $image->move( $upload_path_for_slider_img,$slider_img_name);
        }
        $sliders = new Slider;
        $sliders->image = $slider_img_name;
        $sliders->save();
        return redirect()->back()->with(['success'=>'Slider Added Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
         return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'image' => 'required',
        ]);
        if ($request->hasFile('image')){
            $image=$request->file('image');
            $slider_img_name=$image->getClientOriginalName();
            $ext1 = $request->image->getClientOriginalExtension();
            $slider_img_name=time().'.'.$ext1;
            $upload_path_for_slider_img='uploaded_files/slider-img/';
            $image->move( $upload_path_for_slider_img,$slider_img_name);
        }
        $sliders = Slider::find($id);
        $sliders->image = $slider_img_name;
        $sliders->save();
        return redirect()->back()->with(['success'=>'Slider Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::destroy($id);
        return redirect()->back()->with(['success'=>'Slider Deleted Successfully']);
    }
}
