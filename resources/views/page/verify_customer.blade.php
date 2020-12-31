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
						<h2>Verify Customer</h2>
					</div>
					<div id="message-register"></div>
					<form method="post" id="form" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="customer_id" id="customer_id" value="{{$id}}">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Enter OTP" name="otp" id="otp">
								</div>
							</div>
						</div>						
						
						<div class="form-group text-center">
							<input type="button" onclick="Save()" class="btn_1 gradient" value="Submit" id="submit-register">
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
  var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/verify-customer',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            if(data.status == 400){
                toastr.error(data.message);
            }
            else{
                toastr.success(data.message);
                //$("#form")[0].reset();
                window.location.href = "/login";
            }
        }
    });
}
</script>
@endsection