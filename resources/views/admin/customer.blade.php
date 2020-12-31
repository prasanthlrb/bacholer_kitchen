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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
	                <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($customer as $key => $row)
                <tr>
                  	<td>{{$key + 1}}</td>
                    <td>{{$row->first_name}} {{$row->last_name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->phone}}</td>
                  	<td>
                  	<div class="dropdown">
		                <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">Action</span>
  		                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-125px, 19px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item" href="/admin/customer-details/{{$row->id}}"><i class="bx bx-edit-alt mr-1"></i> View Details</a>
  		                  <!-- <a onclick="Edit({{$row->id}})" class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
  		                  <a onclick="Delete({{$row->id}})" class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a> -->
  		                </div>
		                </div>
                  	</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
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
<!-- Bootstrap Modal -->
<div class="modal fade" id="popup_modal" tabindex="-1" role="dialog" aria-labelledby="popup_modal" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-grey-dark-5">
                <h6 class="modal-title" id="modal-title">Add New</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>First Name</label>
                        <input autocomplete="off" type="text" id="first_name" name="first_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input autocomplete="off" type="text" id="last_name" name="last_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email ID</label>
                        <input autocomplete="off" type="email" id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input autocomplete="off" type="text" id="phone" name="phone" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    </div>                
                    
                    <div class="form-group">
                        <button onclick="Save()" id="saveButton" class="btn btn-primary btn-block mr-10" type="button">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Bootstrap Modal -->       
	<script src="/app-assets/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="/app-assets/js/data-tables/datatable-basic.js" type="text/javascript"></script>
<script>
$('.customer').addClass('active');

var action_type;
$('#add_new').click(function(){
	$('#popup_modal').modal('show');
    $("#form")[0].reset();
	action_type = 1;
	$('#saveButton').text('Save');
	$('#modal-title').text('Add Customer');
});


function Save(){
  	var formData = new FormData($('#form')[0]);
  	if(action_type == 1){
	    $.ajax({
	        url : '/admin/save-customer',
	        type: "POST",
	        data: formData,
	        contentType: false,
	        processData: false,
	        dataType: "JSON",
	        success: function(data)
	        {
	          console.log(data);                
	          $("#form")[0].reset();
	          $('#popup_modal').modal('hide');
	          $('.table').load(location.href+' .table');
	          toastr.success(data, 'Successfully Save');
	        },error: function (data, errorThrown) {
	          	var errorData = data.responseJSON.errors;
	            $.each(errorData, function(i, obj) {
	              toastr.error(obj[0]);
	          	});
	        }
	    });
  	}
  	else
  	{
	    $.ajax({
	      url : '/admin/update-customer',
	      type: "POST",
	      data: formData,
	      contentType: false,
	      processData: false,
	      dataType: "JSON",
	      success: function(data)
	        {
	          console.log(data);                
	          $("#form")[0].reset();
	          $('#popup_modal').modal('hide');
	          $('.table').load(location.href+' .table');
	          toastr.success(data, 'Successfully Updated');
	        },error: function (data, errorThrown) {
	      		var errorData = data.responseJSON.errors;
	            $.each(errorData, function(i, obj) {
	              toastr.error(obj[0]);
	          	});
	        }
	    });
  	}
}


function Edit(id){
  $.ajax({
    url : '/admin/edit-customer/'+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        $('#modal-title').text('Update Kitchen User');
        $('#saveButton').text('Save Change');
        //$('select[name=role_id]').val(data.role_id);
        $('input[name=name]').val(data.name);
        $('input[name=phone]').val(data.phone);
        $('input[name=email]').val(data.email);
        $('input[name=id]').val(id);
      	$('#popup_modal').modal('show');
        action_type = 2;
    }
  });
}

function Delete(id){
  	var r = confirm("Are you sure");
  	if (r == true) {
      $.ajax({
        url : '/admin/delete-customer/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success(data, 'Successfully Delete');
          $('.table').load(location.href+' .table');
        }
      });
   	} 
}


</script>
@endsection