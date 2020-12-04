<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use Cart;
use App\Http\Requests;
use Session;
session_start();

class MyOrderController extends Controller
{
  public function index(){
    $customer_id= Session::get('customer_id');
    $all_order_info=DB::table('customers')
                          ->join('order','customers.customer_id','=','order.customer_id')
                          ->join('order_details','order.order_id','=','order_details.order_id')
                          ->join('payment','order.payment_id','=','payment.payment_id')
                          ->select('customers.*','order_details.*','order.*','payment.*')
                          ->where('customers.customer_id',$customer_id)
                          ->get();
    $manage_order=view('pages.myorder')
       ->with('all_order_info',$all_order_info);

    return view('layout')
           ->with('pages.myorder',$manage_order);
  }
}
