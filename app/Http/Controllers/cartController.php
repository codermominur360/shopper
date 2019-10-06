<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;


class cartController extends Controller
{
    public function addToCart()
    {
        return view('Frontend.Pages.add_to_cart');
    }
}
