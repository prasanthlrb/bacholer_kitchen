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
                    <th>S.No</th>
                    <th>Coupon Code</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Discount Type</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @php ($x = 0) @endphp
                @foreach($coupon as $row)
                @php $x++ @endphp
                  <tr>
                    <td>{{$x}}</td>
                    <td>
                      @if(date('Y-m-d') > $row->end_date )
                        <span style="color:red">{{$row->coupon_code}}</span>
                      @else
                        <span style="color:green">{{$row->coupon_code}}</span>
                      @endif
                    </td>
                    <td>{{$row->start_date}}</td>
                    <td>{{$row->end_date}}</td>
                    <td>
                      @if($row->discount_type == '1')
                      Discount from total cart
                      @elseif($row->discount_type == '2')
                      Discount % from total cart
                      @endif
                    </td>
                    <td>{{$row->amount}}</td>
                    <td>
                    	@if($row->status == 1)
                    	Active
                    	@else
                    	DeActive
                    	@endif
                    </td>
                  </tr>
                @endforeach 
              </tbody>
              <tfoot>
                <tr>
                    <th>S.No</th>
                    <th>Coupon Code</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Discount Type</th>
                    <th>Amount</th>
                    <th>Status</th>
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