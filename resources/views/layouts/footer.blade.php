<div class="footer-top">
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
        <div class="companyinfo">
          <h2>Chitrangoda</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
        </div>
      </div>
      <div class="col-sm-7">
      </div>
      <div class="col-sm-3">
        <div class="address">
          <img src="{{URL::to('frontend/images/home/map.png')}}" alt="" />
          <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="footer-widget">
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
        <div class="single-widget">
          <h2>Service</h2>
          <ul class="nav nav-pills nav-stacked">
            <li><a href="{{URL::to('contactus')}}">Contact Us</a></li>
            <?php
            $customer_id= Session::get('customer_id');
            if ($customer_id ==! NULL) { ?>
            <li><a href="{{URL::to('/myorder')}}">My Order</a></li>
            <?php  }  ?>
            <li><a href="{{URL::to('/myorder')}}">My Order</a></li>
            <li><a href="#">FAQ’s</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="single-widget">
          <h2>Quock Shop</h2>
          <?php
          $all_pubished_category=DB::table('category')
                                     ->where('publication_status',1)
                                     ->get();
          foreach ($all_pubished_category as $v_category) {
          ?>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="{{URL::to('/products_by_category/'.$v_category->category_id)}}">{{$v_category->category_name}}</a></li>
              </ul>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="single-widget">
          <h2>Policies</h2>
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#">Terms of Use</a></li>
            <li><a href="#">Privecy Policy</a></li>
            <li><a href="#">Refund Policy</a></li>
            <li><a href="#">Billing System</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="single-widget">
          <h2>About Shopper</h2>
          <ul class="nav nav-pills nav-stacked">
            <li><a href="{{URL::to('contactus')}}">Company Information</a></li>
            <li><a href="#">Store Location</a></li>
            <li><a href="#">Copyright</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-3 col-sm-offset-1">
        <div class="single-widget">
          <h2>About Chitrangoda</h2>
          <form action="#" class="searchform">
            <input type="text" placeholder="Your email address" />
            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
            <p>Get the most recent updates from <br />our site and be updated your self...</p>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="footer-bottom">
  <div class="container">
    <div class="row">
      <p class="pull-left">Copyright © 2020 Chitrangoda Inc. All rights reserved.</p>
      <p class="pull-right">Developed by <span><a target="_blank" href="https://www.linkedin.com/in/nasim1725/">Nasim Rana</a></span></p>
    </div>
  </div>
</div>
