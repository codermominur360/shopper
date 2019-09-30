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
            ->join('category', 'product.category_id', '=', 'category.category_id')
            ->join('menufacture', 'product.menufacture_id', '=', 'menufacture.menufacture_id')
            ->select('product.*', 'category.category_name', 'menufacture.menufacture_name')
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
            ->join('category', 'product.category_id', '=', 'category.category_id')
            ->select('product.*', 'category.category_name')
            ->where('category.category_id', $category_id)
            ->where('product.status', 1)
            ->limit(9)
            ->get();

        return view('Frontend.Pages.category_by_product')
            ->with('show_product_by_category', $show_product_by_category);
    }

 public function showproduct_by_menufacture($menufactue_id)
    {

        $show_product_by_menufacture = DB::table('product')
            ->join('menufacture', 'product.menufacture_id', '=', 'menufacture.menufacture_id')
            ->select('product.*', 'menufacture.menufacture_id')
            ->where('menufacture.menufacture_id', $menufactue_id)
            ->where('product.status', 1)
            ->limit(9)
            ->get();

        return view('Frontend.Pages.menufacture_by_product')
            ->with('show_product_by_menufacture', $show_product_by_menufacture);
    }

    public function productDetails($product_id)
    {

        $productDetials = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.category_id')
            ->join('menufacture', 'product.menufacture_id', '=', 'menufacture.menufacture_id')
            ->select('product.*', 'category.category_name', 'menufacture.menufacture_name')
            ->where('product.product_id',$product_id)
            ->where('product.status', 1)
            ->first();

        return view('Frontend.Pages.product_details')
            ->with('productDetials', $productDetials) ;
    }


}
