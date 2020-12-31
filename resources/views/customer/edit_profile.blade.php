
@extends('page.app')
@section('extra-css')
<link href="/web_assets/css/detail-page.css" rel="stylesheet">
<link href="/web_assets/css/order-sign_up.css" rel="stylesheet">

@endsection
@section('content')

	<main class="bg_gray">
		<form id="form" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input value="{{ $user->id }}" type="hidden" name="id" id="id">
		<div class="container margin_60_20">
		    <div class="row justify-content-center">
		        <div class="col-xl-6 col-lg-8">
		        	<div class="box_order_form">
					    <div class="head">
					        <div class="title">
					            <h3>Update Profile</h3>
					        </div>
					    </div>
					    <!-- /head -->
					    <div class="main">
					    	<div class="row">
					            <div class="col-md-6">
					                <div class="form-group">
					                    <label>First Name</label>
					                    <input value="{{$user->first_name}}" name="first_name" id="first_name" class="form-control" placeholder="First Name">
					                </div>
					            </div>
					            <div class="col-md-6">
					                <div class="form-group">
					                    <label>Last Name</label>
					                    <input value="{{$user->last_name}}" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
					                </div>
					            </div>
					        </div>
					        <div class="form-group">
					            <label>Phone Number</label>
					            <input readonly value="{{$user->phone}}" name="phone" id="phone" class="form-control">
					        </div>
					        <div class="form-group">
					            <label>Email ID</label>
					            <input value="{{$user->email}}" type="email" name="email" id="email" class="form-control">
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
  	var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/customer/update-profile',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
          console.log(data);                
          $("#form")[0].reset();
          toastr.success(data, 'Successfully Update');
          location.reload();
        },error: function (data, errorThrown) {
          	var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
              toastr.error(obj[0]);
          	});
        }
    });
}
</script>
@endsection