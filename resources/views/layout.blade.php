<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.title')
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		@include('layouts.header')
	</header><!--/header-->

  <section id="slider"><!--slider-->
    @include('layouts.slider')
  </section><!--/slider-->


	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
                <?php
                $all_pubished_category=DB::table('category')
                                           ->where('publication_status',1)
                                           ->get();
                foreach ($all_pubished_category as $v_category) {
                ?>

                <div class="panel panel-default">
  								<div class="panel-heading">
  									<h4 class="panel-title"><a href="{{URL::to('/products_by_category/'.$v_category->category_id)}}">{{$v_category->category_name}}</a></h4>
  								</div>
  							</div>
                <?php
                }
                ?>

              </div>
						</div><!--/category-products-->

						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                  <?php
                  $all_pubished_manufacture=DB::table('manufacture')
                                             ->where('publication_status',1)
                                             ->get();
                  foreach ($all_pubished_manufacture as $v_manufacture) {
                  ?>
									<li><a href="{{URL::to('/products_by_manufacture/'.$v_manufacture->manufacture_id)}}"> <span class="pull-right">(50)</span>{{$v_manufacture->manufacture_name}}</a></li>

                  <?php
                  }
                  ?>
								</ul>
							</div>
						</div><!--/brands_products-->

						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->

						<div class="shipping text-center"><!--shipping-->
							<img src="{{URL::to('frontend/images/home/shipping.jpg')}}" alt="" />
						</div><!--/shipping-->

					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						@yield('content')

				</div>
			</div>
		</div>
	</section>

  



	<footer id="footer"><!--Footer-->
		@include('layouts.footer')

	</footer><!--/Footer-->



    <script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script type="text/javascript">
    $('.carousel').carousel()

    </script>
</body>
</html>
