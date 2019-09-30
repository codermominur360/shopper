<?php

namespace App\Http\Controllers;

use App\sellMan;
use Illuminate\Http\Request;
use DB;
use Session;
session_start();

class sellManController extends Controller
{

    public function index()
    {
        $sellmans= DB::table('sell_men')->get();

        return view('Backend.Pages.Sellman.index')->with('sellmans',$sellmans);
    }


    public function create()
    {
        return view('Backend.Pages.Sellman.create');
    }


    public function store(Request $request)
    {
        if($request->hasFile('sell_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('sell_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('sell_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('sell_image')->storeAs('public/sellman', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $Sellman= new sellMan();

        $Sellman->sellman_name = $request->sellman_name;
        $Sellman->status = $request->status;
        $Sellman->sell_image = $path;
        $Sellman->save();

        return redirect('/sellman');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $sellman= DB::table('sell_men')
            ->where('id',$id)
            ->first();
        return view('Backend.Pages.Sellman.edit')->with('sellman',$sellman);
    }


    public function update(Request $request, $id)
    {
        if($request->hasFile('sell_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('sell_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('sell_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('sell_image')->storeAs('public/sellman', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $sellman=array();
        $sellman['sellman_name']=$request->sellman_name;
        $sellman['sell_image']=$request->sell_image;
        $sellman['status']=$request->status;

        $sellmandb= DB::table('sell_men')
            ->where('id',$id)
            ->update($sellman);
        Session::put('message','Your Sell Man Update now ');
        return Redirect('sellman')->with('sellmandb',$sellmandb);

    }


    public function destroy($id)
    {
        DB::table('sell_men')
            ->where('id',$id)
            ->delete();
        Session::put('message','Your Sell Man Delete Successfully now ');
        return Redirect('/sellman');
    }
}
