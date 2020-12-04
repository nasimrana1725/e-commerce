<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use App\Http\Requests;
use Illuminate\Support\Str;
use Session;
session_start();

class SliderController extends Controller
{
  public function index()
  {
    $this->AdminAuthCheck();
    return view('/admin.add_slider');
  }

  public function save_slider(Request $request)
  {

      $data =array();
      $data['slider_id']=$request->slider_id;
      $data['slider_title']=$request->slider_title;
      $data['slider_description']=$request->slider_description;
      $data['publication_status']=$request->publication_status;
      $image=$request->file('slider_image');



     if ($image) {
       $image_name = Str::random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='image/';
       $image_url = $upload_path.$image_full_name;
       $sucess = $image->move($upload_path,$image_full_name);
       if ($sucess) {
         $data['slider_image'] = $image_url;
         DB::table('slider')->insert($data);
         Session::put('message','slider Added Successfully!!');
         return Redirect::to('/add-slider');


       }
     }


     $data['slider_image'] = '';
     DB::table('slider')->insert($data);
     Session::put('message','slider Added Successfully!!');
     return Redirect::to('/add-slider');

  }

  public function all_slider()
  {
    $this->AdminAuthCheck();
    $all_pubished_slider=DB::table('slider')->get();
    $manage_slider=view('admin.all_slider')
       ->with('all_slider_info',$all_pubished_slider);

    return view('admin_layout')
           ->with('admin.all_slider',$manage_slider);
  }


  public function inactive_slider($slider_id)
  {
    DB::table('slider')
      ->where('slider_id',$slider_id)
      ->update(['publication_status' => 0]);
      Session::put('message','slider Inactiveted Successfully!!');
      return Redirect::to('/all-slider');
  }


  public function active_slider($slider_id)
  {
    DB::table('slider')
      ->where('slider_id',$slider_id)
      ->update(['publication_status' => 1]);
      Session::put('message','slider Activeted Successfully!!');
      return Redirect::to('/all-slider');
  }


  public function edit_slider($slider_id)
  {
    $this->AdminAuthCheck();
    $slider_info=DB::table('slider')
              ->where('slider_id',$slider_id)
              ->first();

    $slider_info = view('admin.edit_slider')
       ->with('slider_info',$slider_info);

    return view('admin_layout')
          ->with('admin.edit_slider',$slider_info);

  }


  public function update_slider(Request $request, $slider_id)
  {

    $data =array();
    $data['slider_id']=$request->slider_id;
    $data['slider_title']=$request->slider_title;
    $data['slider_description']=$request->slider_description;
    $image=$request->file('slider_image');



    if ($image) {
      $image_name = Str::random(20);
      $ext=strtolower($image->getClientOriginalExtension());
      $image_full_name=$image_name.'.'.$ext;
      $upload_path='image/';
      $image_url = $upload_path.$image_full_name;
      $sucess = $image->move($upload_path,$image_full_name);
      if ($sucess) {
        $data['slider_image'] = $image_url;
        DB::table('slider')
               ->where('slider_id',$slider_id)
               ->update($data);
        Session::put('message','slider Updated Successfully!!');
        return Redirect::to('/add-slider');


      }
    }


    DB::table('slider')
         ->where('slider_id',$slider_id)
         ->update($data);
    Session::put('message','slider Updated Successfully!!');
    return Redirect::to('/all-slider');

  }


  public function delete_slider(Request $request, $slider_id)
  {

    DB::table('slider')
         ->where('slider_id',$slider_id)
         ->delete();
    Session::put('message','slider Deleted Successfully!!');
    return Redirect::to('/all-slider');

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
