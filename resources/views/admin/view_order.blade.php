@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">
  <div class="box span6">
    <div class="box-header">
      <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details </h2>
    </div>
    <div class="box-content">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Username</th>
            <th>mobile</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach($order_by_id as $v_order)
            @endforeach
            <td>{{$v_order->customer_name}}</td>
            <td>{{$v_order->customer_mobile}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="box span6">
    <div class="box-header">
      <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Payment Details </h2>
    </div>
    <div class="box-content">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Payment ID</th>
            <th>Payment Gateway</th>
            <th>Payment Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach($order_by_id as $v_order)
            @endforeach
            <td>{{$v_order->payment_id}}</td>
            <td>{{$v_order->payment_gateway}}</td>
            <td>{{$v_order->payment_status}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="box span6">
    <div class="box-header">
      <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details </h2>
    </div>
    <div class="box-content">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Username</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach($order_by_id as $v_order)
            @endforeach
            <td>{{$v_order->shipping_first_name}}</td>
            <td>{{$v_order->shipping_address}}</td>
            <td>{{$v_order->shipping_mobile}}</td>
            <td>{{$v_order->shipping_email}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details </h2>
    </div>
    <div class="box-content">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Sale Quantity</th>
            <th>Products Sub Total</th>
          </tr>
        </thead>

        <tbody>

          @foreach($order_by_id as $v_order)
            <tr>
              <td>{{$v_order->order_id}}</td>
              <td>{{$v_order->products_name}}</td>
              <td>{{$v_order->products_price}}</td>
              <td>{{$v_order->products_sale_quantity}}</td>
              <td>{{$v_order->products_price*$v_order->products_sale_quantity}}</td>
            </tr>
          @endforeach


        </tbody>
        <tfoot>
          <tr>
            <th colspan="4">Total with Delivery Charge: </th>
            <th>{{$v_order->order_total}}</th>
          </tr>
        </tfoot>

      </table>

    </div>

  </div>

</div>

<div class="button row-fluid sortable ">
  @if($v_order->order_status=='pending')
  <a class="btn btn-danger btn-default" href="{{URL::to('/active_order/'.$v_order->order_id)}}">
    <i class="halflings-icon white thumbs-up"></i>Confirm Order
  </a>

  @else
  <a class="btn btn-success" href="{{URL::to('/inactive_order/'.$v_order->order_id)}}">
    <i class="halflings-icon white thumbs-down"></i>Cancel Order
  </a>
  @endif

</div>

@endsection
