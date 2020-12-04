<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use Session;
use Cart;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
  public function payment()
  {
    return view('pages.payment');
  }

  public function order_place(Request $request)
  {
    $payment_gateway = $request->payment_gateway;
    $pdata =array();
    $pdata['payment_gateway']=$payment_gateway;
    $pdata['payment_status']='pending';

    $payment_id = DB::table('payment')
                   ->insertGetId($pdata);

    $odata =array();
    $odata['customer_id']=Session::get('customer_id');
    $odata['shipping_id']=Session::get('shipping_id');
    $odata['payment_id']=$payment_id;
    $odata['order_total']=Cart::subtotal();
    $odata['order_status']='pending';
    $order_id = DB::table('order')
                   ->insertGetId($odata);

    $contents = Cart::content();
    $oddata =array();

    foreach ($contents as  $v_contents) {
      $oddata['order_id']=$order_id;
      $oddata['products_id']= $v_contents->id;
      $oddata['products_name']= $v_contents->name;
      $oddata['products_price']= $v_contents->price;
      $oddata['products_sale_quantity']= $v_contents->qty;

      DB::table('order_details')
                     ->insertGetId($oddata);
    }

    if ($payment_gateway=='cashondelivery') {
      Cart::destroy();
      return view('pages.cashondelivery');
    }elseif ($payment_gateway=='bkash'){
      echo"bkash";
    }elseif ($payment_gateway=='card'){
      echo"Card";
    }else {
      echo"not selected";
    }


  }
}
