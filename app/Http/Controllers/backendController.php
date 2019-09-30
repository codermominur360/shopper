<?php

namespace App\Http\Controllers;

use App\category;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class backendController extends Controller
{
    public function index()
    {
        return view('Backend.Pages.login');
    }

    public function admin_deshboard(Request $request)
    {
        $admin_email=$request->admin_email;
        $admin_password=$request->admin_password;
        $result=DB::table('admin')
                ->where('admin_email',$admin_email)
                ->where('admin_password',$admin_password)
                ->first();

            if($result){
                session::put('admin_id',$result->admin_id);
                Session::put('admin_name',$result->admin_name);
                return Redirect::to('/dashboard');
            }else{
                $messege=$request->session()->put('message', 'Email and password not found');
                  return redirect('/admin')->with('message',$messege);
            }
    }


    /** Category Controller active and deactive route function**/
    public function unactive_ctry($category_id)
    {
        DB::table('category')
            ->where('category_id',$category_id)
            ->update(['status'=> 0]);
        Session::put('message','Category is De-active now !');
        return Redirect::to('/category');
    }

    public function active_ctry($category_id)
    {
        DB::table('category')
            ->where('category_id',$category_id)
            ->update(['status'=> 1]);
        Session::put('message','Category is actived now!');
        return Redirect::to('/category');
    }


    /** Brand Controller active and deactive route function**/
    public function unactive_menufact($menufacture_id)
    {
        DB::table('menufacture')
            ->where('menufacture_id',$menufacture_id)
            ->update(['status'=> 0]);
        Session::put('message','Brand is De-active now !');
        return Redirect::to('/menufacture');
    }

    public function active_menufact($menufacture_id)
    {
        DB::table('menufacture')
            ->where('menufacture_id',$menufacture_id)
            ->update(['status'=> 1]);
        Session::put('message','Brand is actived now!');
        return Redirect::to('/menufacture');
    }


     /** Brand Controller active and deactive route function**/
    public function unactive_product($product_id)
    {
        DB::table('product')
            ->where('product_id',$product_id)
            ->update(['status'=> 0]);
        Session::put('message','Product is De-active now !');
        return Redirect::to('/product');
    }

    public function active_product($product_id)
    {
        DB::table('product')
            ->where('product_id',$product_id)
            ->update(['status'=> 1]);
        Session::put('message','Product is actived now!');
        return Redirect::to('/product');
    }


//    /** product Controller active and deactive route function**/
//    public function active_product($product_id)
//    {
//        DB::table('product')
//        ->where('product_id',$product_id)
//        ->update(['status'=> 0]);
//        Session::put('message','Your Product is Active Now!');
//        return Redirect::to('/product');
//    }
//    public function deactive_product($product_id)
//    {
//        DB::table('product')
//        ->Where('product_id',$product_id)
//        ->update(['status'=> 1]);
//        Session::put('message','Your Product is De-active Now!');
//        return Redirect::to('/product');
//    }

}
