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

class ShopController extends Controller
{
  public function index()
  {

    $all_published_products=DB::table('products')
                      ->join('category','products.category_id','=','category.category_id')
                      ->join('manufacture','products.manufacture_id','=','manufacture.manufacture_id')
                      ->select('products.*','category.category_name','manufacture.manufacture_name')
                      ->where('products.publication_status',1)
                      ->limit(6)
                      ->get();
    $manage_published_products=view('pages.products')
                         ->with('all_published_products',$all_published_products);

    return view('pages.products')
               ->with($manage_published_products);
  }
}
