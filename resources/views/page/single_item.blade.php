@extends('page.app')
@section('extra-css')
<link href="/web_assets/css/detail-page.css" rel="stylesheet">
@endsection
@section('content')
<style type="text/css">
    .input-group {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  width: 100%; }
  .input-group > .form-control,
  .input-group > .form-control-plaintext,
  .input-group > .custom-select,
  .input-group > .custom-file {
    position: relative;
    flex: 1 1 auto;
    width: 1%;
    margin-bottom: 0; }
    .input-group > .form-control + .form-control,
    .input-group > .form-control + .custom-select,
    .input-group > .form-control + .custom-file,
    .input-group > .form-control-plaintext + .form-control,
    .input-group > .form-control-plaintext + .custom-select,
    .input-group > .form-control-plaintext + .custom-file,
    .input-group > .custom-select + .form-control,
    .input-group > .custom-select + .custom-select,
    .input-group > .custom-select + .custom-file,
    .input-group > .custom-file + .form-control,
    .input-group > .custom-file + .custom-select,
    .input-group > .custom-file + .custom-file {
      margin-left: -1px; }
  .input-group > .form-control:focus,
  .input-group > .custom-select:focus,
  .input-group > .custom-file .custom-file-input:focus ~ .custom-file-label {
    z-index: 3; }
  .input-group > .custom-file .custom-file-input:focus {
    z-index: 4; }
  .input-group > .form-control:not(:last-child),
  .input-group > .custom-select:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0; }
  .input-group > .form-control:not(:first-child),
  .input-group > .custom-select:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0; }
  .input-group > .custom-file {
    display: flex;
    align-items: center; }
    .input-group > .custom-file:not(:last-child) .custom-file-label,
    .input-group > .custom-file:not(:last-child) .custom-file-label::after {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0; }
    .input-group > .custom-file:not(:first-child) .custom-file-label {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0; }

.input-group-prepend,
.input-group-append {
  display: flex; }
  .input-group-prepend .btn, .input-group-prepend .fc button, .fc .input-group-prepend button,
  .input-group-append .btn,
  .input-group-append .fc button,
  .fc .input-group-append button {
    position: relative;
    z-index: 2; }
    .input-group-prepend .btn:focus, .input-group-prepend .fc button:focus, .fc .input-group-prepend button:focus,
    .input-group-append .btn:focus,
    .input-group-append .fc button:focus,
    .fc .input-group-append button:focus {
      z-index: 3; }
  .input-group-prepend .btn + .btn, .input-group-prepend .fc button + .btn, .fc .input-group-prepend button + .btn, .input-group-prepend .fc .btn + button, .fc .input-group-prepend .btn + button, .input-group-prepend .fc button + button, .fc .input-group-prepend button + button,
  .input-group-prepend .btn + .input-group-text,
  .input-group-prepend .fc button + .input-group-text,
  .fc .input-group-prepend button + .input-group-text,
  .input-group-prepend .input-group-text + .input-group-text,
  .input-group-prepend .input-group-text + .btn,
  .input-group-prepend .fc .input-group-text + button,
  .fc .input-group-prepend .input-group-text + button,
  .input-group-append .btn + .btn,
  .input-group-append .fc button + .btn,
  .fc .input-group-append button + .btn,
  .input-group-append .fc .btn + button,
  .fc .input-group-append .btn + button,
  .input-group-append .fc button + button,
  .fc .input-group-append button + button,
  .input-group-append .btn + .input-group-text,
  .input-group-append .fc button + .input-group-text,
  .fc .input-group-append button + .input-group-text,
  .input-group-append .input-group-text + .input-group-text,
  .input-group-append .input-group-text + .btn,
  .input-group-append .fc .input-group-text + button,
  .fc .input-group-append .input-group-text + button {
    margin-left: -1px; }

.input-group-prepend {
  margin-right: -1px; }

.input-group-append {
  margin-left: -1px; }

.input-group-text {
  display: flex;
  align-items: center;
  padding: 0.375rem 0.75rem;
  margin-bottom: 0;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  text-align: center;
  white-space: nowrap;
  background-color: #e9ecef;
  border: 1px solid #ced4da;
  border-radius: 0.25rem; }
  .input-group-text input[type="radio"],
  .input-group-text input[type="checkbox"] {
    margin-top: 0; }

.input-group-lg > .form-control:not(textarea),
.input-group-lg > .custom-select {
  height: calc(1.5em + 1rem + 2px); }

.input-group-lg > .form-control,
.input-group-lg > .custom-select,
.input-group-lg > .input-group-prepend > .input-group-text,
.input-group-lg > .input-group-append > .input-group-text,
.input-group-lg > .input-group-prepend > .btn,
.fc .input-group-lg > .input-group-prepend > button,
.input-group-lg > .input-group-append > .btn,
.fc .input-group-lg > .input-group-append > button {
  padding: 0.5rem 1rem;
  font-size: 1.25rem;
  line-height: 1.5;
  border-radius: 0.3rem; }

.input-group-sm > .form-control:not(textarea),
.input-group-sm > .custom-select {
  height: calc(1.5em + 0.5rem + 2px); }

.input-group-sm > .form-control,
.input-group-sm > .custom-select,
.input-group-sm > .input-group-prepend > .input-group-text,
.input-group-sm > .input-group-append > .input-group-text,
.input-group-sm > .input-group-prepend > .btn,
.fc .input-group-sm > .input-group-prepend > button,
.input-group-sm > .input-group-append > .btn,
.fc .input-group-sm > .input-group-append > button {
  padding: 0.25rem 0.5rem;
  font-size: 0.875rem;
  line-height: 1.5;
  border-radius: 0.2rem; }

.input-group-lg > .custom-select,
.input-group-sm > .custom-select {
  padding-right: 1.75rem; }

.input-group > .input-group-prepend > .btn, .fc .input-group > .input-group-prepend > button,
.input-group > .input-group-prepend > .input-group-text,
.input-group > .input-group-append:not(:last-child) > .btn,
.fc .input-group > .input-group-append:not(:last-child) > button,
.input-group > .input-group-append:not(:last-child) > .input-group-text,
.input-group > .input-group-append:last-child > .btn:not(:last-child):not(.dropdown-toggle),
.fc .input-group > .input-group-append:last-child > button:not(:last-child):not(.dropdown-toggle),
.input-group > .input-group-append:last-child > .input-group-text:not(:last-child) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0; }

.input-group > .input-group-append > .btn, .fc .input-group > .input-group-append > button,
.input-group > .input-group-append > .input-group-text,
.input-group > .input-group-prepend:not(:first-child) > .btn,
.fc .input-group > .input-group-prepend:not(:first-child) > button,
.input-group > .input-group-prepend:not(:first-child) > .input-group-text,
.input-group > .input-group-prepend:first-child > .btn:not(:first-child),
.fc .input-group > .input-group-prepend:first-child > button:not(:first-child),
.input-group > .input-group-prepend:first-child > .input-group-text:not(:first-child) {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0; }
</style>
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
		                        <ul class="clearfix">
		                    <?php
		                    $userid='';
		                    if(!empty(Auth::user()->id)){
		                    	$userid = Auth::user()->id;
		                    }
		                    ?>
		                    <input type="hidden" name="user_id" id="user_id" value="{{$userid}}">
		                    <input type="hidden" name="package_id" id="package_id" value="{{$food_package->id}}">
		                    <input type="hidden" name="breakfast_price" id="breakfast_price" value="{{$food_package->breakfast_price}}">
		                    <input type="hidden" name="lunch_price" id="lunch_price" value="{{$food_package->lunch_price}}">
		                    <input type="hidden" name="dinner_price" id="dinner_price" value="{{$food_package->dinner_price}}">
                        	<?php
                        	$breakfast_price=0;
                        	$lunch_price=0;
                        	$dinner_price=0;
                        	?>
                            @if($food_package->breakfast_enable == 1)
				            	<li>
				            		<label class="container_check version_2">
	                                    <input checked type="checkbox" value="1" name="breakfast_enable" id="breakfast_enable">
	                                    <span class="checkmark"></span>
	                                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                                Breakfast Price<span>AED {{$food_package->breakfast_price}}</span></li>
				            <?php $breakfast_price = $food_package->breakfast_price; ?>
				            @endif
				            @if($food_package->lunch_enable == 1)
				            	<li>
				            		<label class="container_check version_2">
	                                    <input checked type="checkbox" value="1" name="lunch_enable" id="lunch_enable">
	                                    <span class="checkmark"></span>
	                                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                Lunch Price<span>AED {{$food_package->lunch_price}}</span></li>
				            <?php $lunch_price = $food_package->lunch_price; ?>
				            @endif
				            @if($food_package->dinner_enable == 1)
				            	<li>
				            		<label class="container_check version_2">
	                                    <input checked type="checkbox" value="1" name="dinner_enable" id="dinner_enable">
	                                    <span class="checkmark"></span>
	                                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				            		Dinner Price<span>AED {{$food_package->dinner_price}}</span></li>
				            <?php $dinner_price = $food_package->dinner_price; ?>
				            @endif
		                        </ul>
		                        <div class="row ">
		                            <div class="col-12">
		                            	<label>No of Person</label>
		                                <input class="form-control" type="text" name="no_of_person" id="no_of_person" placeholder="No of Person">
		                            </div>
		                        </div>
		                        <div class="row ">
		                            <div class="col-12">
		                            	<label>No of Days</label>
		                                <input class="form-control" type="text" name="no_of_days" id="no_of_days" placeholder="No of Days">
		                            </div>
		                        </div>
                                @if(!empty(Auth::user()->id))
                                <div class="row opt_order">
                                    <div class="col-12">
                                        <label>Coupon Code</label>

                                  <div class="input-group">
                                    <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Coupon Code" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                      <button id="coupon_apply" class="btn_1" type="button">Apply</button>
                                    </div>
                                  </div>

                                        <input type="hidden" id="coupon_id" name="coupon_id">
                                        <input type="hidden" id="discount_amount" name="discount_amount">
                                    </div>
                                </div>
                                @endif
		                        <ul class="clearfix">
		                            <li>Subtotal<span id="subtotal_label">0</span><span>AED&nbsp;</span></li>
                                    <li style="color: #567854;" id="coupon_label"></li>
		                            <li>Tax (5%)<span id="tax_label">0</span><span>AED&nbsp;</span></li>
		                            <li class="total">Total<span id="total_label">0</span><span>AED&nbsp;</span></li>
		                        </ul>
		                        <input value="0" type="hidden" name="subtotal" id="subtotal">
                                <input value="0" type="hidden" name="after_discount" id="after_discount">
		                        <input value="0" type="hidden" name="tax" id="tax">
		                        <input value="0" type="hidden" name="total" id="total">
		                        <!-- <div class="row opt_order">
		                            <div class="col-6">
		                                <label class="container_radio">Delivery
		                                    <input type="radio" value="option1" name="opt_order" checked>
		                                    <span class="checkmark"></span>
		                                </label>
		                            </div>
		                            <div class="col-6">
		                                <label class="container_radio">Take away
		                                    <input type="radio" value="option1" name="opt_order">
		                                    <span class="checkmark"></span>
		                                </label>
		                            </div>
		                        </div> -->
		                        <div class="row ">
		                            <div class="col-12">
		                            	<label>Starting Date</label>
		                                <input class="form-control" type="date" name="start_date" id="start_date" placeholder="Starting Date" min="<?php echo date('Y-m-d', strtotime("+1 days")); ?>" max="<?php echo date('Y-m-d', strtotime("+60 days")); ?>" >
		                            </div>
		                        </div>
		                        <div class="row ">
		                            <div class="col-12">
		                            	<label>End Date</label>
		                                <input readonly class="form-control" type="date" name="end_date" id="end_date" placeholder="End Date">
		                            </div>
		                        </div>
                                
		                        <!-- <div class="dropdown day">
		                            <a href="#" data-toggle="dropdown">Day <span id="selected_day"></span></a>
		                            <div class="dropdown-menu">
		                                <div class="dropdown-menu-content">
		                                    <h4>Which day delivered?</h4>
		                                    <div class="radio_select chose_day">
		                                        <ul>
		                                            <li>
		                                                <input type="radio" id="day_1" name="day" value="Today">
		                                                <label for="day_1">Today<em>-40%</em></label>
		                                            </li>
		                                            <li>
		                                                <input type="radio" id="day_2" name="day" value="Tomorrow">
		                                                <label for="day_2">Tomorrow<em>-40%</em></label>
		                                            </li>
		                                        </ul>
		                                    </div>
		                                </div>
		                            </div>
		                        </div> -->
		                        <!-- /dropdown -->
		                        <br>
		                        <div class="btn_1_mobile">
		                            <a onclick="Save()" class="btn_1 gradient full-width mb_5">Order Now</a>
		                            <div class="text-center"><small>No money charged on this steps</small></div>
		                        </div>
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

$( "#coupon_apply" ).click(function() {
    var user_id = Number($("#user_id").val());
    var coupon_code = $("#coupon_code").val();
    var subtotal = Number($("#subtotal").val());
    if(coupon_code != ''){
        $.ajax({        
            url : '/coupon-code-apply/'+user_id+'/'+coupon_code+'/'+subtotal,
            type: "GET",
            success: function(data)
            {
                if(data.status == 0){
                    var coupon_code = data.coupon_code;
                    var discount = Number(data.discount);
                    var discount_type = Number(data.discount_type);
                    var max_value = Number(data.max_value);
                    var discount_amount=0;

                    if(discount_type == 1){
                        discount_amount = discount;
                    }
                    else if(discount_type == 2){
                        var discount1 = (discount / 100) * subtotal;
                        if(discount1 >= max_value){
                            discount_amount = max_value;
                        }
                        else{
                            discount_amount = discount1;
                        }
                    }

                    var after_discount = subtotal - discount_amount;
    
                    var tax =(5 / 100) * after_discount;

                    tax1 = tax.toFixed(2);

                    var total = Number(after_discount) + Number(tax1);

                    var coupon_label = 'Coupon ('+coupon_code+')<span>- AED '+discount_amount+'</span>';

                    $("#coupon_label").html(coupon_label);
                    $("#subtotal_label").text(subtotal);
                    $("#tax_label").text(tax1);
                    $("#total_label").text(Math.round(total));

                    $("#subtotal").val(subtotal);
                    $("#discount_amount").val(discount_amount);
                    $("#coupon_id").val(coupon_code);
                    $("#after_discount").val(after_discount);
                    $("#tax").val(tax1);
                    $("#total").val(Math.round(total));

                    toastr.success(data.message); 
                }
                else{
                    var after_discount = subtotal - 0;
    
                    var tax =(5 / 100) * after_discount;

                    tax1 = tax.toFixed(2);

                    var total = Number(after_discount) + Number(tax1);

                    var coupon_label = '';

                    $("#coupon_label").html(coupon_label);
                    $("#subtotal_label").text(subtotal);
                    $("#tax_label").text(tax1);
                    $("#total_label").text(Math.round(total));

                    $("#subtotal").val(subtotal);
                    $("#discount_amount").val('0');
                    $("#coupon_id").val('');
                    $("#after_discount").val(after_discount);
                    $("#tax").val(tax1);
                    $("#total").val(Math.round(total));
                    toastr.error(data.message); 
                }
            }
        });
    }
    else{
       toastr.error('Please Enter Your Coupon Code'); 
    }
});

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
    var discount_amount = Number($("#discount_amount").val());

	var subtotal = ( Number(no_of_person) * ( Number(breakfast_price) + Number(lunch_price) + Number(dinner_price) ) ) * Number(no_of_days);


    var after_discount = subtotal - discount_amount;
	
	var tax =(5 / 100) * after_discount;

	tax1 = tax.toFixed(2);

	var total = Number(after_discount) + Number(tax1);

    $("#subtotal_label").text(subtotal);
	$("#tax_label").text(tax1);
	$("#total_label").text(Math.round(total));

	$("#subtotal").val(subtotal);
    $("#after_discount").val(after_discount);
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
    var discount_amount = Number($("#discount_amount").val());

    var subtotal = ( Number(no_of_person) * ( Number(breakfast_price) + Number(lunch_price) + Number(dinner_price) ) ) * Number(no_of_days);


    var after_discount = subtotal - discount_amount;
    
    var tax =(5 / 100) * after_discount;

    tax1 = tax.toFixed(2);

    var total = Number(after_discount) + Number(tax1);

    $("#subtotal_label").text(subtotal);
    $("#tax_label").text(tax1);
    $("#total_label").text(Math.round(total));

    $("#subtotal").val(subtotal);
    $("#after_discount").val(after_discount);
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
        url : '/save-cart',
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
var discount_amount = Number($("#discount_amount").val());

    var subtotal = ( Number(no_of_person) * ( Number(breakfast_price) + Number(lunch_price) + Number(dinner_price) ) ) * Number(no_of_days);


    var after_discount = subtotal - discount_amount;
    
    var tax =(5 / 100) * after_discount;

    tax1 = tax.toFixed(2);

    var total = Number(after_discount) + Number(tax1);

    $("#subtotal_label").text(subtotal);
    $("#tax_label").text(tax1);
    $("#total_label").text(Math.round(total));

    $("#subtotal").val(subtotal);
    $("#after_discount").val(after_discount);
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
var discount_amount = Number($("#discount_amount").val());

    var subtotal = ( Number(no_of_person) * ( Number(breakfast_price) + Number(lunch_price) + Number(dinner_price) ) ) * Number(no_of_days);


    var after_discount = subtotal - discount_amount;
    
    var tax =(5 / 100) * after_discount;

    tax1 = tax.toFixed(2);

    var total = Number(after_discount) + Number(tax1);

    $("#subtotal_label").text(subtotal);
    $("#tax_label").text(tax1);
    $("#total_label").text(Math.round(total));

    $("#subtotal").val(subtotal);
    $("#after_discount").val(after_discount);
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
var discount_amount = Number($("#discount_amount").val());

    var subtotal = ( Number(no_of_person) * ( Number(breakfast_price) + Number(lunch_price) + Number(dinner_price) ) ) * Number(no_of_days);


    var after_discount = subtotal - discount_amount;
    
    var tax =(5 / 100) * after_discount;

    tax1 = tax.toFixed(2);

    var total = Number(after_discount) + Number(tax1);

    $("#subtotal_label").text(subtotal);
    $("#tax_label").text(tax1);
    $("#total_label").text(Math.round(total));

    $("#subtotal").val(subtotal);
    $("#after_discount").val(after_discount);
    $("#tax").val(tax1);
    $("#total").val(Math.round(total));
});

</script>
@endsection