@extends('page.app_home')
@section('extra-css')
<link href="/web_assets/css/contacts.css" rel="stylesheet">
@endsection
@section('content')
	
<main>
	<div class="hero_single inner_pages background-image" data-background="url(/web_assets/img/home_section_2.jpg)">
		<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-9 col-lg-10 col-md-8">
						<h1>Contact Bachelor Kitchen</h1>
						<p>Do You, uh, Hungry To Eat!</p>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<div class="wave gray hero"></div>
	</div>
	<!-- /hero_single -->

	<div class="bg_gray">
	    <div class="container margin_60_40">
	        <div class="row justify-content-center">
	            <div class="col-lg-4">
	                <div class="box_contacts">
	                    <i class="icon_lifesaver"></i>
	                    <h2>Help Center</h2>
	                    <a href="#0">+94 423-23-221</a> - <a href="#0">help@fooyes.com</a>
	                    <small>MON to FRI 9am-6pm SAT 9am-2pm</small>
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="box_contacts">
	                    <i class="icon_pin_alt"></i>
	                    <h2>Address</h2>
	                    <div>6th Forrest Ray, London - 10001 UK</div>
	                    <small>MON to FRI 9am-6pm SAT 9am-2pm</small>
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="box_contacts">
	                    <i class="icon_cloud-upload_alt"></i>
	                    <h2>Submissions</h2>
	                    <a href="#0">+94 423-23-221</a> - <a href="#0">order@fooyes.com</a>
	                    <small>MON to FRI 9am-6pm SAT 9am-2pm</small>
	                </div>
	            </div>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	</div>
	<!-- /bg_gray -->

	<div class="container margin_60_20">
	    <h5 class="mb_5">Drop Us a Line</h5>
	    <div class="row">
	        <div class="col-lg-4 col-md-6 add_bottom_25">
	            <div id="message-contact"></div>
		            <form method="post" action="assets/contact.php" id="contactform" autocomplete="off">
		                <div class="form-group">
		                    <input class="form-control" type="text" placeholder="Name" id="name_contact" name="name_contact">
		                </div>
		                <div class="form-group">
		                    <input class="form-control" type="email" placeholder="Email" id="email_contact" name="email_contact">
		                </div>
		                <div class="form-group">
		                    <textarea class="form-control" style="height: 150px;" placeholder="Message" id="message_contact" name="message_contact"></textarea>
		                </div>
		                <div class="form-group">
		                    <input class="form-control" type="text" id="verify_contact" name="verify_contact" placeholder="Are you human? 3 + 1 =">
		                </div>
		                <div class="form-group">
		                    <input class="btn_1 gradient full-width" type="submit" value="Submit" id="submit-contact">
		                </div>
		            </form>
	        	</div>
	            <div class="col-lg-8 col-md-6 add_bottom_25">
	                <iframe class="map_contact" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14523.372970290258!2d54.3638712!3d24.4908877!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x27f86f27f04b128!2sLRB%20INFO%20TECH%20(Best%20Website%20Design%20%7C%20Web%20Development%20%7C%20Mobile%20Application%20Development%20%7C%20Digital%20Marketing%20%7C%20Ecommerce%20%7C%20SEO%20%7C%20IT%20%7C%20Company%20in%20abu%20dhabi%20%7C%20UAE%20)!5e0!3m2!1sen!2sin!4v1609131481318!5m2!1sen!2sin" allowfullscreen></iframe>
	            </div>
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
@endsection