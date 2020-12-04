@extends('layout')
@section('content')
<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">My Order</li>
      </ol>
    </div>
    <div class="table-responsive cart_info">
      <?php
      $contents=Cart::content();
      ?>
      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <th>order ID</th>
            <th>products Name</th>
            <th>products price</th>
            <th>products sale quantity</th>
            <th>order Total </th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_order_info as $v_order)
          <tr>
            <td class="cart_name">
              <h4><a href="">{{$v_order->order_id}}</a></h4>
            </td>
            <td class="cart_name">
              <h4><a href="">{{$v_order->products_name}}</a></h4>
            </td>
            <td class="cart_price">
              <p>{{$v_order->products_price}} TK</p>
            </td>
            <td class="cart_price">
              <p>{{$v_order->products_sale_quantity}}</p>
            </td>
            <td class="cart_quantity">
              <p>{{$v_order->order_total}} TK</p>
            </td>
            <td class="cart_total">
              <p class="cart_total_price">{{$v_order->order_status}}</p>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section> <!--/#cart_items-->



<script>
 $.ajax({
   url:'/update_cart';
   type:'POST';

 });
</script>

@endsection
