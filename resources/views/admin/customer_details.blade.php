@extends('admin.layouts')
@section('extra-css')
<!-- 	<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css"> -->
@endsection
@section('body-section')
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
            <div class="chat-application">
  <div class="content-overlay"></div>
  <div class="chat-sidebar float-left d-none d-sm-none d-md-block d-lg-block">
    <div class="chat-sidebar-content">
      <div class="chat-fixed-search p-2">
        <form>
          <div class="position-relative has-icon-left">
            <input class="form-control" id="timesheetinput1" name="employeename" type="text">
            <div class="form-control-position">
              <i class="ft-user"></i>
            </div>
          </div>
        </form>
      </div>
      <div id="users-list" class="list-group position-relative">
        <div class="users-list-padding">
          @foreach($all_customer as $row)
          <a href="/admin/customer-details/{{$row->id}}" class="list-group-item border-0">
            <span class="media">
              <span class="avatar avatar-md avatar-online">
                <img class="media-object d-flex mr-3 bg-primary height-50 rounded-circle" src="http://app.isalonuae.com/app-assets/images/portrait/small/avatar-s-8.jpg"
                  alt="Generic placeholder image">
                <i></i>
              </span>
              <div class="media-body">
                <h6 class="list-group-item-heading">{{$row->first_name}} {{$row->last_name}}</h6>
                <p class="list-group-item-text text-muted">
                  {{$row->phone}}</p>
              </div>
            </span>
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="chat-name p-2 bg-white">
    <div class="media">
      <span class="chat-app-sidebar-toggle ft-align-justify font-large-1 mr-2 d-none d-block d-sm-block d-md-none"></span>
      <div class="media-body">
        <img src="http://app.isalonuae.com/app-assets/images/portrait/small/avatar-s-8.jpg" width="37" class="rounded-circle mr-1" alt="avatar" />
        <span>{{$customer->first_name}} {{$customer->last_name}}</span>
        <!-- <i class="ft-more-vertical float-right mt-1 dropdown-toggle" id="chatOptions" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"></i>
        <div class="dropdown-menu" aria-labelledby="chatOptions">
          <a href="#" class="dropdown-item">View Profile</a>
          <a href="#" class="dropdown-item">Mute Notification</a>
          <a href="#" class="dropdown-item">Clear Chat</a>
          <a href="#" class="dropdown-item">Add Shortcut</a>
        </div> -->
      </div>
    </div>
  </div>

<style type="text/css">
  .chat-application .chat-app-window {
    height: calc(100%) !important; 
  }
</style>
  <section class="chat-app-window">
    
  <div class="card">
    <div class="card-content">
      <div class="card-body">
        <ul class="nav nav-tabs" role="tablist">
        	
          <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile" role="tab"
              aria-selected="true">
              <i class="bx bx-home align-middle"></i>
              <span class="align-middle">View Profile</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="order-details-tab" data-toggle="tab" href="#order-details" aria-controls="order-details" role="tab"
              aria-selected="false">
              <i class="bx bx-message-square align-middle"></i>
              <span class="align-middle">Order History</span>
            </a>
          </li>


        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="profile" aria-labelledby="profile-tab" role="tabpanel">
            <h6>PERSONAL INFORAMTION</h6>
                
              <div class="row">
                  <div class="col-md-4">
                    <span class="text-bold-500 primary"><a><i class="icon-present font-small-3"></i> First Name:</a></span>
                    <span class="d-block overflow-hidden">{{$customer->first_name}}</span>
                  </div>
                  <div class="col-md-4">
                    <span class="text-bold-500 primary"><a><i class="icon-present font-small-3"></i> Last Name:</a></span>
                    <span class="d-block overflow-hidden">{{$customer->last_name}}</span>
                  </div>
                  <div class="col-md-4">
                    <span class="text-bold-500 primary"><a><i class="ft-mail font-small-3"></i> Email:</a></span>
                    <a class="d-block overflow-hidden">{{$customer->email}}</a>
                  </div>
                  <div class="col-md-4">
                    <span class="text-bold-500 primary"><a><i class="ft-smartphone font-small-3"></i> Phone Number:</a></span>
                    <span class="d-block overflow-hidden">(+971) {{$customer->phone}}</span>
                  </div>
                </ul>
            </div>

          </div>


          <div class="tab-pane" id="order-details" aria-labelledby="ride-history-tab" role="tabpanel">

            <div class="table-responsive">
                <table class="table zero-configuration">
                    <thead>
                      <tr>
                          <th>Booking ID</th>
                          <th>Package Name</th>
                          <th>Package <br>Duration</th>
                          <th>Total</th>
                          <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $x=1; ?>
              	@foreach($booking as $key => $row)
              	@if($row->payment_type == '1' && $row->payment_status == '0')
              	@else
              	<tr>
              		<td>#{{$row->id}}</td>
              		<td>{{$row->package_title_english}}</td>
              		<td>{{$row->start_date}} to {{$row->end_date}}</td>
              		<td>AED {{$row->total}}</td>
              		<td>
              			@if($row->status == 0)
              				<span style="color:#72B709;">Active</span>
              			@else
              				<span style="color:#C23C1F;">Canceled</span>
              			@endif
              		</td>
              	</tr>
              	<?php $x++; ?>
              	@endif
              	@endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                          <th>Booking ID</th>
                          <th>Package Name</th>
                          <th>Package <br>Duration</th>
                          <th>Total</th>
                          <th>Status</th>
                      </tr>
                    </tfoot>
                </table>
            </div>

          </div>


        </div>
      </div>
    </div>
  </div>


  </section>
</div>

          </div>
        </div>
        <!-- END : End Main Content-->

@endsection
@section('extra-js')
  
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="/app-assets/js/chat.js" type="text/javascript"></script>

<script>
$('.customer').addClass('active');


</script>
@endsection