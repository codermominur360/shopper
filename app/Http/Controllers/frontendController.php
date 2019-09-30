<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
session_start();

class frontendController extends Controller
{
    public function index()
    {
        $sliderImage = DB::table('sliders')
            ->where('status', 1)
            ->get();
        $productShow = DB::table('product')
//            ->join('category', 'product.product_id', '=', 'category.category_id')
            ->join('menufacture', 'product.menufacture_id', '=', 'menufacture.menufacture_id')
//            ->select('product.*', 'category.category_name', 'menufacture.menufacture_name')
            ->where('product.status', 1)
            ->limit(9)
            ->get();

        return view('Frontend.home')
            ->with('productShow', $productShow)
            ->with('sliderImage', $sliderImage) ;
    }

    public function showproduct_by_category($category_id)
    {
        $show_product_by_category = DB::table('product')
            ->join('category', 'product.product_id', '=', 'category.category_id')
            ->join('menufacture', 'product.menufacture_id', '=', 'menufacture.menufacture_id')
            ->select('product.*', 'category.category_name', 'menufacture.menufacture_name')
            ->where('category.category_id', $category_id)
            ->limit(9)
            ->get();
        print_r($show_product_by_category);
        exit();
        return view('Frontend.Pages.category_by_product')
            ->with('show_product_by_category', $show_product_by_category);
    }


}
