@extends('admin.layouts')
@section('extra-css')
	<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection
@section('body-section')
        <div class="main-content">
          <div class="content-wrapper"><!-- Zero configuration table -->
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <!-- <h4 class="card-title">
          	<button type="button" class="btn btn-primary" id="add_new">
            Add New Kitchen
        	</button>
          </h4> -->
          <!-- <p class="card-text">DataTables has most features enabled by default, so all you need to do to use it withyour own ables is to call the construction function: $().DataTable();.</p> -->
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
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
	                <!-- <th>Action</th> -->
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
              		<!-- <td>
              			<a href="/customer/view-package/{{$row->id}}">View</a>
              		</td> -->
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
	                <!-- <th>Action</th> -->
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Zero configuration table -->


          </div>
        </div>
        <!-- END : End Main Content-->


@endsection
@section('extra-js')
	<script src="/app-assets/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="/app-assets/js/data-tables/datatable-basic.js" type="text/javascript"></script>
<script>
$('.booking').addClass('active');

</script>
@endsection