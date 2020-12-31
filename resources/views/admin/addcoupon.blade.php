@extends('admin.layouts')
@section('extra-css')
<!-- 	<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css"> -->
@endsection
@section('body-section')
        <div class="main-content">
          <div class="content-wrapper">


<section class="basic-elements">
	<div class="row">
		<div class="col-sm-12">
			<div class="content-header">Add Coupon</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
        <div class="card-header">
          <h4 class="card-title">Coupon Details</h4>
          <!-- <p class="mb-0">This is the most basic and default form having form sections. To add form section use <code>.form-section</code>
            class with any heading tags. This form has the buttons on the bottom left corner which is the default
            position.</p> -->
        </div>
				<div class="card-content">
					<div class="px-3">
						<form class="form" id="coupon_form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="{{ Request::segment(3) }}" name="id" id="id">
							<div class="form-body">
								<div class="row">

									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label>Coupon Code</label>
						            <input autocomplete="off" type="text" id="coupon_code" name="coupon_code" class="form-control">
										</fieldset>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label>Description</label>
						            <textarea class="form-control" name="description" id="description" placeholder="Term & Conditions"></textarea>
										</fieldset>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label>Start Date</label>
                      <input autocomplete="off" type="date" id="start_date" name="start_date" class="form-control" data-toggle="tooltip"
                        data-trigger="hover" data-placement="top">
										</fieldset>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label>Expire Date</label>
                      <input autocomplete="off" type="date" id="end_date" name="end_date" class="form-control" data-toggle="tooltip"
                        data-trigger="hover" data-placement="top">
										</fieldset>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label>Discount type</label>
            						<select onchange="discounttype()" id="discount_type" name="discount_type" class="form-control">
                          <option value="0" selected="" disabled="">Select the Discount type</option>
                          <option value="1">Discount from Total Value</option>
                          <option value="2">% Discount from Total Value</option>
                        </select>
										</fieldset>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label id="per">Amount</label>
                    	<input autocomplete="off" type="text" id="amount" name="amount" class="form-control">
										</fieldset>
									</div>

                  <div id="maxshow" class="col-xl-6 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                      <label>Max Value</label>
                      <input autocomplete="off" type="text" id="max_value" name="max_value" class="form-control">
                    </fieldset>
                  </div>

									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label>Minimum Order Value</label>
                      <input autocomplete="off" type="text" id="min_order_val" name="min_order_val" class="form-control">
										</fieldset>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label>Usage limit per user</label>
                      <input autocomplete="off" type="text" id="limit_per_user" name="limit_per_user" class="form-control">
										</fieldset>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label>Customer Type</label>
          						<select onchange="usertype()" id="user_type" name="user_type" class="form-control">
                        <option value="" selected="" >All</option>
                        <option value="1">Selected Customer</option>
                      </select>
										</fieldset>
									</div>

									<div id="usershow" class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
											<label>Select the Customer</label>
          						<select style="width:100% !imporatnt;" id="user_id" name="user_id[]" class="select2 form-control" multiple="multiple">
                        <optgroup label="Select Customer">
                        @foreach ($customer as $user1)
                          <option value="{{$user1->id}}">{{$user1->email}}</option>
                        @endforeach
                        </optgroup>
                      </select>
										</fieldset>
									</div>

								</div>
								<div class="form-actions">
									<div class="text-right">
										<button onclick="Save()" type="button" class="btn btn-raised btn-primary">Submit <i class="ft-thumbs-up position-right"></i></button>
										<button type="reset" class="btn btn-raised btn-warning">Reset <i class="ft-refresh-cw position-right"></i></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Basic Inputs end -->


  </div>
</div>



@endsection
@section('extra-js')
  
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
$('.coupon').addClass('active');


$(".select2").select2({
    dropdownAutoWidth: true,
    width: '100%'
});

$("#maxshow").hide();
$("#usershow").hide();
function discounttype(){
  var discount_type = $("#discount_type").val();
  if(discount_type == '2'){
    $("#maxshow").show();
    $('#per').html("Percentage");
  }
  else{
    $("#maxshow").hide();
    $('#per').html("Amount");
  }
}

function usertype(){
  var user_type = $("#user_type").val();
  if(user_type == '1'){
    $("#usershow").show();
  }
  else{
    $("#usershow").hide();
  }
}

  var id = $("#id").val();

  $.ajax({
        url : '/admin/coupon-edit/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('input[name=coupon_code]').val(data.coupon_code);
          $('textarea[name=description]').val(data.description);
          $('input[name=start_date]').val(data.start_date);
          $('input[name=end_date]').val(data.end_date);
          $('select[name=discount_type]').val(data.discount_type);
          $('select[name=user_type]').val(data.user_type);
          $('input[name=amount]').val(data.amount);
          $('input[name=max_value]').val(data.max_value);
          $('input[name=min_order_val]').val(data.min_order_val);
          $('input[name=limit_per_user]').val(data.limit_per_user);
          //$('input[name=limit_per_coupon]').val(data.limit_per_coupon);
          $('input[name=id]').val(data.id);

  if(data.discount_type == 2){
    $("#maxshow").show();
    $('#per').html("Percentage");
  }
  else{
    $("#maxshow").hide();
    $('#per').html("Amount");
  }

  if(data.user_type == 1){
    $("#usershow").show();
    get_coupon_user(data.id);
  }
  else{
    $("#usershow").hide();
  }

         action_type = 2;
        }
      });

function get_coupon_user(id)
{
    $.ajax({        
        url : '/admin/get_coupon_user/'+id,
        type: "GET",
        success: function(data)
        {
           $('#user_id').html(data);
        }
   });
}
  if(id==""){
    function Save(){
      
      var formData = new FormData($('#coupon_form')[0]);
      $.ajax({
          url : '/admin/coupon-save',
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "JSON",
          success: function(data)
          {
            console.log(data);                
            $("#coupon_form")[0].reset();
            //$('.table').load(location.href+' .table');
            toastr.success('Coupon Store Successfully', 'Successfully Save');
            window.location.href="/admin/coupon/";
          },
          error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
              toastr.error(obj[0]);
            });
          }
      });
    }
  }
  else{
    function Save(){
      //alert($("#service_id").val());
      var formData = new FormData($('#coupon_form')[0]);
      $.ajax({
          url : '/admin/coupon-update',
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "JSON",
          success: function(data)
          {
            console.log(data);                
            $("#coupon_form")[0].reset();
            //$('.table').load(location.href+' .table');
            toastr.success('Coupon Updated Successfully', 'Successfully Update');
            window.location.href="/admin/coupon/";
          },
          error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
              toastr.error(obj[0]);
            });
          }
      });
    }
  }
</script>
@endsection