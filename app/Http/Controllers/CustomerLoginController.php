<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();

class CustomerLoginController extends Controller
{
  public function index()
  {
    return view('pages.login');
  }

  public function customer_login(Request $request)
  {
   $customer_email = $request->customer_email;
   $customer_password = md5($request->customer_password);

    $result = db::table('customers')
              ->where('customer_email',$customer_email)
              ->where('customer_password',$customer_password)
              ->first();


             if ($result) {
                session::put('customer_name',$result->customer_name);
                session::put('customer_id',$result->customer_id);
                session::put('customer_email',$result->customer_email);
                return Redirect::to('/');
              }else {
                session::put('message','Email or Password Invalid');
                return Redirect::to('/login');
              }
  }

  public function customer_logout()
  {
    //Session::put('admin_name',null);
    //Session::put('admin_id',null);
    Session::flush();
    return Redirect::to('/');
  }
}
