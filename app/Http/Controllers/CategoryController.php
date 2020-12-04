<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();

class CategoryController extends Controller
{
    public function index()
    {
      $this->AdminAuthCheck();
      return view('/admin.add_category');
    }

    public function all_category()
    {
      $this->AdminAuthCheck();
      $all_category_info=DB::table('category')->get();
      $manage_category=view('admin.all_category')
         ->with('all_category_info',$all_category_info);

      return view('admin_layout')
             ->with('admin.all_category',$manage_category);
    }

    public function save_category(Request $request)
    {

      $data =array();
      $data['category_id']=$request->category_id;
      $data['category_name']=$request->category_name;
      $data['category_description']=$request->category_description;
      $data['publication_status']=$request->publication_status;

      DB::table('category')->insert($data);
      Session::put('message','Category Added Successfully!!');
      return Redirect::to('/add-category');
    }


    public function inactive_category($category_id)
    {
      DB::table('category')
        ->where('category_id',$category_id)
        ->update(['publication_status' => 0]);
        Session::put('message','Category Inactiveted Successfully!!');
        return Redirect::to('/all-category');
    }


    public function active_category($category_id)
    {
      DB::table('category')
        ->where('category_id',$category_id)
        ->update(['publication_status' => 1]);
        Session::put('message','Category Activeted Successfully!!');
        return Redirect::to('/all-category');
    }

    public function edit_category($category_id)
    {
      $this->AdminAuthCheck();

      $category_info=DB::table('category')
                ->where('category_id',$category_id)
                ->first();

      $category_info = view('admin.edit_category')
         ->with('category_info',$category_info);

      return view('admin_layout')
            ->with('admin.edit_category',$category_info);

    }


    public function update_category(Request $request, $category_id)
    {

      $data =array();
      $data['category_name']=$request->category_name;
      $data['category_description']=$request->category_description;
      var_dump($data);

      DB::table('category')
           ->where('category_id',$category_id)
           ->update($data);
      Session::put('message','Category Updated Successfully!!');
      return Redirect::to('/all-category');

    }


    public function delete_category(Request $request, $category_id)
    {

      DB::table('category')
           ->where('category_id',$category_id)
           ->delete();
      Session::put('message','Category Deleted Successfully!!');
      return Redirect::to('/all-category');

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
