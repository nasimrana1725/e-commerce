@include('layouts.title')
@include('layouts.header')
<div class="col-sm-12 padding-right">
  <div class="features_items"><!--features_items-->
    <section id="cart_items">
      <div class="container">
        <div class="breadcrumbs">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Shopping Cart</li>
          </ol>
        </div>
        <div class="table-responsive cart_info">
          <?php
          $contents=Cart::content();
          ?>
          <table class="table table-condensed">
            <thead>
              <tr class="cart_menu">
                <td class="image">Image</td>
                <td class="name">Name</td>
                <td class="price">Price</td>
                <td class="quantity">Quantity</td>
                <td class="total">Total</td>
                <td>Action</td>
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
            </tbody>
          </table>
        </div>
      </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
      <div class="container">
        <div class="heading">
          <h3>What would you like to do next?</h3>
          <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
          <div class="col-sm-8">
            <div class="total_area">
              <ul>
                <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                <li>Eco Tax <span>0.00</span></li>
                <li>Shipping Cost <span>Free</span></li>
                <li>Total <span>{{Cart::subtotal()}}</span></li>
              </ul>
                <a class="btn btn-default update" href="">Update</a>

                <?php
                $customer_id= Session::get('customer_id');
                if ($customer_id == NULL) { ?>
                <a href="{{URL::to('/login')}}" class="btn btn-default check_out" href="">Check Out</a>
                <?php  } else { ?>
                <a href="{{URL::to('/checkout')}}" class="btn btn-default check_out" href="">Check Out</a>
                  <?php  } ?>
            </div>
          </div>
        </div>
      </div>
    </section><!--/#do_action-->

</div>
</div>



 @include('layouts.footer')
