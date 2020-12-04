<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use Cart;
use App\Http\Requests;



class CartController extends Controller
{
  public function add_cart(Request $request)
  {
    $qty=$request->qty;
    $products_id=$request->products_id;
    $products_info=DB::table('products')
                      ->where('products_id',$products_id)
                      ->first();
    $data =array();
    $data['qty']=$qty;
    $data['id']=$products_info->products_id;
    $data['name']=$products_info->products_name;
    $data['price']=$products_info->products_price;
    $data['options']['size']=$products_info->products_size;
    $data['options']['image']=$products_info->products_image;



    Cart::add($data);
    return Redirect::to('/show_cart');
  }

  public function show_cart(Request $request)
  {

    return view('pages.add_cart');
  }

  public function delete_cart( $rowId)
  {

    Cart::update($rowId,0);
    return Redirect::to('/show_cart');
  }


  public function update_cart(Request $request)
  {

    $qty=$request->qty;
    $rowId=$request->rowId;
    Cart::update($rowId,$qty);
    return Redirect::to('/show_cart');
  }
}
