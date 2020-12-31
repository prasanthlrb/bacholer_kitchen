@extends('admin.layouts')
@section('extra-css')
	<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

@endsection
@section('body-section')
<div class="main-content">
    <div class="content-wrapper">
          
<section id="configuration">
    <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="basic-layout-colored-form-control">Add New Package</h4>
        </div>
        <div class="card-content">
          <div class="px-3">

            <form id="form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="{{$food_package->id}}" name="id" id="id">

              <div class="form-body">
                <h4 class="form-section"><i class="ft-info"></i> Package Details</h4>
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                    <label>Food Category</label>
                        <div class="input-group">
                        @foreach($category as $row)
                        @if($row->id == $food_package->category_id)
                          <div class="custom-control custom-radio d-inline-block ml-1">
                            <input checked value="{{$row->id}}" type="radio" id="{{$row->id}}" name="category_id" class="custom-control-input">
                            <label class="custom-control-label" for="{{$row->id}}">{{$row->category_name_english}}</label>
                          </div>
                        @else
                         <div class="custom-control custom-radio d-inline-block ml-1">
                            <input value="{{$row->id}}" type="radio" id="{{$row->id}}" name="category_id" class="custom-control-input">
                            <label class="custom-control-label" for="{{$row->id}}">{{$row->category_name_english}}</label>
                          </div>
                        @endif
                        @endforeach
                        </div>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Package Title English</label>
                        <input value="{{$food_package->package_title_english}}" autocomplete="off" type="text" id="package_title_english" name="package_title_english" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Package Title Arabic</label>
                        <input value="{{$food_package->package_title_arabic}}" autocomplete="off" type="text" id="package_title_arabic" name="package_title_arabic" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Description English</label>
                        <textarea id="description_english" name="description_english" class="form-control">{{$food_package->description_english}}</textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Description Arabic</label>
                        <textarea id="description_arabic" name="description_arabic" class="form-control">{{$food_package->description_arabic}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Kitchen / Hotel</label>
                        <select multiple="multiple" id="kitchen_ids" name="kitchen_ids[]" class="form-control select2">
                        <option value="">SELECT</option>
                        @foreach($kitchen_user as $row)
                        @foreach(explode(',',$food_package->kitchen_ids) as $kitchen_id){
                            @if($kitchen_id == $row->id)
                            <option selected value="{{$row->id}}">{{$row->kitchen_name}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->kitchen_name}}</option>
                            @endif
                        @endforeach
                        @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label>Package Image</label>
                        <input autocomplete="off" type="file" id="image" name="image" class="form-control-file">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                        <div id="preview"><img id="prevImage" style="width:120px;padding-top:20px;" src="/item_files/{{$food_package->image}}" /></div>
                    </div>
                  </div>
                </div>

                <h4 class="form-section"><i class="ft-mail"></i> Break Fast / Lunch / Dinner</h4>

                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                        <div class="custom-checkbox custom-control-inline ml-3">
                            <input <?php echo ($food_package->breakfast_enable == '1' ? 'checked' : '');?> value="1" type="checkbox" id="breakfast_enable" name="breakfast_enable" class="custom-control-input">
                            <label class="custom-control-label" for="breakfast_enable">Breakfast</label>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <div class="custom-checkbox custom-control-inline ml-3">
                            <input <?php echo ($food_package->lunch_enable == '1' ? 'checked' : '');?> value="1" type="checkbox" id="lunch_enable" name="lunch_enable" class="custom-control-input">
                            <label class="custom-control-label" for="lunch_enable">Lunch</label>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <div class="custom-checkbox custom-control-inline ml-3">
                            <input <?php echo ($food_package->dinner_enable == '1' ? 'checked' : '');?> value="1" type="checkbox" id="dinner_enable" name="dinner_enable" class="custom-control-input">
                            <label class="custom-control-label" for="dinner_enable">Dinner</label>
                        </div>
                    </div>
                  </div>

                </div>


<div class="row">

    <div class="col-md-4">
<div id="breakfast_show">
    <div class="form-group">
        <label>BreakFast Price</label>
        <input autocomplete="off" type="text" value="{{$food_package->breakfast_price}}" id="breakfast_price" name="breakfast_price" class="form-control">
    </div>
    
    <div class="form-group">
        <label>Sunday Items</label>
        <select multiple="multiple" id="breakfast_sunday_items" name="breakfast_sunday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_sunday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Monday Items</label>
        <select multiple="multiple" id="breakfast_monday_items" name="breakfast_monday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_monday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Tuesday Items</label>
        <select multiple="multiple" id="breakfast_tuesday_items" name="breakfast_tuesday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_tuesday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Wednesday Items</label>
        <select multiple="multiple" id="breakfast_wednesday_items" name="breakfast_wednesday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_wednesday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Thursday Items</label>
        <select multiple="multiple" id="breakfast_thursday_items" name="breakfast_thursday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_thursday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Friday Items</label>
        <select multiple="multiple" id="breakfast_friday_items" name="breakfast_friday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_friday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Saturday Items</label>
        <select multiple="multiple" id="breakfast_saturday_items" name="breakfast_saturday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->breakfast_saturday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>
</div>
    </div>

    <div class="col-md-4">
<div id="lunch_show">
    <div class="form-group">
        <label>Lunch Price</label>
        <input autocomplete="off" type="text" value="{{$food_package->lunch_price}}" id="lunch_price" name="lunch_price" class="form-control">
    </div>
    
    <div class="form-group">
        <label>Sunday Items</label>
        <select multiple="multiple" id="lunch_sunday_items" name="lunch_sunday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_sunday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Monday Items</label>
        <select multiple="multiple" id="lunch_monday_items" name="lunch_monday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_monday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Tuesday Items</label>
        <select multiple="multiple" id="lunch_tuesday_items" name="lunch_tuesday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_tuesday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Wednesday Items</label>
        <select multiple="multiple" id="lunch_wednesday_items" name="lunch_wednesday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_wednesday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Thursday Items</label>
        <select multiple="multiple" id="lunch_thursday_items" name="lunch_thursday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_thursday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Friday Items</label>
        <select multiple="multiple" id="lunch_friday_items" name="lunch_friday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_friday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Saturday Items</label>
        <select multiple="multiple" id="lunch_saturday_items" name="lunch_saturday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->lunch_saturday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>
</div>
    </div>

    <div class="col-md-4">
<div id="dinner_show">
    <div class="form-group">
        <label>Dinner Price</label>
        <input autocomplete="off" value="{{$food_package->dinner_price}}" type="text" id="dinner_price" name="dinner_price" class="form-control">
    </div>
    
    <div class="form-group">
        <label>Sunday Items</label>
        <select multiple="multiple" id="dinner_sunday_items" name="dinner_sunday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_sunday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Monday Items</label>
        <select multiple="multiple" id="dinner_monday_items" name="dinner_monday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_monday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Tuesday Items</label>
        <select multiple="multiple" id="dinner_tuesday_items" name="dinner_tuesday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_tuesday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Wednesday Items</label>
        <select multiple="multiple" id="dinner_wednesday_items" name="dinner_wednesday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_wednesday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Thursday Items</label>
        <select multiple="multiple" id="dinner_thursday_items" name="dinner_thursday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_thursday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Friday Items</label>
        <select multiple="multiple" id="dinner_friday_items" name="dinner_friday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_friday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Saturday Items</label>
        <select multiple="multiple" id="dinner_saturday_items" name="dinner_saturday_items[]" class="form-control select2">
        <option value="">SELECT</option>
        @foreach($item as $row)
        @foreach(explode(',',$food_package->dinner_saturday_items) as $item_id){
            @if($item_id == $row->id)
            <option selected value="{{$row->id}}">{{$row->item_name_english}}</option>
            @else
            <option value="{{$row->id}}">{{$row->item_name_english}}</option>
            @endif
        @endforeach
        @endforeach
        </select>
    </div>
</div>
    </div>

</div>

    <div class="form-actions right">
        <button type="button" class="btn btn-raised btn-warning mr-1">
            <i class="ft-x"></i> Cancel
        </button>
        <button onclick="Save()" type="button" class="btn btn-raised btn-primary">
            <i class="fa fa-check-square-o"></i> Save
        </button>
    </div>

</form>

          </div>
        </div>
      </div>
    </div>
    
   </div>
</section>


    </div>
</div>
<!-- END : End Main Content-->


@endsection
@section('extra-js')
   
<script src="/app-assets/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>
<script src="/app-assets/js/data-tables/datatable-basic.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" type="text/javascript"></script>

<script>
$('.menu-item').addClass('active');
$('.food-package').addClass('active');


$(".select2").select2({
    width: '100%' // need to override the changed default
});


$('#image').change(function(){
  readURL(this);
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#prevImage').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

if($("#breakfast_enable").is(':checked')){
    $('#breakfast_show').show();
} 
else{
    $('#breakfast_show').hide();
}
if($("#lunch_enable").is(':checked')){
    $('#lunch_show').show();
} 
else{
    $('#lunch_show').hide();
}
if($("#dinner_enable").is(':checked')){
    $('#dinner_show').show();
}
else{
    $('#dinner_show').hide();
}

$(document).ready(function(){
    $('#breakfast_enable').change(function(){
        if($(this).prop('checked') === true){
            $('#breakfast_show').show();
        }else{
            $('#breakfast_show').hide();
        }
    });
    $('#lunch_enable').change(function(){
        if($(this).prop('checked') === true){
            $('#lunch_show').show();
        }else{
            $('#lunch_show').hide();
        }
    });
    $('#dinner_enable').change(function(){
        if($(this).prop('checked') === true){
            $('#dinner_show').show();
        }else{
            $('#dinner_show').hide();
        }
    });
});


function Save(){
  	var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/admin/update-food-package',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);                
            $("#form")[0].reset();
            toastr.success(data, 'Successfully Save');
            window.location.href="/admin/food-package";
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