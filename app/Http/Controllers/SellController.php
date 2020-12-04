<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();

class SellController extends Controller
{
  public function index(){
    $this->AdminAuthCheck();
    $all_sell_info=DB::table('order')
                      ->join('order_details','order.order_id','=','order_details.order_id')
                      ->select('order.*','order_details.*')
                      ->get();

    $manage_sell=view('admin.selllist')
       ->with('all_sell_info',$all_sell_info);

    return view('admin_layout')
           ->with('admin.selllist',$manage_sell);
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
