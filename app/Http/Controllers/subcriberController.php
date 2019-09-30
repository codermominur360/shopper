<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
class subcriberController extends Controller
{
    public function subcriber(Request $request)
    {
        $subcriber=array();
        $subcriber['subcriber']=$request->subcriber;
        $subcriberEmail=DB::table('subcriber')
            ->insert($subcriber);
         print_r($subcriberEmail);
        return view('Frontend.Layout.app')->with('subcriberEmail',$subcriberEmail);
    }
}
