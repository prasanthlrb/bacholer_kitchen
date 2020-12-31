@extends('customer.layouts')
@section('extra-css')
<link href="/web_assets/css/order-sign_up.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection
@section('content')
<style>
/* Pagination */
ul.pagination {
  text-align: center;
  margin-top: 15px;
}
ul.pagination li {
  color: #333;
  display: inline-block;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  border-radius: 3px;
  margin: 0 2px;
}
ul.pagination li:hover {
  background-color: #f0f0f0;
}
ul.pagination li.active {
  background-color: #333;
  color: white;
}
</style>
  <main class="bg_gray">
    
    <div class="container margin_60_40">
        <div class="row justify-content-center">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Booking ID</th>
	                <th>Package Name</th>
                  <th>Available Dates</th>
                  <th>Available Time</th>
                  <th>Total</th>
	                <th>Payment Type</th>
	                <th>Payment Status</th>
	                <th>Status</th>
	                <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php $x=1; ?>
              	@foreach($booking as $key => $row)
              	@if($row->payment_type == '1' && $row->payment_status == '0')
              	@else
              	<tr>
              		<td>{{$x}}</td>
              		<td>#{{$row->id}}</td>
              		<td>{{$row->package_title_english}}</td>
              		<td>{{$row->start_date}} to {{$row->end_date}}</td>
              		<td>
              			@if($row->breakfast_price != '')
			            	Breakfast Price<span>AED {{$row->breakfast_price}}</span>
			            	<br>
			            @endif
			            @if($row->lunch_price != '')
			            	Lunch Price<span>AED {{$row->lunch_price}}</span>
			            	<br>
			            @endif
			            @if($row->dinner_price != '')
			            	Dinner Price <span>AED {{$row->dinner_price}}</span>
			            @endif
              		</td>
              		<td>AED {{$row->total}}</td>
              		<td>
              			@if($row->payment_type == 0)
              				Cash
              			@else
              				Card
              			@endif
              		</td>
              		<td>
              			@if($row->payment_status == 0)
              				Un Paid
              			@else
              				Paid
              			@endif
              		</td>
              		<td>
              			@if($row->status == 0)
              				<span style="color:#72B709;">Active</span>
              			@else
              				<span style="color:#C23C1F;">Canceled</span>
              			@endif
              		</td>
              		<td>
              			<a href="/customer/view-package/{{$row->id}}">View</a>
              		</td>
              	</tr>
              	<?php $x++; ?>
              	@endif
              	@endforeach
              </tbody>
              <tfoot>
                <tr>
                    <th>#</th>
                    <th>Booking ID</th>
	                <th>Package Name</th>
                    <th>Available Dates</th>
                    <th>Available Time</th>
                    <th>Total</th>
	                <th>Payment Type</th>
	                <th>Payment Status</th>
	                <th>Status</th>
	                <th>Action</th>
                </tr>
              </tfoot>
            </table>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    
  </main>
  <!-- /main -->

  @endsection
@section('extra-js')
    <script src="/web_assets/js/sticky_sidebar.min.js"></script>
    <script src="/web_assets/js/specific_listing.js"></script>
    <script src="/app-assets/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="/app-assets/js/data-tables/datatable-basic.js" type="text/javascript"></script>
@endsection