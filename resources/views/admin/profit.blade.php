@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="{{URL::to('/dashboard')}}">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="{{URL::to('/admin.profit')}}">Profit List</a></li>
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
      <h2><i class="halflings-icon user"></i><span class="break"></span>Profit List</h2>

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
            <th>Date</th>
            <th>order ID</th>
            <th>Product ID</th>
            <th>Product Name </th>
            <th>Product Price</th>
            <th>Product Profit</th>
          </tr>
        </thead>
        @foreach($all_profit_info as $v_profit)
        <tbody>
        <tr>
          <td class="center">{{$v_profit->created_at}}</td>
          <td class="center">{{$v_profit->order_details_id}}</td>
          <td class="center">{{$v_profit->products_id}}</td>
          <td class="center">{{$v_profit->products_name}}</td>
          <td class="center">{{$v_profit->products_price}}</td>
          <td class="center">{{$v_profit->products_price-$v_profit->products_basic_price}}</td>

        <!--   -->
        </tr>
        </tbody>
        @endforeach
        <tfoot>
          <tr>
            <th colspan="4">Total Sell Delivery Charge: </th>
            <th colspan="4"></th>
          </tr>
        </tfoot>

      </table>
    </div>
  </div><!--/span-->

</div><!--/row-->

@endsection
