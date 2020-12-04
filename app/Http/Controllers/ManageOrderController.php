<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();

class ManageOrderController extends Controller
{
    public function index(){
      $this->AdminAuthCheck();
      $all_order_info=DB::table('order')
                        ->join('customers','order.customer_id','=','customers.customer_id')
                        ->select('order.*','customers.customer_name')
                        ->get();
      $manage_order=view('admin.manageorder')
         ->with('all_order_info',$all_order_info);

      return view('admin_layout')
             ->with('admin.manageorder',$manage_order);
    }

    public function view_order($order_id){
      $this->AdminAuthCheck();

      $order_by_id=DB::table('order')
                        ->join('order_details','order.order_id','=','order_details.order_id')
                        ->join('customers','order.customer_id','=','customers.customer_id')
                        ->join('shipping','order.shipping_id','=','shipping.shipping_id')
                        ->join('payment','order.payment_id','=','payment.payment_id')
                        ->select('order.*','order_details.*','customers.*','shipping.*','payment.*')
                        ->where('order.order_id',$order_id)
                        ->get();



     $view_order=view('admin.view_order')
         ->with('order_by_id',$order_by_id);

      return view('admin_layout')
             ->with('admin.view_order',$view_order);
    }


    public function delete_order(Request $request, $order_id)
    {
      $order_by_id=DB::table('order_details')
                        ->join('order','order_details.order_id','=','order.order_id')
                        ->select('order_details.*')
                        ->where('order.order_id',$order_id)
                        ->delete();

      $order_by_id1=DB::table('shipping')
                        ->join('order','shipping.shipping_id','=','order.shipping_id')
                        ->select('shipping.*')
                        ->where('order.order_id',$order_id)
                        ->delete();
      $order_by_id2=DB::table('payment')
                          ->join('order','payment.payment_id','=','order.payment_id')
                          ->select('payment.*')
                          ->where('order.order_id',$order_id)
                          ->delete();

      $order_by_id3=DB::table('order')
                        ->where('order_id',$order_id)
                        ->delete();

      Session::put('message','Order Deleted Successfully!!');
      return Redirect::to('/order_list');

    }

    public function inactive_order($order_id)
    {
      DB::table('order')
        ->where('order_id',$order_id)
        ->update(['order_status' => 'pending']);
        Session::put('message','Order Inactiveted Successfully!!');
        return Redirect::to('/order_list');
    }


    public function active_order($order_id)
    {
      DB::table('order')
        ->where('order_id',$order_id)
        ->update(['order_status' => 'Confirm']);
        Session::put('message','Order Activeted Successfully!!');
        return Redirect::to('/order_list');
    }


    public function AdminAuthCheck()
    {
      $admin_id=Session::get('admin_id');
      if ($admin_id) {
        return;
      }else {
        return Redirect::to('/admin')->send();
      }
    }


}
