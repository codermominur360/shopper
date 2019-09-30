<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
session_start();

class CategoryController extends Controller
{

    public function index()
    {
        $category=DB::table('category')->get();
        return view('Backend.Pages.Category.index')->with('category',$category);
    }


    public function create()
    {
        return view('Backend.Pages.Category.create');
    }

    public function store(Request $request)
    {
        $category = array();
        $category['category_name'] = $request->category_name;
        $category['category_description'] = $request->category_description;
        $category['status'] = 0;

       DB::table('category')->insert($category);
       Session::put('message','You data is insert');
       return Redirect::to('/category');
    }

    public function show($category)
    {
        $category=DB::table('category')->first($category);
        print_r($category);
//        return view('Backend.Pages.Category.index')->with('category',$category);
    }

    public function edit($category_id)
    {

       $category=DB::table('category')
           ->where('category_id',$category_id)
           ->first();
       return view('Backend.Pages.Category.edit')->with('category',$category);
    }


    public function update(Request $request, $category_id)
    {
        $category = array();
        $category['category_name'] = $request->category_name;
        $category['category_description'] = $request->category_description;


        DB::table('category')
            ->where('category_id',$category_id)
            ->update($category);
        Session::put('message','You data is insert');
        return Redirect::to('/category');
    }


    public function destroy_category($category_id)
    {
        DB::table('category')
            ->where('category_id',$category_id)
            ->delete();
        Session::put('message','Category Id is Deleted');
        return Redirect::to('/category');
    }


    public function update_category(Request $request, $category_id)
    {
        $category=array();
        $category['category_name'] = $request->category_name;
        $category['category_description'] = $request->category_description;
         DB::table('category')
            ->where('category_id',$category_id)
            ->update($category);
        Session::put('message','You data is insert');
        return Redirect::to('/category');
    }
}
