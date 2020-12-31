@extends('page.app_home')
@section('extra-css')
<link href="/web_assets/css/submit.css" rel="stylesheet">
@endsection
@section('content')
	
<main>
	<div class="hero_single inner_pages background-image" data-background="url(/web_assets/img/home_section_2.jpg)">
		<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<h1>About Us</h1>
						<!-- <p>More bookings from diners around the corner</p> -->
						<a href="#submit" class="btn_1 gradient btn_scroll">Submit Now</a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<div class="wave hero"></div>
	</div>
	<!-- /hero_single -->

		<div class="container margin_30_20">			
		<div class="main_title center">
			<span><em></em></span>
			<h2>Our History</h2>
			<p>Perfectly light in every bite</p>
		</div>

		<div class="row justify-content-center align-items-center add_bottom_15">
				<div class="col-lg-6">
					<div class="box_about">
						<h3>Boost your Orders</h3>
						<p class="lead">We deliver meal plans or individual orders daily across Abu Dhabi.</p>
						<p>We are tireless in staying abreast of the latest food trends. And we are obsessed with creating customized menus and culinary masterpieces for our clients. Today, we still proudly offer our healthy menu, in addition to a full range of chef-inspired takeout and catering services across campus, and to companies and schools. We make individuals happy and satisfy their hunger. we see how to best serve our clients through time tested administration standards: We offer catering Bachelor’s Kitchen food delivery service in UAE! We also believe that the healthiest option is the most balanced option rather than simply the lowest calorie option. Give us a call or visit us in store to work out the best plan for your needs and goals.</p>
						<img src="/web_assets/img/arrow_about.png" alt="" class="arrow_1">
					</div>
				</div>
				<div class="col-lg-6 text-center d-none d-lg-block">
						<img src="/web_assets/img/about_1.svg" alt="" class="img-fluid" width="250" height="250">
				</div>
			</div>
			<!-- /row -->
			<div class="row justify-content-center align-items-center add_bottom_15">
				<div class="col-lg-6 text-center d-none d-lg-block">
						<img src="/web_assets/img/about_2.svg" alt="" class="img-fluid" width="250" height="250">
				</div>
				<div class="col-lg-6">
					<div class="box_about">
						<h3>OUR MISSION</h3>
						<p class="lead"></p>
						<p>Our mission is to provide establishments large and small with the highest-quality products, exceptional customer service, and flexible, dependable delivery. Our mission is, and always has been simple: to make the world a better place through wholesome, tasty food and outstanding service.</p>
						<img src="/web_assets/img/arrow_about.png" alt="" class="arrow_2">
					</div>
				</div>
			</div>
			<!-- /row -->
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6">
					<div class="box_about">
						<h3>OUR FOOD</h3>
						<p>We pride ourselves on our craveable menu, along with our standards on food safety and product quality. We get whole vegetables, whole fruits and whole grains delivered to our kitchen every day. Our team dices, slices, spices and roasts in-house because food tastes better when it’s made fresh. Our team sources the highest quality ingredients and corporates lots of superfoods, organic, and premium gourmet elements. All dishes are prepared with no preservatives, no additives. </p>
					</div>

				</div>
				<div class="col-lg-6 text-center d-none d-lg-block">
						<img src="/web_assets/img/about_3.svg" alt="" class="img-fluid" width="250" height="250">
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

	
</main>
<!-- /main -->
<style type="text/css">
header.sticky ul#top_menu li > a,
header.sticky ul#top_menu li .dropdown-cart > a,
header.sticky .dropdown.user > a {
  color: #333 !important;
}
header.header ul#top_menu li > a,
header.header ul#top_menu li .dropdown-cart > a {
  color: #333 !important;
}
header.header a {
  color: #222;
}
header.header a:hover {
  opacity: 1;
  color: #e54750 !important;
}
</style>
@endsection
@section('extra-js')
<script>
//$('.header').addClass('black_nav');

</script>
@endsection