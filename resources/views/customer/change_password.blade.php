
@extends('page.app')
@section('extra-css')
<link href="/web_assets/css/detail-page.css" rel="stylesheet">
<link href="/web_assets/css/order-sign_up.css" rel="stylesheet">

@endsection
@section('content')

	<main class="bg_gray">
		<form action="#" id="form" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input value="{{ $user->id }}" type="hidden" name="id" id="id">
		<div class="container margin_60_20">
		    <div class="row justify-content-center">
		        <div class="col-xl-6 col-lg-8">
		        	<div class="box_order_form">
					    <div class="head">
					        <div class="title">
					            <h3>Change Password</h3>
					        </div>
					    </div>
					    <!-- /head -->
					    <div class="main">
				            <div class="form-group">
				                <label>Old Password</label>
                            	<input class="form-control" type="password" name="oldpassword" id="oldpassword">
				            </div>
					        <div class="form-group">
					            <label>New Password</label>
                                <input class="form-control" type="password" name="password" id="password">
					        </div>
					        <div class="form-group">
					            <label>Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
					        </div>
					        
					        <div class="row">
					            <div class="col-md-12">
					                <br>
					                <button onclick="Save()" class="btn_1 gradient full-width mb_5" type="button">Update</button>
					            </div>
					        </div>
					    </div>
					</div>
		        </div>
		        <!-- /col -->
		        <div class="col-xl-4 col-lg-4" id="sidebar_fixed">
		            <div class="box_order">
		                <div class="head">
		                    <h3>MENU</h3>
		                </div>
		                <!-- /head -->
		                <div class="main">
		                	<ul class="clearfix">
		                	<li><a href="/customer/chat-to-admin">Chat To Admin</a></li>
				            	<li><a href="/customer/view-location">Update Location</a></li>
				            	<li><a href="/customer/view-profile">Update Profile</a></li>
				            	<li><a href="/customer/change-password">Change Password</a></li>
		                  </ul>
		                </div>
		            </div>
		            <!-- /box_booking -->
		        </div>

		    </div>
		    <!-- /row -->
		</div>
		<!-- /container -->
		</form>
		
	</main>
	<!-- /main -->

	@endsection
@section('extra-js')
    <script src="/web_assets/js/sticky_sidebar.min.js"></script>
    <script src="/web_assets/js/specific_listing.js"></script>
    <script src="/web_assets/js/specific_detail.js"></script>

<script type="text/javascript">
function Save(){
  //alert($("#service_id").val());
  var formData = new FormData($('#form')[0]);
  $.ajax({
      url : '/customer/change-password',
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data)
      {
        console.log(data);                
        if(data.status == 1){
        	$("#form")[0].reset();
        	toastr.success('Change Password Successfully', 'Successfully Update');
        	window.location.href="/customer/dashboard/";
    	}
    	else{
    		toastr.error(data.message);
    	}
      },
      error: function (data, errorThrown) {
        var errorData = data.responseJSON.errors;
        $.each(errorData, function(i, obj) {
          toastr.error(obj[0]);
        });
      }
  });
}
</script>

@endsection