<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Str;
session_start();

class ProductsController extends Controller
{
  public function index()
  {
    $this->AdminAuthCheck();
    return view('/admin.add_products');
  }

  public function save_products(Request $request)
  {

      $data =array();
      $data['products_id']=$request->products_id;
      $data['products_name']=$request->products_name;
      $data['category_id']=$request->category_id;
      $data['manufacture_id']=$request->manufacture_id;
      $data['products_short_description']=$request->products_short_description;
      $data['products_long_description']=$request->products_long_description;
      $data['products_price']=$request->products_price;
      $data['products_basic_price']=$request->products_basic_price;
      $data['products_size']=$request->products_size;
      $data['products_color']=$request->products_color;
      $data['publication_status']=$request->publication_status;
      $image=$request->file('products_image');



      if ($image) {
        $image_name = Str::random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='image/';
        $image_url = $upload_path.$image_full_name;
        $sucess = $image->move($upload_path,$image_full_name);
        if ($sucess) {
          $data['products_image'] = $image_url;
          DB::table('products')->insert($data);
          Session::put('message','Products Added Successfully!!');
          return Redirect::to('/add-products');


        }
      }


      $data['products_image'] = '';
      DB::table('products')->insert($data);
      Session::put('message','Products Added Successfully!!');
      return Redirect::to('/add-products');

  }

  public function all_products()
  {
    $this->AdminAuthCheck();
    $all_products_info=DB::table('products')
                      ->join('category','products.category_id','=','category.category_id')
                      ->join('manufacture','products.manufacture_id','=','manufacture.manufacture_id')
                      ->select('products.*','category.category_name','manufacture.manufacture_name')
                      ->get();
    $manage_products=view('admin.all_products')
       ->with('all_products_info',$all_products_info);

    return view('admin_layout')
           ->with('admin.all_products',$manage_products);
  }


  public function inactive_products($products_id)
  {
    DB::table('products')
      ->where('products_id',$products_id)
      ->update(['publication_status' => 0]);
      Session::put('message','products Inactiveted Successfully!!');
      return Redirect::to('/all-products');
  }


  public function active_products($products_id)
  {
    DB::table('products')
      ->where('products_id',$products_id)
      ->update(['publication_status' => 1]);
      Session::put('message','products Activeted Successfully!!');
      return Redirect::to('/all-products');
  }


  public function edit_products($products_id)
  {
    $this->AdminAuthCheck();
    $products_info=DB::table('products')
              ->where('products_id',$products_id)
              ->first();

    $products_info = view('admin.edit_products')
       ->with('products_info',$products_info);

    return view('admin_layout')
          ->with('admin.edit_products',$products_info);

  }


  public function update_products(Request $request, $products_id)
  {

    $data =array();
    $data['products_id']=$request->products_id;
    $data['products_name']=$request->products_name;
    $data['category_id']=$request->category_id;
    $data['manufacture_id']=$request->manufacture_id;
    $data['products_short_description']=$request->products_short_description;
    $data['products_long_description']=$request->products_long_description;
    $data['products_price']=$request->products_price;
    $data['products_basic_price']=$request->products_basic_price;
    $data['products_size']=$request->products_size;
    $data['products_color']=$request->products_color;
    $data['products_image']=$request->file('products_image');
    $image=$request->file('products_image');
    dd($data);



    if ($image) {
      $image_name = Str::random(20);
      $ext=strtolower($image->getClientOriginalExtension());
      $image_full_name=$image_name.'.'.$ext;
      $upload_path='image/';
      $image_url = $upload_path.$image_full_name;
      $sucess = $image->move($upload_path,$image_full_name);
      if ($sucess) {
        $data['products_image'] = $image_url;
        DB::table('products')
               ->where('products_id',$products_id)
               ->update($data);
        Session::put('message','Products Updated Successfully!!');
        return Redirect::to('/add-products');


      }
    }


    DB::table('products')
         ->where('products_id',$products_id)
         ->update($data);
    Session::put('message','products Updated Successfully!!');
    return Redirect::to('/all-products');

  }


  public function delete_products(Request $request, $products_id)
  {

    DB::table('products')
         ->where('products_id',$products_id)
         ->delete();
    Session::put('message','products Deleted Successfully!!');
    return Redirect::to('/all-products');

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
