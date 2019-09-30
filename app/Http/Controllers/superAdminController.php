<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class superAdminController extends Controller
{
    public function logout(){
        Session::flush();
//        Session::put('admin_name','null');
//        Session::put('admin_id','null');
        return redirect('/admin');
    }



}
