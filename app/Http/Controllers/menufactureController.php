<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();
class menufactureController extends Controller
{

    public function index()
    {
        $menufactures=DB::table('menufacture')->get();
        return view('Backend.Pages.Menufacture.index')->with('menufactures',$menufactures);
    }

    public function create()
    {
        return view('Backend.Pages.Menufacture.create');
    }


    public function store(Request $request)
    {
        $menufactures=array();
        $menufactures['menufacture_name']= $request->menufacture_name;
        $menufactures['menufacture_description']= $request->menufacture_description;
        $menufactures['status']=0;
         DB::table('menufacture')->insert($menufactures);
         Session::put('message','You Menufacture Product is Store Database');
        return Redirect::to('/menufacture');
    }


    public function show($id)
    {
        //
    }

    public function edit($menufacture_id)
    {
        $menufacture=DB::table('menufacture')
            ->where('menufacture_id',$menufacture_id)
            ->first();
        return view('Backend.Pages.Menufacture.edit')->with('menufacture',$menufacture);
    }


    public function update_menufacture(Request $request,$menufacture_id)
    {

        $menufacture=array();
        $menufacture['menufacture_name']= $request->menufacture_name;
        $menufacture['menufacture_description']= $request->menufacture_description;
         DB::table('menufacture')
             ->where('menufacture_id',$menufacture_id)
             ->update($menufacture);
        Session::put('message','You Menufacture Product is Store Database');
        return Redirect::to('/menufacture');
    }


    public function destroy_menufacture($menufacture_id)
    {
        DB::table('menufacture')
            ->where('menufacture_id',$menufacture_id)
            ->delete();
        Session::put('massage','You Brand Producted is Delete');
        return Redirect::to('/menufacture');
    }
}
