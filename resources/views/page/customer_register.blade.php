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
						<h1>Attract New Customers</h1>
						<p>More bookings from diners around the corner</p>
						<a href="#submit" class="btn_1 gradient btn_scroll">Submit Now</a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<div class="wave hero"></div>
	</div>
	<!-- /hero_single -->

		<div class="container margin_30_20" id="submit">			
			<div class="row justify-content-center">
				<div class="col-lg-5">
					<div class="text-center add_bottom_15">
						<span><em></em></span>
						<h2>Why Submit to Bachelor Kitchen</h2>
						<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
					</div>
					<div id="message-register"></div>
					<form method="post" action="/save-customer" id="form" enctype="multipart/form-data">
					{{ csrf_field() }}
						<h6>Personal data</h6>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<input value="<?php echo old('first_name'); ?>" type="text" class="form-control" placeholder="First Name" name="first_name" id="first_name">
								</div>
								@error('first_name')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                    @enderror
							</div>
						</div>

						<div class="row ">
							<div class="col-lg-12">
								<div class="form-group">
									<input value="<?php echo old('last_name'); ?>" type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name">
								</div>
								@error('last_name')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                    @enderror
							</div>
						</div>
						<!-- /row -->
						<div class="row ">
							<div class="col-lg-12">
								<div class="form-group">
									<input value="<?php echo old('email'); ?>" type="email" class="form-control" placeholder="Email Address" name="email" id="email">
								</div>
								@error('email')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                    @enderror
							</div>
						</div>

						<div class="row ">
							<div class="col-lg-12">
								<div class="form-group">
									<input value="<?php echo old('phone'); ?>" type="text" class="form-control" placeholder="Mobile Number" name="phone" id="phone">
								</div>
								@error('phone')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                    @enderror
							</div>
						</div>

						<div class="row ">
							<div class="col-lg-12">
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Password" name="password" id="password">
								</div>
								@error('password')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                    @enderror
							</div>
						</div>

						<div class="row ">
							<div class="col-lg-12">
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation">
								</div>
							</div>
						</div>
						
						
						<!-- <h6>I am not a robot</h6>
						<div class="row add_bottom_25">
							<div class="col-lg-12">
								<div class="form-group">
									<input type="text" id="verify_register" class="form-control" placeholder="Human verify: 3 + 1 =?">
								</div>
							</div>
						</div> -->
						<!-- /row -->
						<div class="form-group text-center">
							<input type="submit" class="btn_1 gradient" value="Submit" id="submit-register">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /container -->
	
</main>
<!-- /main -->

@endsection
@section('extra-js')
    <script src="/web_assets/js/common_scripts.min.js"></script>
    <script src="/web_assets/js/common_func.js"></script>
<script type="text/javascript">

function Save(){
	$('#submit-register').attr('disabled',true);
	var formData = new FormData($('#form')[0]);

	$.ajax({
	    url : '/save-customer',
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,
	    dataType: "JSON",
	    success: function(data)
	    {
	     $('#submit-register').attr('disabled',false);
         $("#form")[0].reset();
         toastr.success('Customer Store Successfully', 'Successfully Save');
	    },error: function (data, errorThrown) {
	    var errorData = data.responseJSON.errors;
	      $.each(errorData, function(i, obj) {
	        toastr.error(obj[0]);
	      });
	      $('#submit-register').attr('disabled',false);
	    }
	});
}
</script>
@endsection