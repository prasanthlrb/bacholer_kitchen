
@extends('page.app')
@section('extra-css')
<link href="/web_assets/css/detail-page.css" rel="stylesheet">
<link href="/web_assets/css/order-sign_up.css" rel="stylesheet">
<meta name="_token" content="{{ csrf_token() }}"/>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMTNFnPj4AizpevEiZcG77II6MptFemd4&sensor=false&libraries=places"></script>
<style type="text/css">
    .input-controls {
      margin-top: 10px;
      border: 1px solid transparent;
      border-radius: 2px 0 0 2px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      height: 32px;
      outline: none;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }
    #searchInput {
      background-color: #fff;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      margin-left: 12px;
      padding: 0 11px 0 13px;
      text-overflow: ellipsis;
      width: 50%;
    }
    #searchInput:focus {
      border-color: #4d90fe;
    }
</style>
@endsection
@section('content')

	<main class="bg_gray">
		<form id="form" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="container margin_60_20">
		    <div class="row justify-content-center">
		        <div class="col-xl-6 col-lg-8">
		        	<div class="box_order_form">
					    <div class="head">
					        <div class="title">
					            <h3>Delivery Details</h3>
					        </div>
					    </div>
					    <!-- /head -->
					    <div class="main">
					        <div class="row">
					        	<div class="col-md-12">
				                    <div class="form-group">
				                        <label>Enter a location</label>
				                        <input id="searchInput" class="input-controls form-control" type="text" placeholder="Enter a location">
				                        <input type="hidden" name="map_title" id="map_title">
				                        <input type="hidden" name="lat" id="lat">
				                        <input type="hidden" name="lng" id="lng">
				                    </div>
                  				</div>
                  				<div class="col-md-12">
                  					<div class="map" id="map" style="width: 100%; height: 150px;"></div>
                  				</div>
					            <div class="col-md-6">
					                <div class="form-group">
					                    <label>Address Title</label>
					                    <select class="form-control" name="addr_type" id="addr_type">
					                    	<option value="1">Appartment</option>
					                    	<option value="2">Villa</option>
					                    	<option value="3">Hotel</option>
					                    	<option value="4">Office</option>
					                    </select>
					                </div>
					            </div>
					            <div class="col-md-6">
					                <div class="form-group">
					                    <label>Buliding/Community</label>
					                    <input class="form-control" placeholder="Buliding/Community" name="addr_title" id="addr_title">
					                </div>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="address1">Apartment Number</label>
					            <input name="address1" id="address1" class="form-control">
					        </div>
					        <div class="form-group">
					            <label class="address2">Notes (Optional)</label>
					            <input name="address2" id="address2" class="form-control">
					        </div>
					        <div class="form-group">
					            <label class="address3">Phone Number (Optional)</label>
					            <input name="address3" id="address3" class="form-control">
					        </div>
					        <div class="row">
					            <div class="col-md-6">
					                <div class="form-group">
					                    <label>City</label>
					                    <input name="city" id="city" class="form-control" placeholder="City">
					                </div>
					            </div>
					            <div class="col-md-3">
					                <div class="form-group">
					                    <label>Postal Code</label>
					                    <input name="pincode" id="pincode" class="form-control" placeholder="0123">
					                </div>
					            </div>
					            <div class="col-md-3">
					                <br><a onclick="SaveAddress()" class="btn_1 gradient full-width mb_5">Save</a>
					            </div>
					        </div>
<div class="list-view">		
@foreach($user_address as $row)
@if($user->address_id == $row->id)			        
<div class="payment_select">
    <label class="container_radio"><b>
    	@if($row->addr_type == '1')
    	Appartment
    	@elseif($row->addr_type == '2')
    	Villa
    	@elseif($row->addr_type == '3')
    	Hotel
    	@elseif($row->addr_type == '4')
    	Office
    	@endif

    </b>
        <input type="radio" checked value="{{$row->id}}" name="address_id">
        <span class="checkmark"></span>
        <span>{{$row->map_title}}</span>
    </label>
    <!-- <i class="icon_map_alt"></i> -->
</div>
@else
<div class="payment_select">
    <label class="container_radio"><b>
    	@if($row->addr_type == '1')
    	Appartment
    	@elseif($row->addr_type == '2')
    	Villa
    	@elseif($row->addr_type == '3')
    	Hotel
    	@elseif($row->addr_type == '4')
    	Office
    	@endif

    </b>
        <input type="radio" value="{{$row->id}}" name="address_id">
        <span class="checkmark"></span>
        <span>{{$row->map_title}}</span>
    </label>
    <!-- <i class="icon_map_alt"></i> -->
</div>
@endif
@endforeach
</div>
					    </div>
					</div>
					<!-- /box_order_form -->
		            <div class="box_order_form">
					    <div class="head">
					        <div class="title">
					            <h3>Payment Method</h3>
					        </div>
					    </div>
					    <!-- /head -->
					    <div class="main">
					        <div class="payment_select">
					            <label class="container_radio">Pay with Card
					                <input type="radio" value="1" checked name="payment_type">
					                <span class="checkmark"></span>
					            </label>
					            <i class="icon_creditcard"></i>
					        </div>
					        <!-- <div class="form-group">
					            <label>Name on card</label>
					            <input type="text" class="form-control" id="name_card_order" name="name_card_order" placeholder="First and last name">
					        </div>
					        <div class="form-group">
					            <label>Card number</label>
					            <input type="text" id="card_number" name="card_number" class="form-control" placeholder="Card number">
					        </div>
					        <div class="row">
					            <div class="col-md-6">
					                <label>Expiration date</label>
					                <div class="row">
					                    <div class="col-md-6 col-6">
					                        <div class="form-group">
					                            <input type="text" id="expire_month" name="expire_month" class="form-control" placeholder="mm">
					                        </div>
					                    </div>
					                    <div class="col-md-6 col-6">
					                        <div class="form-group">
					                            <input type="text" id="expire_year" name="expire_year" class="form-control" placeholder="yyyy">
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <div class="col-md-6 col-sm-12">
					                <div class="form-group">
					                    <label>Security code</label>
					                    <div class="row">
					                        <div class="col-md-4 col-6">
					                            <div class="form-group">
					                                <input type="text" id="ccv" name="ccv" class="form-control" placeholder="CCV">
					                            </div>
					                        </div>
					                        <div class="col-md-8 col-6">
					                            <img src="img/icon_ccv.gif" width="50" height="29" alt="ccv"><small>Last 3 digits</small>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					         -->
					        <!-- <div class="payment_select" id="paypal">
					            <label class="container_radio">Pay with Paypal
					                <input type="radio" value="" name="payment_method">
					                <span class="checkmark"></span>
					            </label>
					        </div> -->
					        <div class="payment_select">
					            <label class="container_radio">Pay with Cash
					                <input type="radio" value="0" name="payment_type">
					                <span class="checkmark"></span>
					            </label>
					            <i class="icon_wallet"></i>
					        </div> 
					    </div>
					</div>
					<!-- /box_order_form -->
		        </div>
		        <!-- /col -->
		        <div class="col-xl-4 col-lg-4" id="sidebar_fixed">
		            <div class="box_order">
		                <div class="head">
		                    <h3>Order Summary</h3>
		                    <div>{{$food_package->package_title_english}}</div>
		                </div>
		                <!-- /head -->
		                <div class="main">
		                	<ul>
		                		<li>Date<span>{{$cart->start_date}} to {{$cart->end_date}}</span></li>
		                		<li>No of Person<span>{{$cart->no_of_person}}</span></li>
		                		<li>No of Days<span>{{$cart->no_of_days}}</span></li>
		                	</ul>
		                	<hr>
		                	<ul class="clearfix">
		                    <?php
		                    $userid='';
		                    if(!empty(Auth::user()->id)){
		                    	$userid = Auth::user()->id;
		                    }
		                    ?>
		                    <input type="hidden" name="user_id" id="user_id" value="{{$userid}}">
		                    <input type="hidden" name="cart_id" id="cart_id" value="{{$cart->id}}">
		                    <input type="hidden" name="package_id" id="package_id" value="{{$cart->package_id}}">
		                    <input type="hidden" name="breakfast_price" id="breakfast_price" value="{{$cart->breakfast_price}}">
		                    <input type="hidden" name="lunch_price" id="lunch_price" value="{{$cart->lunch_price}}">
		                    <input type="hidden" name="dinner_price" id="dinner_price" value="{{$cart->dinner_price}}">
		                    <input type="hidden" name="no_of_days" id="no_of_days" value="{{$cart->no_of_days}}">
		                    <input type="hidden" name="no_of_person" id="no_of_person" value="{{$cart->no_of_person}}">
		                    <input type="hidden" name="start_date" id="start_date" value="{{$cart->start_date}}">
		                    <input type="hidden" name="end_date" id="end_date" value="{{$cart->end_date}}">
                        	<?php
                        	$breakfast_price=0;
                        	$lunch_price=0;
                        	$dinner_price=0;
                        	?>
                            @if($cart->breakfast_price != '')
				            	<li>Breakfast Price<span>AED {{$cart->breakfast_price}}</span></li>
				            <?php $breakfast_price = $cart->breakfast_price; ?>
				            @endif
				            @if($cart->lunch_price != '')
				            	<li>Lunch Price<span>AED {{$cart->lunch_price}}</span></li>
				            <?php $lunch_price = $cart->lunch_price; ?>
				            @endif
				            @if($cart->dinner_price != '')
				            	<li>Dinner Price<span>AED {{$cart->dinner_price}}</span></li>
				            <?php $dinner_price = $cart->dinner_price; ?>
				            @endif
		                        </ul>
		                        <ul class="clearfix">
		                            <li>Subtotal<span id="subtotal_label">AED {{$cart->subtotal}}</span></li>
		                            @if($cart->coupon_id != '')
		                            <li style="color: #567854;" id="coupon_label">Coupon ({{$cart->coupon_id}})<span>- AED {{$cart->discount_amount}}</span></li>
		                            @endif
		                            <li>Tax (5%)<span id="tax_label">AED {{$cart->tax}}</span></li>
		                            <li class="total">Total<span id="total_label">AED {{$cart->total}}</span></li>
		                        </ul>
		                        <input value="{{$cart->subtotal}}" type="hidden" name="subtotal" id="subtotal">
		                        <input value="{{$cart->coupon_id}}" type="hidden" name="coupon_id" id="coupon_id">
                                <input value="{{$cart->discount_amount}}" type="hidden" name="discount_amount" id="discount_amount">
                                <input value="{{$cart->after_discount}}" type="hidden" name="after_discount" id="after_discount">
		                        <input value="{{$cart->tax}}" type="hidden" name="tax" id="tax">
		                        <input value="{{$cart->total}}" type="hidden" name="total" id="total">

		                    <a onclick="Save()" class="btn_1 gradient full-width mb_5">Order Now</a>
		                    <!-- <div class="text-center"><small>Or Call Us at <strong>0432 48432854</strong></small></div> -->
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

<script>
/* script */
function initialize() {
   var latlng = new google.maps.LatLng(24.453884,54.3773438);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();   
    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
       
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);          
    
        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);
       
    });
    // this function will work on marker move event into map 
    google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {        
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
}
function bindDataToForm(address,lat,lng){
   document.getElementById('map_title').value = address;
   document.getElementById('lat').value = lat;
   document.getElementById('lng').value = lng;
}
google.maps.event.addDomListener(window, 'load', initialize);

</script>

<script type="text/javascript">


$( "#addr_type" ).change(function() {
	var addr_type = $("#addr_type").val();
	if(addr_type == '1'){
		$(".address1").text("Apartment Number");
		$(".address2").text("Notes (Optional)");
		$(".address3").text("Phone Number (Optional)");
	}
	else if(addr_type == '2'){
		$(".address1").text("Street");
		$(".address2").text("Villa");
		$(".address3").text("Phone Number (Optional)");
	}
	else if(addr_type == '3'){
		$(".address1").text("Room Number");
		$(".address2").text("Notes (Optional)");
		$(".address3").text("Phone Number (Optional)");
	}
	else if(addr_type == '4'){
		$(".address1").text("Office Number");
		$(".address2").text("Notes (Optional)");
		$(".address3").text("Phone Number (Optional)");
	}
});

function Save(){
	var user_id = $("#user_id").val();
	if(user_id != ''){
  	var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/save-booking',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
          console.log(data.message);                
          $("#form")[0].reset();
          toastr.success(data.message, 'Successfully Save');
          if(data.payment_type == 1){
 			window.open(data.pay_url, '_blank');
          }else if(data.payment_type == 0){
          	window.location.href="/order-confirm/"+data.booking_id;
          }
        },error: function (data, errorThrown) {
          	var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
              toastr.error(obj[0]);
          	});
        }
    });
	}
	else{
		toastr.error('Please Login Your Account');
	}
}

function SaveAddress(){
	var user_id = $("#user_id").val();
	if(user_id != ''){
  	var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/save-address',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
          console.log(data);                
          toastr.success(data, 'Successfully Save');
          $('.list-view').load(location.href+' .list-view');
        },error: function (data, errorThrown) {
          	var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
              toastr.error(obj[0]);
          	});
        }
    });
	}
	else{
		toastr.error('Please Login Your Account');
	}
}



</script>
@endsection