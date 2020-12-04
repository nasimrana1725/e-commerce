@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="{{asset('/dashboard')}}">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="{{asset('/admin.add_products')}}">Products</a></li>
</ul>
<p class="alert-success">
<?php
$message = Session::get('message');
if ($message) {
  echo($message);
  Session::put('message',null);

}
 ?>
 </p>

<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon user"></i><span class="break"></span>All products</h2>

      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>
    <div class="box-content">
      <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
          <tr>
            <th>products ID</th>
            <th>products Name</th>
            <th>Category Name</th>
            <th>Manufacture Name</th>
            <th>products Short Description</th>
            <th>products Long Description</th>
            <th>products Price</th>
            <th>products Basic Price</th>
            <th>Products Image</th>
            <th>products Size</th>
            <th>products Color</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        @foreach($all_products_info as $v_products)
        <tbody>
        <tr>
          <td>{{$v_products->products_id}}</td>
          <td class="center">{{$v_products->products_name}}</td>
          <td class="center">{{$v_products->category_name}}</td>
          <td class="center">{{$v_products->manufacture_name}}</td>
          <td class="center">{{$v_products->products_short_description}}</td>
          <td class="center">{{$v_products->products_long_description}}</td>
          <td class="center">{{$v_products->products_price}}</td>
          <td class="center">{{$v_products->products_basic_price}}</td>
          <td class="center"><img src="{{ URL::to($v_products->products_image) }}" alt="">  </td>
          <td class="center">{{$v_products->products_size}}</td>
          <td class="center">{{$v_products->products_color}}</td>
          <td class="center">
            @if($v_products->publication_status==1)

              <span class="label label-success">Active</span>

            @else
              <span class="label label-danger">Inactive</span>
            @endif
            </td>

          <td class="center">
            @if($v_products->publication_status==1)

            <a class="btn btn-danger" href="{{URL::to('/inactive_products/'.$v_products->products_id)}}">
              <i class="halflings-icon white thumbs-down"></i>
            </a>

            @else
            <a class="btn btn-success" href="{{URL::to('/active_products/'.$v_products->products_id)}}">
              <i class="halflings-icon white thumbs-up"></i>
            </a>
            @endif

            <a class="btn btn-info" href="{{URL::to('/edit_products/'.$v_products->products_id)}}">
              <i class="halflings-icon white edit"></i>
            </a>
            <a class="btn btn-danger" href="{{URL::to('/delete_products/'.$v_products->products_id)}}" id="delete">
              <i class="halflings-icon white trash"></i>
            </a>
          </td>
        </tr>

        </tbody>
        @endforeach
      </table>
    </div>
  </div><!--/span-->

</div><!--/row-->

@endsection
