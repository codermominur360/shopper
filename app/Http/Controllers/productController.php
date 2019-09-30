<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;
use DB;
use Session;
session_start();

class productController extends Controller
{

    public function index()
    {
        $products=DB::table('product')
                ->join('category','product.category_id','=','category.category_id')
                ->join('menufacture','product.menufacture_id','=','menufacture.menufacture_id')
                ->get();
        return view('Backend.Pages.Product.index')->with('products',$products);
    }


    public function create()
    {
        return view('Backend.Pages.Product.create');
    }


    public function store(Request $request)
    {

        $product=array();
        $product['product_name']=$request->product_name;
        $product['category_id']=$request->category_id;
        $product['menufacture_id']=$request->menufacture_id;
        $product['product_short_description']=$request->product_short_description;
        $product['product_long_description']=$request->product_long_description;
        $product['product_price']=$request->product_price;
        $product['product_size']=$request->product_size;
        $product['product_color']=$request->product_color;
        $product['status']=$request->status;


        DB::table('product')->insert ($product);
        Session::put('message','You Product Inserted withour Product Image');
        return Redirect::to('/product');
    }

    public function show($id)
    {
        //
    }


    public function edit($product_id)
    {

         $product=DB::table('product')
             ->where('product_id',$product_id)
             ->first();
         return view('Backend.Pages.Product.edit')->with('product',$product);
    }


    public function update_product(Request $request, $product_id)
    {
        $product=array();
        $product['product_name']=$request->product_name;
        $product['category_id']=$request->category_id;
        $product['menufacture_id']=$request->menufacture_id;
        $product['product_short_description']=$request->product_short_description;
        $product['product_long_description']=$request->product_long_description;
        $product['product_price']=$request->product_price;
        $product['product_size']=$request->product_size;
        $product['product_color']=$request->product_color;

        DB::table('product')
            ->where('product_id',$product_id)
            ->update($product);
        Session::put('message','Your Product Updated Successfully done !');
        return Redirect::to('/product');
    }


    public function destroy_product($product_id)
    {
        DB::table('product')
            ->where('product_id',$product_id)
            ->delete();
        Session::put('message','Your Product Delete Successfully Done !');
        return Redirect::to('/product');
    }
}
