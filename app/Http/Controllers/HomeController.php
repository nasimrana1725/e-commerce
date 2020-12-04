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

class HomeController extends Controller
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
      $manage_published_products=view('pages.home_content')
                           ->with('all_published_products',$all_published_products);

      return view('layout')
                ->with('pages.home_content',$manage_published_products);
    }

    public function show_products_by_category($category_id)
    {
      $products_by_category=DB::table('products')
                        ->join('category','products.category_id','=','category.category_id')
                        ->select('products.*','category.category_name')
                        ->where('category.category_id',$category_id)
                        ->where('products.publication_status',1)
                        ->limit(18)
                        ->get();
      $manage_products_by_category=view('pages.category_by_products')
                           ->with('products_by_category',$products_by_category);

      return view('layout')
                ->with('pages.category_by_products',$manage_products_by_category);
    }

    public function show_products_by_manufacture($manufacture_id)
    {
      $products_by_manufacture=DB::table('products')
                        ->join('manufacture','products.manufacture_id','=','manufacture.manufacture_id')
                        ->select('products.*','manufacture.manufacture_name')
                        ->where('manufacture.manufacture_id',$manufacture_id)
                        ->where('products.publication_status',1)
                        ->limit(18)
                        ->get();
      $manage_products_by_manufacture=view('pages.manufacture_by_products')
                           ->with('products_by_manufacture',$products_by_manufacture);

      return view('layout')
                ->with('pages.manufacture_by_products',$manage_products_by_manufacture);
    }

    public function products_details_by_id($products_id)
    {
      $products_by_details=DB::table('products')
                        ->join('category','products.category_id','=','category.category_id')
                        ->join('manufacture','products.manufacture_id','=','manufacture.manufacture_id')
                        ->select('products.*','category.category_name','manufacture.manufacture_name')
                        ->where('products.products_id',$products_id)
                        ->where('products.publication_status',1)
                        ->first();
      $manage_products_by_details=view('pages.products_details')
                           ->with('products_by_details',$products_by_details);

      return view('layout')
                ->with('pages.products_details',$manage_products_by_details);
    }

    public function contactus()
    {
      return view('pages.contactus');
    }

}
