@include('layouts.title')
@include('layouts.header')
<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/')}}">Home</a></li>
        <li class="active">Check out</li>
      </ol>
    </div><!--/breadcrums-->



    <div class="shopper-informations">
      <div class="row">

        <div class="col-sm-12 clearfix">
          <div class="bill-to">
            <p>Bill To</p>
            <div class="form-one">
              <form action="{{URL::to('/shipping')}}" method="post">
                {{ csrf_field()}}
                <input type="text" name="shipping_email" placeholder="Email" required="*">
                <input type="text" name="shipping_first_name" placeholder="First Name " required="">
                <input type="text" name="shipping_last_name" placeholder="Last Name " required="">
                <input type="text" name="shipping_address" placeholder="Address" required="">
                <input type="text" name="shipping_city" placeholder="City" required="">
                <input type="text" name="shipping_mobile" placeholder="Mobile Number" required="">
                <input type="submit" class="btn btn-default" value="Place Order">
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="review-payment">
      <h2>Review & Payment</h2>
    </div>

    <div class="table-responsive cart_info">
      <?php
      $contents=Cart::content();
      ?>
      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <td class="image">Item</td>
            <td class="description"></td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          @foreach($contents as $v_contents)
          <tr>
            <td class="cart_product">
              <a href=""><img style="width:80px;height:80px;" src="{{$v_contents->options->image}}" alt=""></a>
            </td>
            <td class="cart_name">
              <h4><a href="">{{$v_contents->name}}</a></h4>
            </td>
            <td class="cart_price">
              <p>{{$v_contents->price}} TK</p>
            </td>
            <td class="cart_quantity">
              <div class="cart_quantity_button">
                <form action="{{url('/update_cart')}}" method="post">
                  {{ csrf_field() }}
                  <input class="cart_quantity_input" type="text" name="qty" value="{{$v_contents->qty}}" autocomplete="off" size="2">
                  <input  type="hidden" name="rowId" value="{{$v_contents->rowId}}" >
                  <input  type="submit" name="submit" value="update" class="btn btn-sm btn-default" >
                </form>

              </div>
            </td>
            <td class="cart_total">
              <p class="cart_total_price">{{$v_contents->subtotal}} TK</p>
            </td>
            <td class="cart_delete">
              <a class="cart_quantity_delete" href="{{URL::to('/delete_cart/'.$v_contents->rowId)}}"><i class="fa fa-times"></i></a>
            </td>
          </tr>
          @endforeach

          <tr>
            <td colspan="4">&nbsp;</td>
            <td colspan="2">
              <table class="table table-condensed total-result">
                <tr>
                  <td>Cart Sub Total</td>
                 <td> TK</td>
                </tr>
                <tr>
                  <td>Exo Tax</td>
                  <td>0.00 TK</td>
                </tr>
                <tr class="shipping-cost">
                  <td>Shipping Cost</td>
                  <td>Free</td>
                </tr>
                <tr>
                  <td>Total</td>
                  <td><span> TK</span></td>
                </tr>
              </table>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</section> <!--/#cart_items-->
 @include('layouts.footer')
