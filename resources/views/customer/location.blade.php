
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
                                <input value="{{Auth::user()->id}}" type="hidden" name="user_id" id="user_id">
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

function SaveAddress(){
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



</script>
@endsection