<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();

class ProfitController extends Controller
{
  public function index(){
    $this->AdminAuthCheck();
    $all_profit_info=DB::table('order_details')
                      ->join('products','order_details.products_id','=','products.products_id')
                      ->select('order_details.*','products.*')
                      ->get();


    $manage_profit=view('admin.profit')
       ->with('all_profit_info',$all_profit_info);

    return view('admin_layout')
           ->with('admin.profit',$manage_profit);
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
