<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class cartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productdet=$request->product_id;
            $productinfo=DB::table('product')
                ->where('product_id',$productdet)
                ->first();
            echo '<pre>';
            print_r($productinfo);
            echo '</pre>';
    }
}
