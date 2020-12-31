@extends('admin.layouts')
@section('extra-css')
	<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

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
            Add New Food Package
        	</button>
          </h4>
          <!-- <p class="card-text">DataTables has most features enabled by default, so all you need to do to use it withyour own ables is to call the construction function: $().DataTable();.</p> -->
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr>
                  <th>#</th>
	                <th>Package Name</th>
	                <th>Image</th>
	                <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($food_package as $key => $row)
                <tr>
                  <td>{{$key + 1}}</td>
                  <td>{{$row->package_title_english}}</td>
                  <td><img style="width:100px;height:100px;" src="/item_files/{{$row->image}}"></td>
                  <td>
                  <div class="dropdown">
                    <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">Action</span>
                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-125px, 19px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <a class="dropdown-item" href="/admin/edit-food-package/{{$row->id}}"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                      <a onclick="Delete({{$row->id}})" class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                    </div>
                  </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
	                <th>Package Name</th>
	                <th>Image</th>
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
                        <label>Food Category</label>
                        <div class="input-group">
                        @foreach($category as $row)
                          <div class="custom-control custom-radio d-inline-block ml-1">
                            <input value="{{$row->id}}" type="radio" id="{{$row->id}}" name="category_id" class="custom-control-input">
                            <label class="custom-control-label" for="{{$row->id}}">{{$row->category_name_english}}</label>
                          </div>
                        @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Package Title English</label>
                        <input autocomplete="off" type="text" id="package_title_english" name="package_title_english" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Package Title Arabic</label>
                        <input autocomplete="off" type="text" id="package_title_arabic" name="package_title_arabic" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Description English</label>
                        <textarea id="description_english" name="description_english" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Description Arabic</label>
                        <textarea id="description_arabic" name="description_arabic" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input autocomplete="off" type="text" id="price" name="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Break Fast / Lunch / Dinner</label>
                        <div class="form-group">

                          <div class="input-group">

                            <div class="custom-control custom-radio d-inline-block ml-1">
                              <input value="1" type="radio" id="food_type1" name="food_type" class="custom-control-input">
                              <label class="custom-control-label" for="food_type1">Break Fast</label>
                            </div>

                            <div class="custom-control custom-radio d-inline-block ml-1">
                              <input value="2" type="radio" id="food_type2" name="food_type" class="custom-control-input">
                              <label class="custom-control-label" for="food_type2">Lunch</label>
                            </div>

                            <div class="custom-control custom-radio d-inline-block ml-1">
                              <input value="3" type="radio" id="food_type3" name="food_type" class="custom-control-input">
                              <label class="custom-control-label" for="food_type3">Dinner</label>
                            </div>

                          </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <label>Choose Week Days</label>
                        <div class="form-group">

                          <div class="input-group">

                            <div class="custom-control custom-radio d-inline-block ml-1">
                              <input value="sunday" type="radio" id="sunday" name="week_day" class="custom-control-input">
                              <label class="custom-control-label" for="sunday">Sunday</label>
                            </div>

                            <div class="custom-control custom-radio d-inline-block ml-1">
                              <input value="monday" type="radio" id="monday" name="week_day" class="custom-control-input">
                              <label class="custom-control-label" for="monday">Monday</label>
                            </div>

                            <div class="custom-control custom-radio d-inline-block ml-1">
                              <input value="tuesday" type="radio" id="tuesday" name="week_day" class="custom-control-input">
                              <label class="custom-control-label" for="tuesday">Tuesday</label>
                            </div>

                            <div class="custom-control custom-radio d-inline-block ml-1">
                              <input value="wednesday" type="radio" id="wednesday" name="week_day" class="custom-control-input">
                              <label class="custom-control-label" for="wednesday">Wednesday</label>
                            </div>

                            <div class="custom-control custom-radio d-inline-block ml-1">
                              <input value="thursday" type="radio" id="thursday" name="week_day" class="custom-control-input">
                              <label class="custom-control-label" for="thursday">Thursday</label>
                            </div>

                            <div class="custom-control custom-radio d-inline-block ml-1">
                              <input value="friday" type="radio" id="friday" name="week_day" class="custom-control-input">
                              <label class="custom-control-label" for="friday">Friday</label>
                            </div>

                            <div class="custom-control custom-radio d-inline-block ml-1">
                              <input value="saturday" type="radio" id="saturday" name="week_day" class="custom-control-input">
                              <label class="custom-control-label" for="saturday">Saturday</label>
                            </div>

                          </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Select Item</label>
                        <select multiple="multiple" id="item_ids" name="item_ids[]" class="form-control select2">
                        <option value="">SELECT</option>
                        @foreach($item as $row)
                        <option value="{{$row->id}}">{{$row->item_name_english}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Select Kitchen / Hotel</label>
                        <select multiple="multiple" id="kitchen_ids" name="kitchen_ids[]" class="form-control select2">
                        <option value="">SELECT</option>
                        @foreach($kitchen_user as $row)
                        <option value="{{$row->id}}">{{$row->kitchen_name}}</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Package Image</label>
                        <input type="file" id="image" name="image" class="form-control">
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" type="text/javascript"></script>
<script>
$('.menu-item').addClass('active');
$('.food-package').addClass('active');

$('#add_new').click(function(){
  window.location.href="/admin/add-food-package";
})

$(".select2").select2({
    width: '100%' // need to override the changed default
});


function Delete(id){
  var r = confirm("Are you sure");
  if (r == true) {
    $.ajax({
      url : '/admin/delete-food-package/'+id,
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