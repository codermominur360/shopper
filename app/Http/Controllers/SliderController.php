<?php

namespace App\Http\Controllers;
use DB;
use App\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class SliderController extends Controller
{

    public function index()
    {
        $sliderImage= DB::table('sliders')->get();
        return view('Backend.Pages.Slider.AllSlider')->with('sliderImage',$sliderImage);
    }


    public function create()
    {
        return view('Backend.Pages.Slider.AddSlider');
    }

    public function store(Request $request)
    {
        if($request->hasFile('slider_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('slider_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('slider_image')->storeAs('public/slider', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $sliderImage= new slider();

        $sliderImage->status = $request->status;
        $sliderImage->slider_image = $path;
        $sliderImage->save();

        return redirect('/sliderImage');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($slider_id)
    {
        DB::table('sliders')
            ->where('slider_id',$slider_id)
            ->delete();
        Session::put('message','Slider Image is Deleted');
        return Redirect::to('/sliderImage');
    }
    public function unactive_slider($slider_id)
    {
        DB::table('sliders')
            ->where('slider_id',$slider_id)
            ->update(['status'=>0]);
        Session::put('message','Your Slider is De-active Now!');
        return Redirect::to('/sliderImage');
    }
    public function active($slider_id)
    {
        DB::table('sliders')
            ->where('slider_id',$slider_id)
            ->update(['status'=>1]);
        Session::put('message','Your Slider is Active Now!');
        return Redirect::to('/sliderImage');
    }
}
