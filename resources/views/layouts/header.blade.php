<div class="header_top"><!--header_top-->
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="contactinfo">
          <ul class="nav nav-pills">
            <li><a href="tel:+8801772755212"><i class="fa fa-phone"></i> +8801772755212</a></li>
            <li><a href="mailto:dachitrango@gmail.com"><i class="fa fa-envelope"></i>dachitrango@gmail.com</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="social-icons pull-right">
          <ul class="nav navbar-nav">
            <li><a href="https://www.facebook.com/chitrangoda607"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div><!--/header_top-->

<div class="header-middle"><!--header-middle-->
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="logo pull-left">
          <a href="{{URL::to('/')}}"><img src="{{URL::to('frontend/images/home/logo.png')}}" alt="" /></a>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="shop-menu pull-right">
          <ul class="nav navbar-nav">
            <?php
            $customer_id= Session::get('customer_id');
            if ($customer_id ==! NULL) { ?>
            <li><a href="{{URL::to('/myorder')}}"><i class="fa fa-star"></i> My Order</a></li>
            <?php  }  ?>


            <li><a href="{{URL::to('/show_cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
            <?php
            $customer_id= Session::get('customer_id');
            if ($customer_id == NULL) { ?>
            <li><a href="{{URL::to('/login')}}"><i class="fa fa-lock"></i> Login</a></li>
          <?php  } else { ?>
            <li><a href="{{URL::to('/customer_logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
          <?php  } ?>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div><!--/header-middle-->
<div class="header-bottom"><!--header-bottom-->
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="mainmenu pull-left">
          <ul class="nav navbar-nav collapse navbar-collapse">
            <li><a href="{{URL::to('/')}}" class="active">Home</a></li>
            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{URL::to('/products')}}">Products</a></li>
                <li><a href="product-details.html">Product Details</a></li>
                <li><a href="{{URL::to('/login_check')}}">Checkout</a></li>
                <li><a href="cart.html">Cart</a></li>
                <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>
            <li><a href="404.html">404</a></li>
            <li><a href="{{URL::to('contactus')}}">Contact</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="search_box pull-right">
          <input type="text" placeholder="Search"/>
        </div>
      </div>
    </div>
  </div>
</div><!--/header-bottom-->
