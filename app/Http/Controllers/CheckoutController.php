<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use Session;

class CheckoutController extends Controller
{

  public function checkout()
  {
    return view('pages.checkout');
  }

  public function customer_registration(Request $request)
  {
    $data =array();
    $data['customer_id']=$request->products_id;
    $data['customer_name']=$request->customer_name;
    $data['customer_email']=$request->customer_email;
    $data['customer_password']=md5($request->customer_password);
    $data['customer_mobile']=$request->customer_mobile;

    $customer_id = DB::table('customers')
                   ->insertGetid($data);
    Session::put('customer_id',$customer_id);
    Session::put('customer_name',$request->customer_name);
    return Redirect::to('/checkout');
  }
}
