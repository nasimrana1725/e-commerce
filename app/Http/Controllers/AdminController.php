<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();

class AdminController extends Controller
{
  public function index()
  {
    return view('admin.admin_login');
  }

  public function show_dashboard()
  {
    return view('admin.dashboard');
  }

  public function dashboard(Request $request)
  {
   $admin_email = $request->admin_email;
    $password = $request->admin_password;

    $result = db::table('users')
              ->where('admin_email',$admin_email)
              ->where('password',$password)
              ->first();

              if ($result) {
                session::put('admin_name',$result->admin_name);
                session::put('admin_id',$result->admin_id);
                return Redirect::to('/dashboard');
              }else {

                session::put('message','Email or Password Invalid');
                return Redirect::to('/admin');
              }
  }
}
