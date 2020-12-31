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
          <h4 class="card-title">
          	<button type="button" class="btn btn-primary" id="add_new">
            Create Coupon
        	</button>
          </h4>
          <!-- <p class="card-text">DataTables has most features enabled by default, so all you need to do to use it withyour own ables is to call the construction function: $().DataTable();.</p> -->
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr>
                  	<th>S.No</th>
                    <th>Coupon Code</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Discount Type</th>
                    <th>Amount</th>
                    <th>Action</th>
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
                    <td><div class="dropdown">
                        <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">Action
                        </span>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-125px, 19px, 0px); top: 0px; left: 0px; will-change: transform;">
                          <a class="dropdown-item" href="/admin/view-coupon/{{$row->id}}"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                          <a onclick="Delete({{$row->id}})" class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                        </div>
                      </div>
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
                    <th>Action</th>
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
$('.coupon').addClass('active');

var action_type;
$('#add_new').click(function(){
	window.location.href="/admin/add-coupon/";
});

function Delete(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/admin/coupon-delete/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success('Coupon Delete Successfully', 'Successfully Delete');
          $('.table').load(location.href+' .table');
        }
      });
    } 
}

</script>
@endsection