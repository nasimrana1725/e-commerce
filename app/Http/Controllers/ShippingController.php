<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use Session;
class ShippingController extends Controller
{
  public function shipping(Request $request)
  {
    $data =array();
    $data['shipping_id']=$request->shipping_id;
    $data['shipping_email']=$request->shipping_email;
    $data['shipping_first_name']=$request->shipping_first_name;
    $data['shipping_last_name']=$request->shipping_last_name;
    $data['shipping_address']=$request->shipping_address;
    $data['shipping_city']=$request->shipping_city;
    $data['shipping_mobile']=$request->shipping_mobile;

    $shipping_id = DB::table('shipping')
                   ->insertGetid($data);
    Session::put('shipping_id',$shipping_id);
    return Redirect::to('/payment');
  }

  
}
