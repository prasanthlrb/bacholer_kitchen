@extends('admin.layouts')
@section('extra-css')
	<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection
@section('body-section')
        <div class="main-content">
          <div class="content-wrapper"><div class="chat-application">
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
          <a onclick="viewChat({{$row->id}})" class="list-group-item bg-blue-grey bg-lighten-5 border-right-primary border-right-2">
            <span class="media">
              <span class="avatar avatar-md avatar-online">
                <img class="media-object d-flex mr-3 bg-primary height-50 rounded-circle" src="/app-assets/img/portrait/small/avatar-s-3.png">
                <i></i>
              </span>
              <div class="media-body">
                <h6 class="list-group-item-heading">{{$row->first_name}} {{$row->last_name}}
                </h6>
                <p class="list-group-item-text text-muted">
                  <i class="primary font-small-2"></i> {{$row->phone}}
                </p>
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
        <img src="/app-assets/img/portrait/small/avatar-s-3.png" width="37" class="rounded-circle mr-1" alt="avatar" />
        <span>Customer Name</span>
      </div>
    </div>
  </div>
  <section class="chat-app-window">
    <div class="badge badge-dark mb-1">Chat History</div>
    <div class="chats">
      <div class="chats">
    
        
        
      </div>
    </div>
  </section>
  <section class="chat-app-form bg-blue-grey bg-lighten-5">
    <form id="customer_form" class="chat-app-input row mt-2">
    {{csrf_field()}}
    <input type="hidden" name="customer_id" id="customer_id">
      <fieldset class="form-group position-relative has-icon-left col-lg-10 col-8 m-0 px-3">
        <div class="form-control-position">
          <i class="icon-emoticon-smile"></i>
        </div>
        <input type="text" class="form-control" name="customer_text" id="customer_text" placeholder="Type your message">
        <div class="form-control-position control-position-right">
          <i class="ft-image mr-1"></i>
        </div>
      </fieldset>
      <fieldset class="form-group position-relative has-icon-left col-lg-2 col-4 m-0">
        <button onclick="ChatSave()" type="button" class="btn btn-raised btn-primary px-4">
          <i class="fa fa-paper-plane-o d-block d-xl-inline-block d-lg-none p-0"></i>
          <span class="d-none d-lg-inline-block">Send</span>
        </button>
      </fieldset>
    </form>
  </section>
</div>

          </div>
        </div>
        <!-- END : End Main Content-->

@endsection
@section('extra-js')
<script src="/app-assets/js/chat.js" type="text/javascript"></script>
<script>
$('.chat-to-customer').addClass('active');


function viewChat(id)
{
    $.ajax({
    url : '/admin/get-customer-chat/'+id,
    type: "GET",
    success: function(data)
    {
      $('.chat-name').html(data.html1);
      $('.chat-app-window').html(data.html);
      $('#customer_id').val(data.customer_id);
    }
  });
}

function ChatSave(){
  //alert($("#service_id").val());
  var formData = new FormData($('#customer_form')[0]);
  $.ajax({
      url : '/admin/save-customer-chat',
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data)
      {
        console.log(data);                
        $("#customer_form")[0].reset();
        //$('.table').load(location.href+' .table');
        toastr.success('Chat Send Successfully', 'Successfully Update');
        //window.location.href="/vendor/coupon/";
        viewChat(data);
      },
      error: function (data, errorThrown) {
        var errorData = data.responseJSON.errors;
        $.each(errorData, function(i, obj) {
          toastr.error(obj[0]);
        });
      }
  });
}
</script>
@endsection