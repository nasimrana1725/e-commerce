@includes('title')
@includes('header')
<section id="advertisement">
  <div class="container">
    <img src="images/shop/advertisement.jpg" alt="" />
  </div>
</section>
<h2 class="title text-center">Features Items</h2>
<?php
foreach ($all_published_products as $v_products) {
?>
<div class="col-sm-4">
  <div class="product-image-wrapper">
    <div class="single-products">
        <div class="productinfo text-center">
          <a href="{{URL::to('/view_products/'.$v_products->products_id)}}"><img src="{{URL::to($v_products->products_image)}}" style="display: block; height:239px;width:267px;" alt="" /></a>
          <h2>{{$v_products->products_price}}</h2>
          <p>{{$v_products->products_name}}</p>
          <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
        </div>
        <div class="product-overlay">
          <div class="overlay-content">
            <a href="{{URL::to('/view_products/'.$v_products->products_id)}}"><h2>{{$v_products->products_price}}</h2></a>
            <a href="{{URL::to('/view_products/'.$v_products->products_id)}}"><p>{{$v_products->products_name}}</p></a>
            <a href="{{URL::to('/view_products/'.$v_products->products_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>
        </div>
    </div>
    <div class="choose">
      <ul class="nav nav-pills nav-justified">
        <li><a href="#"><i class="fa fa-plus-square"></i>{{$v_products->manufacture_name}}</a></li>
        <li><a href="{{URL::to('/view_products/'.$v_products->products_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
      </ul>
    </div>
  </div>
</div>
<?php
}
?>
@includes('footer')
