@extends('page.app')
@section('extra-css')
<link href="/web_assets/css/detail-page.css" rel="stylesheet">
@endsection
@section('content')
	
	<main>

		<div class="hero_in detail_page background-image" data-background="url(/item_files/{{$food_package->image}})">
			<div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				
				<div class="container">
					<div class="main_info">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-6">
								<div class="head"><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></div>
								<h1>{{$food_package->package_title_english}}</h1>
							</div>
							<!-- <div class="col-xl-8 col-lg-7 col-md-6">
								<div class="buttons clearfix">
									<span class="magnific-gallery">
										<a href="img/detail_1.jpg" class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i class="icon_image"></i>View photos</a>
										<a href="img/detail_2.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
										<a href="img/detail_3.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
									</span>
									<a href="#0" class="btn_hero wishlist"><i class="icon_heart"></i>Wishlist</a>
								</div>
							</div> -->
						</div>
						<!-- /row -->
					</div>
					<!-- /main_info -->
				</div>
			</div>
		</div>
		<!--/hero_in-->

		<nav class="secondary_nav sticky_horizontal">
		    <div class="container">
		        <ul id="secondary_nav">
		        	@if($food_package->breakfast_enable == 1)
		            <li><a class="list-group-item list-group-item-action" href="#section-1">Breakfat</a></li>
		            @endif
		            @if($food_package->lunch_enable == 1)
		            <li><a class="list-group-item list-group-item-action" href="#section-2">Lunch</a></li>
		            @endif
		            @if($food_package->dinner_enable == 1)
		            <li><a class="list-group-item list-group-item-action" href="#section-3">Dinner</a></li>
		            @endif
		            <!-- <li><a class="list-group-item list-group-item-action" href="#section-5"><i class="icon_chat_alt"></i>Reviews</a></li> -->
		        </ul>
		    </div>
		    <span></span>
		</nav>
		<!-- /secondary_nav -->

		<div class="bg_gray">
		    <div class="container margin_detail">
		        <div class="row">
		            <div class="col-lg-8 list_menu">
		            	@if($food_package->breakfast_enable == 1)
		                <section id="section-1">
		                    <h4>Breakfast</h4>
		                    <div class="row">
		@foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_sunday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Sunday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_monday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Monday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_tuesday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Tuesday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_wednesday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Wednesday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_thursday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Thursday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_friday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Friday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_saturday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Saturday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach
		                        
		                    </div>
		                </section>
		                @endif

		                @if($food_package->lunch_enable == 1)
		                <section id="section-2">
		                    <h4>Lunch</h4>
		                    <div class="row">
		@foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_sunday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Sunday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_monday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Monday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_tuesday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Tuesday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_wednesday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Wednesday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_thursday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Thursday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_friday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Friday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_saturday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Saturday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach
		                        
		                    </div>
		                </section>
		                @endif

		                @if($food_package->dinner_enable == 1)
		                <section id="section-3">
		                    <h4>Dinner</h4>
		                    <div class="row">
		@foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_sunday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Sunday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_monday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Monday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_tuesday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Tuesday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_wednesday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Wednesday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_thursday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Thursday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_friday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Friday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach

        @foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_saturday_items) as $item_id)
            @if($item_id == $row->id)
            <div class="col-md-6">
                <a class="menu_item modal_dialog" href="#modal-dialog">
                    <figure><img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="thumb" class="lazy"></figure>
                    <h3>{{$row->item_name_english}}</h3>
                    <p>Saturday</p>
                    <p>{{$row->description_english}}</p>
                    <!-- <strong>AED {{$row->price}}</strong> -->
                </a>
            </div>
            @endif
        @endforeach
        @endforeach
		                        
		                    </div>
		                </section>
		                @endif
		            </div>
		            <!-- /col -->
		            <div class="col-lg-4" id="sidebar_fixed">
		            <form id="form" method="POST" enctype="multipart/form-data">
		            {{ csrf_field() }}
		                <div class="box_order mobile_fixed">
		                    <div class="head">
		                        <h3>Order Summary</h3>
		                        <a href="#0" class="close_panel_mobile"><i class="icon_close"></i></a>
		                    </div>
		                    <!-- /head -->
		                    <div class="main">
		                    <ul>
		                		<li>Date<span>{{$booking->start_date}} to {{$booking->end_date}}</span></li>
		                		<li>No of Person<span>{{$booking->no_of_person}}</span></li>
		                		<li>No of Days<span>{{$booking->no_of_days}}</span></li>
		                	</ul>
		                        <ul class="clearfix">
                        	<?php
                        	$breakfast_price=0;
                        	$lunch_price=0;
                        	$dinner_price=0;
                        	?>
                            @if($booking->breakfast_price != '')
				            	<li>Breakfast Price<span>AED {{$booking->breakfast_price}}</span></li>
				            <?php $breakfast_price = $booking->breakfast_price; ?>
				            @endif
				            @if($booking->lunch_price != '')
				            	<li>Lunch Price<span>AED {{$booking->lunch_price}}</span></li>
				            <?php $lunch_price = $booking->lunch_price; ?>
				            @endif
				            @if($booking->dinner_price != '')
				            	<li>Dinner Price<span>AED {{$booking->dinner_price}}</span></li>
				            <?php $dinner_price = $booking->dinner_price; ?>
				            @endif
		                        </ul>
		                        <ul class="clearfix">
		                            <li>Subtotal<span id="subtotal_label">{{$booking->subtotal}}</span><span>AED&nbsp;</span></li>
                                    @if($booking->coupon_id != '')
                                    <li style="color: #567854;" id="coupon_label">Coupon ({{$booking->coupon_id}})<span>- AED {{$booking->discount_amount}}</span></li>
                                    @endif
		                            <li>Tax (5%)<span id="tax_label">{{$booking->tax}}</span><span>AED&nbsp;</span></li>
		                            <li class="total">Total<span id="total_label">{{$booking->total}}</span><span>AED&nbsp;</span></li>
		                        </ul>
		                        <input value="0" type="hidden" name="subtotal" id="subtotal">
		                        <input value="0" type="hidden" name="tax" id="tax">
		                        <input value="0" type="hidden" name="total" id="total">
		                    </div>
		                </div>
		            </form>
		                <!-- /box_order -->
		                <!-- <div class="btn_reserve_fixed"><a href="#0" class="btn_1 gradient full-width">View Basket</a></div> -->
		            </div>
		        </div>
		        <!-- /row -->
		    </div>
		    <!-- /container -->
		</div>
		<!-- /bg_gray -->

	</main>
	<!-- /main -->

@endsection
@section('extra-js')
    <script src="/web_assets/js/sticky_sidebar.min.js"></script>
    <script src="/web_assets/js/specific_listing.js"></script>
    <script src="/web_assets/js/specific_detail.js"></script>
<script type="text/javascript">

$( "#no_of_person" ).keyup(function() {
	var breakfast_price = 0;
	var lunch_price = 0;
	var dinner_price = 0;
	if($("#breakfast_enable").is(':checked')){
        breakfast_price = Number($("#breakfast_price").val());
    } 
    if($("#lunch_enable").is(':checked')){
        lunch_price = Number($("#lunch_price").val());
    } 
    if($("#dinner_enable").is(':checked')){
        dinner_price = Number($("#dinner_price").val());
    } 
	var no_of_person = Number($("#no_of_person").val());
	var no_of_days = Number($("#no_of_days").val());

	var subtotal = ( Number(no_of_person) * ( Number(breakfast_price) + Number(lunch_price) + Number(dinner_price) ) ) * Number(no_of_days);
	
	var tax =(5 / 100) * subtotal;

	tax1 = tax.toFixed(2);

	var total = subtotal + tax1;

	$("#subtotal_label").text(subtotal);
	$("#tax_label").text(tax1);
	$("#total_label").text(Math.round(total));

	$("#subtotal").val(subtotal);
	$("#tax").val(tax1);
	$("#total").val(Math.round(total));
});

$( "#no_of_days" ).keyup(function() {
	var breakfast_price = 0;
	var lunch_price = 0;
	var dinner_price = 0;
	if($("#breakfast_enable").is(':checked')){
        breakfast_price = Number($("#breakfast_price").val());
    } 
    if($("#lunch_enable").is(':checked')){
        lunch_price = Number($("#lunch_price").val());
    } 
    if($("#dinner_enable").is(':checked')){
        dinner_price = Number($("#dinner_price").val());
    } 

	var no_of_person = Number($("#no_of_person").val());
	var no_of_days = Number($("#no_of_days").val());

	var subtotal = ( Number(no_of_person) * ( Number(breakfast_price) + Number(lunch_price) + Number(dinner_price) ) ) * Number(no_of_days);
	
	var tax =(5 / 100) * subtotal;

	tax1 = tax.toFixed(2);

	var total = subtotal + tax1;

	$("#subtotal_label").text(subtotal);
	$("#tax_label").text(tax1);
	$("#total_label").text(Math.round(total));

	$("#subtotal").val(subtotal);
	$("#tax").val(tax1);
	$("#total").val(Math.round(total));
});

function padNumber(number) {
    var string  = '' + number;
    string      = string.length < 2 ? '0' + string : string;
    return string;
}

$( "#start_date" ).change(function() {
	var no_of_days = Number($("#no_of_days").val());
	if(no_of_days > 0){
	var start_date = $("#start_date").val();

	var count_days = no_of_days - 1;

	var date = new Date(start_date);
    var next_date = new Date(date.setDate(date.getDate() + count_days));
    var formatted = next_date.getUTCFullYear() + '-' + padNumber(next_date.getUTCMonth() + 1) + '-' + padNumber(next_date.getUTCDate());

    $("#end_date").val(formatted);
	}
	else{
		toastr.error('No of Days Filled id Empty');
		$("#start_date").val('');
	}
});

$( "#start_date" ).click(function() {
	var no_of_days = Number($("#no_of_days").val());
	if(no_of_days > 0){
	var start_date = $("#start_date").val();

	var count_days = no_of_days - 1;

	var date = new Date(start_date);
    var next_date = new Date(date.setDate(date.getDate() + count_days));
    var formatted = next_date.getUTCFullYear() + '-' + padNumber(next_date.getUTCMonth() + 1) + '-' + padNumber(next_date.getUTCDate());

    $("#end_date").val(formatted);
	}
	else{
		toastr.error('No of Days Filled id Empty');
		$("#start_date").val('');
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
          console.log(data);                
          $("#form")[0].reset();
          toastr.success(data.message, 'Successfully Save');
          window.location.href="/order-page/"+data.id;
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


$( "#breakfast_enable" ).click(function() {
	var breakfast_price = 0;
	var lunch_price = 0;
	var dinner_price = 0;
	if($("#breakfast_enable").is(':checked')){
        breakfast_price = Number($("#breakfast_price").val());
    } 
    if($("#lunch_enable").is(':checked')){
        lunch_price = Number($("#lunch_price").val());
    } 
    if($("#dinner_enable").is(':checked')){
        dinner_price = Number($("#dinner_price").val());
    } 

	var no_of_person = Number($("#no_of_person").val());
	var no_of_days = Number($("#no_of_days").val());

	var subtotal = ( Number(no_of_person) * ( Number(breakfast_price) + Number(lunch_price) + Number(dinner_price) ) ) * Number(no_of_days);
	
	var tax =(5 / 100) * subtotal;

	tax1 = tax.toFixed(2);

	var total = subtotal + tax1;

	$("#subtotal_label").text(subtotal);
	$("#tax_label").text(tax1);
	$("#total_label").text(Math.round(total));

	$("#subtotal").val(subtotal);
	$("#tax").val(tax1);
	$("#total").val(Math.round(total));
});

$( "#lunch_enable" ).click(function() {
	var breakfast_price = 0;
	var lunch_price = 0;
	var dinner_price = 0;
	if($("#breakfast_enable").is(':checked')){
        breakfast_price = Number($("#breakfast_price").val());
    } 
    if($("#lunch_enable").is(':checked')){
        lunch_price = Number($("#lunch_price").val());
    } 
    if($("#dinner_enable").is(':checked')){
        dinner_price = Number($("#dinner_price").val());
    } 

	var no_of_person = Number($("#no_of_person").val());
	var no_of_days = Number($("#no_of_days").val());

	var subtotal = ( Number(no_of_person) * ( Number(breakfast_price) + Number(lunch_price) + Number(dinner_price) ) ) * Number(no_of_days);
	
	var tax =(5 / 100) * subtotal;

	tax1 = tax.toFixed(2);

	var total = subtotal + tax1;

	$("#subtotal_label").text(subtotal);
	$("#tax_label").text(tax1);
	$("#total_label").text(Math.round(total));

	$("#subtotal").val(subtotal);
	$("#tax").val(tax1);
	$("#total").val(Math.round(total));
});

$( "#dinner_enable" ).click(function() {
	var breakfast_price = 0;
	var lunch_price = 0;
	var dinner_price = 0;
	if($("#breakfast_enable").is(':checked')){
        breakfast_price = Number($("#breakfast_price").val());
    } 
    if($("#lunch_enable").is(':checked')){
        lunch_price = Number($("#lunch_price").val());
    } 
    if($("#dinner_enable").is(':checked')){
        dinner_price = Number($("#dinner_price").val());
    }

	var no_of_person = Number($("#no_of_person").val());
	var no_of_days = Number($("#no_of_days").val());

	var subtotal = ( Number(no_of_person) * ( Number(breakfast_price) + Number(lunch_price) + Number(dinner_price) ) ) * Number(no_of_days);
	
	var tax =(5 / 100) * subtotal;

	tax1 = tax.toFixed(2);

	var total = subtotal + tax1;

	$("#subtotal_label").text(subtotal);
	$("#tax_label").text(tax1);
	$("#total_label").text(Math.round(total));

	$("#subtotal").val(subtotal);
	$("#tax").val(tax1);
	$("#total").val(Math.round(total));
});

</script>
@endsection