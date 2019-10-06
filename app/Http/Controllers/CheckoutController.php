<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use DB;
use Session;
//use Cart;
use function Sodium\add;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('Frontend.Pages.checkOut');
    }
    public function loginCheckout()
    {
        return view('Frontend.Pages.login');
    }
    public function customer_registration(Request $request)
    {
        $data=array();
        $data['customer_id']=$request->customer_id;
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=$request->customer_password;
        $data['customer_phone']=$request->customer_phone;

                $customer_id=DB::table('customer')
                    ->insertGetId($data);

                Session::put('customer_id', $customer_id);
                Session::put('customer_name', $request->customer_name);
                    return redirect('/checkout');
    }
    public function save_shipping_details(Request $request)
    {

        $data=array();
        $data['shipping_first_name']=$request->shipping_first_name;
        $data['shipping_last_name']=$request->shipping_last_name;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_city']=$request->shipping_city;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_mobile']=$request->shipping_mobile;

        $shipping_id=DB::table('shipping')
                ->insertGetId($data);
         Session::put('shipping_id',$shipping_id);

        return redirect('/payment');
    }

    public function customer_login(Request $request)
    {
        $customer_email=$request->customer_email;
        $customer_password=$request->customer_password;

        $result=DB::table('customer')
                ->where('customer_email',$customer_email)
                ->where('customer_password',$customer_password)
                ->first();
                if ($result)
                {
                    Session::put('customer_id',$result->customer_id);
                    return redirect('checkout');
                }else
                    {
                        return redirect()->back();
                    }
    }
    public function customer_logout()
    {
        $customer_id=DB::table('customer')
            ->where('customer_id',1)
            ->first();

        Session::flush('customer_id', $customer_id);
        return redirect('checkout');
    }

    public function payment()
    {
        return view('Frontend.Pages.payment');
    }
    public function order_place(Request $request)
    {
        $payment_method=$request->payment_method;

        $data=array();
        $data['payment_method']=$payment_method;
        $data['payment_status']='pending';
        $payment_id=DB::table('payment')
            ->insertGetId($data);

        $odata=array();
        $odata['customer_id']=Session::get('customer_id');
        $odata['shipping_id']=Session::get('shipping_id');
        $odata['payment_id']=$payment_id;
        $odata['order_total']=Session::get('total');
        $odata['order_status']='pending';
        $orderdata=DB::table('order')
            ->insertGetId($odata);

        $cartcontents=Cart::content();
        $orderdetails=array();
        foreach ($cartcontents as $cartcontent)
        {
            $orderdetails['order_id']=$orderdata;
            $orderdetails['product_id']=$cartcontent->id;
            $orderdetails['product_name']=$cartcontent->name;
            $orderdetails['product_price']=$cartcontent->price;
            $orderdetails['product_sales_qty']=$cartcontent->qty;
            DB::table('orderdetails')->insert($orderdetails);
        }
        switch ($payment_gatway)
        {
            case "handcash" :
                return view('Frontend.Pages.handcash');
                break;
            case "Bkash" :
                return view('Frontend.Pages.Bkash');
                break;
            case "Visa" :
                return view('Frontend.Pages.Visa');
                break;
            default:
                echo " Your not select any payment method";
        }
    }

}
