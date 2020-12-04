<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();

class manufactureController extends Controller
{
  public function index()
  {
    $this->AdminAuthCheck();
    return view('/admin.add_manufacture');
  }

  public function all_manufacture()
  {
    $this->AdminAuthCheck();
    $all_manufacture_info=DB::table('manufacture')->get();
    $manage_manufacture=view('admin.all_manufacture')
       ->with('all_manufacture_info',$all_manufacture_info);

    return view('admin_layout')
           ->with('admin.all_manufacture',$manage_manufacture);
  }

  public function save_manufacture(Request $request)
  {

    $data =array();
    $data['manufacture_id']=$request->manufacture_id;
    $data['manufacture_name']=$request->manufacture_name;
    $data['manufacture_description']=$request->manufacture_description;
    $data['publication_status']=$request->publication_status;
    var_dump($data);

    DB::table('manufacture')->insert($data);
    Session::put('message','manufacture Added Successfully!!');
    return Redirect::to('/add-manufacture');
  }

  public function inactive_manufacture($manufacture_id)
  {
    DB::table('manufacture')
      ->where('manufacture_id',$manufacture_id)
      ->update(['publication_status' => 0]);
      Session::put('message','manufacture Inactiveted Successfully!!');
      return Redirect::to('/all-manufacture');
  }


  public function active_manufacture($manufacture_id)
  {
    DB::table('manufacture')
      ->where('manufacture_id',$manufacture_id)
      ->update(['publication_status' => 1]);
      Session::put('message','manufacture Activeted Successfully!!');
      return Redirect::to('/all-manufacture');
  }

  public function edit_manufacture($manufacture_id)
  {
    $this->AdminAuthCheck();
    $manufacture_info=DB::table('manufacture')
              ->where('manufacture_id',$manufacture_id)
              ->first();

    $manufacture_info = view('admin.edit_manufacture')
       ->with('manufacture_info',$manufacture_info);

    return view('admin_layout')
          ->with('admin.edit_manufacture',$manufacture_info);

  }


  public function update_manufacture(Request $request, $manufacture_id)
  {

    $data =array();
    $data['manufacture_name']=$request->manufacture_name;
    $data['manufacture_description']=$request->manufacture_description;


    DB::table('manufacture')
         ->where('manufacture_id',$manufacture_id)
         ->update($data);
    Session::put('message','manufacture Updated Successfully!!');
    return Redirect::to('/all-manufacture');

  }


  public function delete_manufacture(Request $request, $manufacture_id)
  {

    DB::table('manufacture')
         ->where('manufacture_id',$manufacture_id)
         ->delete();
    Session::put('message','manufacture Deleted Successfully!!');
    return Redirect::to('/all-manufacture');

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
